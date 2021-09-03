import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import Feed from './components/Feed.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    routes:[
        {
            path: '/login',
            component: Login,
            meta:{
                forVisitors: true
            }
        },
        {
            path: '/register',
            component: Register,
            meta:{
                forVisitors: true
            }
        },
        {
            path: '/feed',
            component: Feed,
            meta: {
                forAuth: true
            }
        },
        {
          path: '/create/products',
          component: require('./components/product/Create.vue').default,
          meta: {
            forAuth: true
          },
          name: 'Create'
        },
      {
        path: '/update/:product/edit',
        component: require('./components/product/Update.vue').default,
        meta: {
          forAuth: true
        },
        name: 'Update'
      },
    ],
  mode:"history"
  // linkActiveClass: 'active'
});

export default router;
