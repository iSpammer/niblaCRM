<template>
    <div>
   <contract-table-component v-if="contracts.length > 0" ></contract-table-component>
    <div class="col-md-10">

        <div id="post-header">

            <h2 class="text-center">Add New contract</h2>

        </div>

        <br/>

            <div id="post-form">
            <contract-post-component></contract-post-component>
        </div>

    </div> <!-- Main Area -->

    </div>
</template>

<script>
  export default {
    data() {
      return {
        contracts: [],
        loading: false,
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
    openEdit: function(id) {
        $("#editModalContract").modal();
    },
    openRemove: function(id){
        $("#removeModalContract").modal();
    },
        listenForChanges() {
        Echo.channel('contracts')
          .listen('ContractPublished', Contract => {
            if (! ('Notification' in window)) {
              alert('Web Notification is not supported');
              return;
            }

            Notification.requestPermission( permission => {
              let notification = new Notification('New Contract alert!', {
                body: Contract.contractName, // content for the alert
                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
              });

              // link to page on clicking the notification
              notification.onclick = () => {
                window.open(window.location.href);
              };
            });
          })

          Echo.channel('contracts')
          .listen('ContractRemoved', Contract => {
            if (! ('Notification' in window)) {
              alert('Web Notification is not supported');
              return;
            }

            Notification.requestPermission( permission => {
              let notification = new Notification('Contract Removed Alert!', {
                body: Contract.contractName, // content for the alert
                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
              });

              // link to page on clicking the notification
              notification.onclick = () => {
                window.open(window.location.href);
              };
            });
          })

          Echo.channel('contracts')
          .listen('ContractUpdated', Contract => {
            if (! ('Notification' in window)) {
              alert('Web Notification is not supported');
              return;
            }
[]
            Notification.requestPermission( permission => {
              let notification = new Notification('Contract Updated Alert!', {
                body: Contract.contractName, // content for the alert
                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
              });

              // link to page on clicking the notification
              notification.onclick = () => {
                window.open(window.location.href);
              };
            });
          })

        }

  },

}

</script>
