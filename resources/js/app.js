/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./main/main');
require('./main/project');
require('./main/contract');
require('./main/agent');

window.Vue = require('vue');


import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
//Vue.forceUpdate();


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('contract-component', require('./components/Main/ContractComponent.vue').default);

Vue.component('contract-post-component', require('./components/post/ContractPostComponent.vue').default);
Vue.component('agent-post-component', require('./components/post/AgentPostComponent.vue').default);
Vue.component('contract-table-component', require('./components/ContractTableComponent.vue').default);
Vue.component('contract-remove-modal-component', require('./components/modal/Contracts/ContractRemoveModalComponent.vue').default);
Vue.component('contract-edit-modal-component', require('./components/modal/Contracts/ContractEditModalComponent.vue').default);
Vue.component('home', require('./components/Home.vue'));
//Vue.component('chat-messages', require('./components/ChatMessages.vue'));
//Vue.component('chat-form', require('./components/ChatForm.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$loading = {value: false};

const app = new Vue({
    el: '#app',
    data: {
        messages: []
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
        .listen('MessageSent', (e) => {
            this.messages.push({
            message: e.message.message,
            user: e.user
            });
        });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
});
