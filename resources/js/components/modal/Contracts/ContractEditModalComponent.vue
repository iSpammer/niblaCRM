<template>
  <div>
    <div class="mb-2">
     <b-button variant="warning" @click="modalShow = !modalShow" :key="id" >Edit</b-button>
    </div>
    <b-modal
      v-model="modalShow"
      :key="id"
      :id="'modal'+id"
      ref="modal"
      :title="'Edit '+name+'\'s Contract'"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk">
      <b-alert :show="dismissCountDown" dismissible variant="danger" @dismissed="dismissCountDown=0" @dismiss-count-down="countDownChanged">
      {{ errorMsg }}
      <b-progress
        variant="danger"
        :max="dismissSecs"
        :value="dismissCountDown"
        height="4px"
      ></b-progress>
        </b-alert>
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          :state="nameState"
          label="Name"
          label-for="name-input"
          invalid-feedback="Name is required">
          <b-form-input
            id="name-input"
            v-model="name"
            :state="nameState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          :state="startDateState"
          label="Start Date"
          label-for="startDate-input"
          invalid-feedback="startDate is required">
          <b-form-input
            type='date'
            id="startDate-input"
            v-model="startDate"
            :state="startDateState"
            required
          ></b-form-input>
        </b-form-group>

         <b-form-group
          :state="endDateState"
          label="End Date"
          label-for="endDate-input"
          invalid-feedback="endDate is required">
          <b-form-input
            type="date"
            id="endDate-input"
            v-model="endDate"
            :state="endDateState"
            required
          ></b-form-input>
        </b-form-group>

          <div class="form-group">
            <label for="contractStatus">Contract Status</label>
            <!-- <input v-model="contractStatus" id="contractStatus" class="form-control"> -->
            <select v-model="status" name="carlist" class="form-control" form="carform">
                <option v-for="statusaya in statusList" :key="statusaya.id" class="form-group">
                    {{ statusaya.status_name }}
                </option>
            </select>

        </div>

         <b-form-group
          :state="descriptionState"
          label="Description"
          label-for="description-input"
          invalid-feedback="description is required">
          <b-form-input
            id="description-input"
            v-model="description"
            :state="descriptionState"
            required
          ></b-form-input>
        </b-form-group>
      </form>
    </b-modal>
  </div>
</template>

<script>
  export default {
      props: {
        id: Number,
        name: String,
        startDate: String,
        endDate: String,
        status: String,
        description: String,
    },
    data() {
      return {
        nameState: false,
        startDateState: false,
        endDateState: false,
        statusState: false,
        descriptionState: false,
        statusList:[],
        modalShow: false,
        errorMsg: "",
        dismissSecs: 10,
        dismissCountDown: 0

      }
    },
    computed: {
      formCheck() {
        this.checkFormValidity();
      }
    },
    mounted() {
        fetch("/getStatus")
        .then(response => response.json())
        .then(data => (this.statusList = data));
    },
    methods: {
      countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        showAlert() {
            this.dismissCountDown = this.dismissSecs
        },
      checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        this.nameState = valid ? true : false
        this.startDateState = valid ? true : false
        this.endDateState = valid ? true : false
        this.statusState = valid ? true : false
        this.descriptionState = valid ? true : false
        return valid
      },
      resetModal() {
        this.nameState = null
        this.startDateState = null
        this.endDateState = null
        this.statusState = null
        this.descriptionState = null
      },
      handleOk(bvModalEvt) {
        // Prevent modal from closing
        bvModalEvt.preventDefault()
        // Trigger submit handler
        this.handleSubmit()
      },
      handleSubmit() {
        // Exit when the form isn't valid
        if (!this.checkFormValidity()) {
          return
        }
        if(this.startDate>this.endDate) {
            this.showAlert();
            this.errorMsg = "Start date cannot be less than end date"
            this.showDismissibleAlert ? true : false
            return;
        }
        // this.$bvModal.hide('modal'+this.id+'___BV_modal_outer_')
        // this.$bvModal.hide('#modal'+this.id)
        // this.$bvModal.hide('#modal'+this.id+'___BV_modal_outer_')
        // this.$refs['modal'+this.id].hide()
        // Push the name to submitted names
        $.ajax({
            url: "/editcontract/"+this.id,
            method: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                "_token": $('meta[name="_token"]').attr('content'),
                contractName: this.name,
                contractStartDate: this.startDate,
                contractEndDate: this.endDate,
                contractStatus: this.status,
                contractDescription: this.description,
            },
            success: function(result) {
                console.log("Success : ", result);
                if (result.Success) {

                  // document.location.reload(true);
                } else if (result.Error) {
                    console.log('Error From the Sever ', result.Error);
                }
            },
            error: function(error) {
                console.log('AJAX ERROR: ', error);
            }
        });

        // Hide the modal manually
        //alert(this.id)
        this.modalShow = false;
        //$("#modal'+this.id+'___BV_modal_outer_'").modal('hide');
      }
    }
  }
</script>
