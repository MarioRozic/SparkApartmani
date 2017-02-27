import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource'

import Router from './routes.js'

import Auth from './packages/auth/Auth.js'

Vue.use(VueResource)
Vue.use(Auth)

Vue.http.interceptors.push(function(request, next) {
  console.log('test');

  request.headers.set('Authorization', 'Bearer ' + Vue.auth.getToken());

  next();
});

Vue.http.options.root = 'http://localhost:8000'

Router.beforeEach(
  (to, from, next) => {
    if(to.matched.some(record => record.meta.forVisitors)) {
      if(Vue.auth.isAuthenticated()) {
        console.log('redirect to profile')
        next({
          path: '/profile'
        })   
      } else next()
    } else if (to.matched.some(record => record.meta.forAuth)) {
      if(!Vue.auth.isAuthenticated()) {
        console.log('redirect to profile')
        next({
          path: '/login'
        }) 
      } else next() 
    }
    
    else next()
  }
)


new Vue({
  el: '#app',
  render: h => h(App),
  router: Router

})
