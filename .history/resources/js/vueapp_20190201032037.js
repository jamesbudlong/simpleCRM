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
            name: 'test',
            component: Test,
            props: {},
            children: [
                {
                  // A will be rendered in the second <router-view>
                  // when /your-sidebar-url/a is matched
                  path: 'a',
                  component: A
                },
                {
                  // B will be rendered in the second <router-view>
                  // when /your-sidebar-url/b is matched
                  path: 'b',
                  component: B
                }
              ]
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
    router,
});