/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import index from './components/index.vue';
import create from './components/create.vue'; 
import read from './components/read.vue';
import update from './components/update.vue';  

//Vue.component('projects', require('./components/Projects.vue'));
//Vue.component('projects-client-side', require('./components/ProjectsClientSide.vue'));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */ 

const routes = [
  { path: '/', component: index },
  { path: '/create', component: create },
  { path: '/read/:id', component: read, name :'readPost' },
  { path: '/:id/update', component: update, name :'editPost' },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

router.beforeResolve((to, from, next) => {
  if (to.path) {
    Pace.start();
  }
  next()
});

router.afterEach(() => {
   Pace.stop();
});

const app = new Vue({
  router
}).$mount('#app')
