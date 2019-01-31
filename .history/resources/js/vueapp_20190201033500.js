import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/SidebarComponent'
import Example from './components/ExampleComponent'
import Test from './components/TestComponent'
import App2 from './components/BodyComponent'

Vue.use(VueRouter)

Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('body-component', require('./components/BodyComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            component: {default: Test, a: App2}
        },
        {
            path: '/example',
            component: Example
        },    
    ],
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});