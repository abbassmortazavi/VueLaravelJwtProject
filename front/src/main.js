import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'
import VueResource from 'vue-resource'
import Auth from './packages/auth/Auth.js';


//load axios
window.axios = require('axios');




//load vueResource
Vue.use(VueResource);
Vue.use(Auth);


//define baseUrl in http
// Vue.http.options.root = 'http://localhost:8000';
// Vue.http.headers.common['Authorization'] = 'Bearer '+ Vue.auth.getToken();

//define baseUrl in axios
axios.defaults.baseURL = 'http://localhost:8000';
axios.defaults.headers.common['Authorization'] = 'Bearer '+ Vue.auth.getToken();
/*axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axios.defaults.headers.common['Access-Control-Allow-Methods'] = 'GET,PUT,POST,DELETE,PATCH,OPTIONS';
axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length'; */
// axios.defaults.withCredentials = false;



Router.beforeEach((to , from , next)=>{
  if(to.matched.some(record=>record.meta.forVisitors)){
    if (Vue.auth.isAuthenticated()) {
      next({
        path : '/feed'
      });
    }else next();
  }else next();
  if(to.matched.some(record=>record.meta.forAuth)){
    if (! Vue.auth.isAuthenticated()) {
      next({
        path : '/login'
      });
    }else next();
  }else next();
});

new Vue({
  el: '#app',
  render: h => h(App),
  router: Router,
})
