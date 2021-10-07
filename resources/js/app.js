import Vue from "vue";
import vSelect from "vue-select";
import VueDatePicker from '@mathieustan/vue-datepicker';
import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';

Vue.use(VueDatePicker);


require('./bootstrap');

window.Vue = require('vue');

Vue.component("v-select", vSelect);

Vue.component('admin-index', require('./components/admin/roles/index.vue').default);
Vue.component('personal-information', require('./components/user/personal_information/index.vue').default);
Vue.component('employee', require('./components/user/employee.vue').default);




const app = new Vue({
    el: '#app',
});
