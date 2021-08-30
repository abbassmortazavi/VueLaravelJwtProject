import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'
import VueResource from 'vue-resource'
window.axios = require('axios');
Vue.use(VueResource);

new Vue({
  el: '#app',
  render: h => h(App),
  router: Router,
})
