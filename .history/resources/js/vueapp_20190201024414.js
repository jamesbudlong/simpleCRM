import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('App', require('./components/SidebarComponent.vue').default);
Vue.component('Example', require('./components/ExampleComponent.vue').default);
Vue.component('Test', require('./components/TestComponent.vue').default);

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