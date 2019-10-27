<template>
  <div>
    <div class="mb-2">
     <b-button variant="danger" @click="showMsgBox">Remove</b-button>
    </div>
  </div>
</template>

<script>
  export default {
      props: {
        id: Number,
    },
    data() {
      return {
        boxOne: '',
      }
    },
    methods: {
      showMsgBox() {
        this.boxOne = ''
        this.$bvModal.msgBoxConfirm('Are you sure?')
          .then(value => {
            this.boxOne = value
            if(value==true){
                this.handleRemove();
            }
            else{
                console.log("cancle");
            }
          })
          .catch(err => {
            // An error occurred
          })
      },
      handleRemove(){
          this.$loading.value = true;
          $.ajax({
        url: "/deletecontract/"+this.id,
        method: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        data: {
            "_token": $('meta[name="_token"]').attr('content'),
            id: $("[data-js=open-remove-contract]").find('span').attr('id')
        },
        success: function(result) {
            this.$loading.value = false;
            console.log("Success : ", result);
            if (result.Success) {

               // document.location.reload(true);
            } else if (result.Error) {
                console.log('Error From the Sever ', result.Error);
            }
        },
        error: function(error) {
            this.$loading.value = false;
            console.log("AJAX ERROR OCCURED: ", error);
        }
    });



      }
    }
  }
</script>
