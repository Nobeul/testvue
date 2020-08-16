import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import d from '../components/d.vue'
import e from '../components/e.vue'

const routes = [
    { 
        path: '/d', 
        component: d 
    },
    { 
        path: '/e', 
        component: e 
    }
    
]

export default new Router({
    mode: 'history',
    routes
})