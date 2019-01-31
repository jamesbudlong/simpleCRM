import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Welcome from './components/Example'
import Page from './components/Test'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'test',
            component: Welcome,
            props: {}
        },
        {
            path: '/example',
            name: 'page',
            component: Page,
            props: {}
        },    
    ],
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});