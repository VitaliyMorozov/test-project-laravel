// import all pages for our main bundle
import { FormHelpers } from 'vue-laravel-forms';
import VeeValidate from 'vee-validate';
import Vue from 'vue';
import VueResource from 'vue-resource';
import VueRouter from 'vue-router';
import $ from 'jquery';
import './utils';
import './pages/logoutComponent';

window.jQuery = $;
Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(FormHelpers);
Vue.use(VeeValidate);

Vue.http.options.showLoading = true; // Set option to show loading shadow by default
Vue.http.options.emulateHTTP = true;
// Add header with CSRF token to all requests`
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=csrf-token]').getAttribute('content');

window.Vue = require('vue');
window.Vue.use(VueRouter);

import BrandsIndex from './components/BrandsIndex.vue';
import BrandModelsIndex from './components/BrandModelsIndex.vue';
import CategorySparePartsIndex from './components/CategorySparePartsIndex.vue';
import SparePartsGenerationIndex from './components/SparePartsGenerationIndex.vue';

const routes = [
  {path: '/', components: {brandsIndex: BrandsIndex}},
  {path: '/models/:id', component: BrandModelsIndex, name: 'brandModelsIndex'},
  {path: '/category/:id', component: CategorySparePartsIndex, name: 'categorySparePartsIndex'},
  {path: '/spareparts/:generationID', component: SparePartsGenerationIndex, name: 'sparePartsGenerationIndex'},
]

const router = new VueRouter({
  routes,
});

const app = new Vue({ router }).$mount('#app')

