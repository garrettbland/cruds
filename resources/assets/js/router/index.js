import Vue from 'vue'
import Router from 'vue-router'

import Home from '../views/Home.vue'
import Cruds from '../views/Cruds.vue'
import NotFound from '../views/NotFound.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      name: 'home',
      path: '/',
      component: Home
    },
    {
      name: 'cruds',
      path: '/cruds',
      component: Cruds
    },
    {
      name: '404',
      path: '/404',
      component: NotFound
    },
    {
      name: '*',
      path: '*',
      redirect: '/404'
    },
  ],
  mode: 'history',
  history: true,
})
