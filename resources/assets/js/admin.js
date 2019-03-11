// import all pages for our main bundle
import Vuetify from 'vuetify';
import { FormHelpers } from 'vue-laravel-forms';
import VeeValidate from 'vee-validate';
import Vue from 'vue';
import VueResource from 'vue-resource';
import VueRouter from 'vue-router';
import $ from 'jquery';
import './utils';
import './pages/logoutComponent';

import DashboardIndex from './components/admin/DashboardIndex.vue';
import AdminBrandsViewIndex from './components/admin/BrandsViewIndex.vue';

window.jQuery = $;
Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(FormHelpers);
Vue.use(VeeValidate);
Vue.use(Vuetify);

Vue.http.options.showLoading = true; // Set option to show loading shadow by default
Vue.http.options.emulateHTTP = true;
// Add header with CSRF token to all requests`
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=csrf-token]').getAttribute('content');

window.Vue = require('vue');

window.Vue.use(VueRouter);

const routes = [
  { path: '/', component: DashboardIndex, name: 'dashboardIndex' },
  { path: '/brands', component: AdminBrandsViewIndex, name: 'adminBrandsViewIndex' },
];

const router = new VueRouter({
  routes,
});

new Vue({ router }).$mount('#app');
