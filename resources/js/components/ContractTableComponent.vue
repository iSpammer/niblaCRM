<template>
     <div class="col" id="main-contract">
        <b-alert
        variant="success"
        dismissible
        fade
        :show="updated"
        @dismissed="updated=false"
        >
      Contracts Updated!
        </b-alert>

          <div>
             <!-- <b-spinner label="Loading..."></b-spinner> -->
        </div>

        <div >
            <div id="contract-header">
                <h4> contracts </h4>
            </div>

            <div id="contract-container">
                <!-- {{ contracts }} -->


                <div id="categories-table" class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>description</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit Contract</th>
                            <th>Remove Contract</th>
                        </tr>
                        <tr v-for="contract in contracts" :key="contract.id">
                            <td>{{ contract.id }}</td>
                            <td>{{ contract.contract_name }}</td>
                            <td>{{ contract.contract_start_date }}</td>
                            <td>{{ contract.contract_end_date }}</td>
                            <td>{{ contract.contract_status }}</td>
                            <td>{{ contract.contract_description }}</td>
                            <td>{{ contract.created_at }}</td>
                            <td>{{ contract.updated_at }}</td>
                            <td ><contract-edit-modal-component v-if="contract.id!=1" :key=contract.id :id=contract.id :name=contract.contract_name :startDate=contract.contract_start_date :endDate=contract.contract_end_date :status=contract.contract_status :description=contract.contract_description></contract-edit-modal-component></td>

                            <td><contract-remove-modal-component v-if="contract.id!=1" :id=contract.id ></contract-remove-modal-component></td>

                        </tr>
                    </table>


                </div>

            </div>
        </div>
    </div>

</template>


<script>
  export default {
    data() {
      return {
        contracts: [],
        updated:false,
        showDismissibleAlert: false

      }
    },
    created() {
        this.listenForChanges();
    },
    mounted() {
       this.fetchData();

    },
    methods: {
    fetchData(){
         fetch("/getContracts")
        .then(response => response.json())
        .then(data => (this.contracts = data));
    },

    listenForChanges() {
        Echo.channel('contracts')
          .listen('ContractPublished', Contract => {
            this.fetchData();
            this.updated=true;
            this.$loading.value = false;
            this.showDismissibleAlert ? 'visible' : 'hidden'
          })
        Echo.channel('contracts')
          .listen('ContractRemoved', Contract => {
            this.fetchData();
            this.updated=true;
            this.$loading.value = false;
            this.showDismissibleAlert ? 'visible' : 'hidden'

          })
        Echo.channel('contracts')
          .listen('ContractUpdated', Contract => {
            this.fetchData();
            this.updated=true;
            this.$loading.value = false;
            this.showDismissibleAlert ? 'visible' : 'hidden'

          })
      }

  },

}

</script>
