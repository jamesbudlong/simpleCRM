require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Sidebar from './components/SidebarComponent'
import Dashboard from './components/DashboardComponent'
import Tasks from './components/TasksComponent'


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            components: {
                dashboard: Dashboard
            }
        },
        {
            path: '/tasks',
            name: 'tasks',
            components: {
                tasks: Tasks
            }
        },
        {
            path: '/example',
            name: 'example',
            component: Example,
            props: {}
        },    
    ],
})

const app = new Vue({
    el: '#app',
    components: { Sidebar, Dashboard },
    router,
});