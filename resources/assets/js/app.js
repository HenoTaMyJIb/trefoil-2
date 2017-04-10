
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
require('./components/global/Tabs')
require('./components/global/Modal')
Vue.component('datatable', require('./components/global/Datatable.vue'));


Vue.component('example', require('./components/Example.vue'));

Vue.component('create-registration-view', require('./components/registrations/create'));
Vue.component('registrations-view', require('./components/registrations/index'));
Vue.component('fields-view', require('./components/fields/index'));
Vue.component('coaches-view', require('./components/coaches/index'));
Vue.component('groups-view', require('./components/groups/index'));
Vue.component('gymnasts-view', require('./components/gymnasts/index'));

import Form from './Form'
window.Form = Form;
window.swal = require('sweetalert2')

const app = new Vue({
    el: '#app',
    data: {
      field: 0
    }
});
