
require('./bootstrap');

window.Vue = require('vue');

let axios = require('axios');

Vue.component('projects', require('./components/Projects.vue').default);


const app = new Vue({
    el: '#app'
});
