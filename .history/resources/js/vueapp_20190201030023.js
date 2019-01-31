import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/SidebarComponent'
import App2 from './components/SidebarComponent'
import Example from './components/ExampleComponent'
import Test from './components/TestComponent'

Vue.use(VueRouter)

Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('body-component', require('./components/BodyComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'test',
            component: Test,
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