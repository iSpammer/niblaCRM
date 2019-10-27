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
          <label for="agentName">Agent's Name</label>
          <input v-model="agentName" id="agentName" type="text" class="form-control">
        </div>

         <div class="form-group">
          <label for="agentWebsite">Agent's Website</label>
          <input v-model="agentWebsite" id="agentWebsite" type="text" class="form-control">
        </div>

        <div class="form-group">
          <label for="agentMainContactName">Agent's Main Contact Name</label>
          <input v-model="agentMainContactName" id="agentMainContactName" type="text" class="form-control">
        </div>

         <div class="form-group">
          <label for="agentMoto">Agent's Moto</label>
          <input v-model="agentMoto" id="agentMoto" type="text" class="form-control">
        </div>

        <div class="form-group">
          <label for="agentBusiness">Agent's Business</label>
          <input v-model="agentBusiness" id="agentBusiness" type="text" class="form-control">
        </div>


        <div class="form-group">
            <label for="agentProject">Agent's Project</label>
            <!-- <input v-model="agentMoto" id="agentMoto" class="form-control"> -->
            <select v-model="agentProject" name="agentProject" class="form-control" form="carform">
                <option v-for="project in projectsList" :key="project.id"  :value="project.id" class="form-group">
                    {{ project.project_name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="agentTier">Agent's Tier</label>
            <!-- <input v-model="agentMoto" id="agentMoto" class="form-control"> -->
            <select v-model="agentTier" name="agentTier" class="form-control" form="carform">
                <option v-for="tier in tiersList" :key="tier.id" :value="tier.id" class="form-group">
                    {{ tier.tier_name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="agentClass">Agent's Class</label>
            <!-- <input v-model="agentMoto" id="agentMoto" class="form-control"> -->
            <select v-model="agentClass" name="agentClass" class="form-control" form="carform">
                <option v-for="clasaya in classList" :key="clasaya.id"  :value="clasaya.id" class="form-group">
                    {{ clasaya.class_name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="agentStatus">Agent Status</label>
            <!-- <input v-model="agentStatus" id="agentStatus" class="form-control"> -->
            <select v-model="agentStatus" name="agentStatus" class="form-control" form="carform">
                <option v-for="statusaya in statusList" :key="statusaya.id"  :value="statusaya.id" class="form-group">
                    {{ statusaya.status_name }}
                </option>
            </select>
        </div>

        <div class="form-group">
          <label for="agentContactInfo">Contact info</label>
          <input v-model="agentContactInfo" id="agentContactInfo" type="text" class="form-control">
        </div>

        <div class="form-group">
          <label for="agentImage">Agent's image</label>
          <input v-model="agentImage" id="agentImage" type="text" class="form-control">
        </div>

        <!-- <div class="form-group">
          <label for="agentMainContactName">Contract End Date</label>
          <input v-model="agentMainContactName" id="agentMainContactName" class="form-control">
        </div> -->


        <button @click="addAgent(agentName, agentWebsite, agentMainContactName, agentMoto, agentBusiness, agentProject, agentTier, agentClass, agentStatus, agentContactInfo, agentImage)"
          :class="{disabled: (!agentName || !agentWebsite || !agentMainContactName || !agentMoto || !agentBusiness ||!agentProject ||! agentTier ||! agentClass ||! agentStatus ||! agentContactInfo  ||! agentImage)}"
          class="btn btn-block btn-success">Submit</button>
      </div>

</template>

<script>

  export default {
    data() {
      return {
        agentName: "",
        agentWebsite: "",
        agentMainContactName: "",
        agentMoto: "",
        agentBusiness:"",
        agentProject: "",
        agentTier: "",
        agentClass: "",
        agentStatus: "",
        agentContactInfo:"",
        agentInfo:"",
        agentImage:"",
        errorMsg: "",
        dismissSecs: 10,
        dismissCountDown: 0,
        statusList:[],
        projectsList:[],
        tiersList:[],
        classList:[],
      }
    },
    created() {
      this.listenForChanges();
    },
    mounted() {
        fetch("/getStatus")
        .then(response => response.json())
        .then(data => (this.statusList = data));
        fetch("/getProjects")
        .then(response => response.json())
        .then(data => (this.projectsList = data));
        fetch("/getTiers")
        .then(response => response.json())
        .then(data => (this.tiersList = data));
        fetch("/getClass")
        .then(response => response.json())
        .then(data => (this.classList = data));
    },
    methods: {
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        showAlert() {
            this.dismissCountDown = this.dismissSecs
        },
        addAgent(agentName, agentWebsite , agentMainContactName, agentMoto, agentBusiness, agentTier, agentClass, agentStatus, agentContactInfo, agentProject) {
            this.$loading.value = true;
            //alert("hi");
            // check if entries are not empty
            // if(!agentName || !agentWebsite || !agentMainContactName || !agentMoto || !agentBusiness)
            // return;
            //console.log(agentWebsite < agentMainContactName ? 'valid' : 'invalid');


            //alert("asd");
            // make API to save Contract
            axios.post('/addAgent', {
            agentName: agentName, agentWebsite: agentWebsite , agentMainContactName: agentMainContactName, agentMoto: agentMoto, agentBusiness: agentBusiness, agentTier: agentTier, agentClass: agentClass, agentStatus: agentStatus, agentContactInfo:agentContactInfo, agentProject: agentProject
            }).then( response => {
            if(response.data) {
                //location.reload();
                this.agentName = this.agentWebsite = this.agentMainContactName = this.agentMoto = this.agentBusiness = "";
            }
            else{
            }
            })
        },
        listenForChanges() {
        Echo.channel('agents')
          .listen('AgentPublished', post => {
            if (! ('Notification' in window)) {
              alert('Web Notification is not supported');
              return;
            }

            Notification.requestPermission( permission => {
              let notification = new Notification('New Agent alert!', {
                body: post.title, // content for the alert
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
