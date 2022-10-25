import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from "./pages/Home.vue"
import Photo from "./pages/Photo.vue";


Vue.use(VueRouter)


const routes = [
    {
        path: '/test',
        component: Home,

    },
    {
        path: '/photo',
        component: Photo
    },
]


// VueRouterのインスタンス化
const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
