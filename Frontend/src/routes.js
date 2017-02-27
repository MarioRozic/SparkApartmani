import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {
            path: "/login",
            component: require('./components/auth/Login.vue'),
            meta: {
                forVisitors: true
            }
        },
        {
            path: "/register",
            component: require('./components/auth/Register.vue'),
            meta: {
                forVisitors: true
            }
        },
        {
            path: "/profile",
            component: require('./components/Profile.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: "/",
            component: require('./components/Home.vue'),
            meta: {
                forVisitors: false
            }
        }
    ],

    linkActiveClass: 'active',
    //mode: 'history'
})

export default router