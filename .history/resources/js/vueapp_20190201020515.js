import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Welcome from './components/Welcome'
import Page from './components/Page'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'welcome',
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