import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import users from '../components/Users.vue'
import e from '../components/e.vue'
import ContactForm from '../components/ContactForm.vue'

const routes = [
    { 
        path: '/users', 
        component: users 
    },
    { 
        path: '/e', 
        component: e
    },
    { 
        path: '/contact', 
        component: ContactForm
    }
    
]

export default new Router({
    mode: 'history',
    routes
})