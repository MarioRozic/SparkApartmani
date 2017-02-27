import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource'

import Router from './routes.js'

Vue.use(VueResource)


new Vue({
  el: '#app',
  render: h => h(App),
  router: Router

})
