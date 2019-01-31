require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Sidebar from './components/SidebarComponent'
import Example from './components/ExampleComponent'
import Test from './components/TestComponent'
import Body from './components/BodyComponent'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'test',
            components: {
                default: Test,
                a: Body
              },
            props: {}
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
    components: { Sidebar, Body },
    router,
});