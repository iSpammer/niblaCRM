<template>
      <div class="">
        <b-alert :show="dismissCountDown" dismissible variant="danger" @dismissed="dismissCountDown=0" @dismiss-count-down="countDownChanged">
      {{ errorMsg }}
      <b-progress
        variant="danger"
        :max="dismissSecs"
        :value="dismissCountDown"
        height="4px"
      ></b-progress>
        </b-alert>
        <div class="form-group">
          <label for="contractName">Contract Name</label>
          <input v-model="contractName" id="contractName" type="text" class="form-control">
        </div>

        <!-- <div class="form-group">
          <label for="contractEndDate">Contract End Date</label>
          <input v-model="contractEndDate" id="contractEndDate" class="form-control">
        </div> -->

        <div class="container">
        <div class="row">
            <div class="col-sm form-group">
                <label for="contractStartDate">Contract Start Date</label>
                <input v-model="contractStartDate" type="date" id="contractStartDate" class="form-control">
            </div>
             <div class="col-sm form-group">
                <label for="contractEndDate">Contract End Date</label>
                <input v-model="contractEndDate" class="form-control" type="date" id="start" name="contractEndDate">
            </div>
            <!-- <div class="col-sm">
            One of three columns
            </div>
            <div class="col-sm">
            One of three columns
            </div> -->
        </div>
        </div>
        <div class="form-group">
            <label for="contractStatus">Contract Status</label>
            <!-- <input v-model="contractStatus" id="contractStatus" class="form-control"> -->
            <select v-model="contractStatus" name="carlist" class="form-control" form="carform">
                <option v-for="statusaya in statusList" :key="statusaya.id" class="form-group">
                    {{ statusaya.status_name }}
                </option>
            </select>

        </div>
        <div class="form-group">
          <label for="contractDescription">Contract Description</label>
          <input v-model="contractDescription" id="contractDescription" class="form-control">
        </div>
        <button @click="addContract(contractName, contractStartDate, contractEndDate, contractStatus, contractDescription)"
          :class="{disabled: (!contractName || !contractStartDate || !contractEndDate || !contractStatus || !contractDescription)}"
          class="btn btn-block btn-success">Submit</button>
      </div>

</template>

<script>

  export default {
    data() {
      return {
        contractName: "",
        contractStartDate: "",
        contractEndDate: "",
        contractStatus: "",
        contractDescription:"",
        errorMsg: "",
        dismissSecs: 10,
        dismissCountDown: 0,
        statusList:[]
      }
    },
    created() {
      //this.listenForChanges();
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
        addContract(contractName, contractStartDate , contractEndDate, contractStatus, contractDescription) {
            this.$loading.value = true;
            //alert("hi");
            // check if entries are not empty
            if(!contractName || !contractStartDate || !contractEndDate || !contractStatus || !contractDescription)
            return;
            //console.log(contractStartDate < contractEndDate ? 'valid' : 'invalid');

            if(contractStartDate > contractEndDate) {
                this.showAlert();
                this.errorMsg = "Start date cannot be less than end date"
                this.showDismissibleAlert ? true : false
                return;
            }
            else{
              //  console.log("OUH")
            }
            //alert("asd");
            // make API to save Contract
            axios.post('/addContract', {
            contractName: contractName, contractStartDate: contractStartDate , contractEndDate: contractEndDate, contractStatus: contractStatus, contractDescription: contractDescription
            }).then( response => {
            if(response.data) {
                //location.reload();

                this.contractName = this.contractStartDate = this.contractEndDate = this.contractStatus = this.contractDescription = "";
            }
            else{
            }
            })
        },


    },
    }
</script>
