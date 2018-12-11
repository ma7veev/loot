
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
require('./bootstrap');

import axios from 'axios';
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(ElementUI);
Vue.component('example', require('./components/Example.vue'));
Vue.component('operations', require('./components/Operations.vue'));
Vue.component('accounts', require('./components/Accounts.vue'));
Vue.component('items', require('./components/Items.vue'));
Vue.component('groups', require('./components/Groups.vue'));
/**/
const app = new Vue({
    el: '#app'
});
