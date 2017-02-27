import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {
            path: "/login",
            component: require('./components/auth/Login.vue')
        },
        {
            path: "/register",
            component: require('./components/auth/Register.vue')
        }
    ],

    linkActiveClass: 'active',
    mode: 'history'
})

export default router