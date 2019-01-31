import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/SidebarComponent'
import Example from './components/ExampleComponent'
import Test from './components/TestComponent'
import App2 from './components/BodyComponent'

Vue.use(VueRouter)



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'test',
            component: {default: Test, a: App2},
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
    components: { App },
    router,
});