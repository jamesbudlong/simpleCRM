import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/SidebarComponent'
import Example from './components/ExampleComponent'
import Test from './components/TestComponent'
import App2 from './components/BodyComponent'
Vue.component('body-component', require('./components/BodyComponent.vue').default);
Vue.use(VueRouter)

Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('body-component', require('./components/BodyComponent.vue').default);

x
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'test',
            component: {default: App2, a: App2},
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
    router
});