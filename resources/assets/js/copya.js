

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
window._ = require('lodash');
require('bootstrap-sass');

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
next();
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('users-component', require('./components/copya/Users.vue'));
Vue.component('pages-component', require('./components/copya/pages/index.vue'));
Vue.component('form-pages-component', require('./components/copya/pages/form.vue'));



const app = new Vue({
    el: '#app'
});



