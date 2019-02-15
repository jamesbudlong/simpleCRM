require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2'
Vue.use(VueRouter)
Vue.use(VueSweetalert2)
window.Vue = require('vue');

import Sidebar from './components/SidebarComponent'
import Dashboard from './components/DashboardComponent'
import Tasks from './components/tasks/TasksComponent'
import History from './components/HistoryComponent'
import Exploration from './components/ExplorationComponent'

import Pipeline from './components/pipeline/PipelineComponent'
import PipelineCreate from './components/pipeline/PipelineCreateComponent'

import Epost from './components/EpostComponent'
import Administration from './components/AdministrationComponent'

//Customer Categories
import CustomerCategoriesIndex from './components/customerCategories/CustomerCategoriesIndexComponent'
import CustomerCategoriesCreate from './components/customerCategories/CustomerCategoriesCreateComponent'
import CustomerCategoriesEdit from './components/customerCategories/CustomerCategoriesEditComponent'

//Customers
import Customers from './components/customers/CustomersComponent'
import PersonsCreate from './components/customers/PersonsCreateComponent' //Persons
import CompaniesCreate from './components/customers/CompaniesCreateComponent' //Companies
import CustomerProfile from './components/customers/CustomerProfileComponent' //CustomerProfileComponent

//Users
import Users from './components/UsersComponent'

//Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

//DateTimePicker
Vue.component('date-picker', require('vue-bootstrap-datetimepicker'));
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

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
            path: '/history',
            name: 'history',
            components: {
                history: History
            }
        },
        {
            path: '/customers',
            name: 'customers',
            components: {
                customers: Customers
            }
        },
        {
            path: '/customers/view/:id',
            name: 'customers_profile',
            components: {
                customers_profile: CustomerProfile
            }
        },
        {   path: '/companies/create',
            name: 'companies_create', 
            components: {
                companies_create: CompaniesCreate
            }
        },
        {   path: '/persons/create',
            name: 'persons_create', 
            components: {
                persons_create: PersonsCreate
            }
        },
        {
            path: '/exploration',
            name: 'exploration',
            components: {
                exploration: Exploration
            }
        },
        {
            path: '/pipeline',
            name: 'pipeline',
            components: {
                pipeline: Pipeline
            }
        },
        {   path: '/pipeline/create/:id',
            name: 'pipeline_create', 
            components: {
                pipeline_create: PipelineCreate
            }
        },
        {
            path: '/epost',
            name: 'epost',
            components: {
                epost: Epost
            }
        },
        {
            path: '/administration',
            name: 'administration',
            components: {
                administration: Administration
            }
        },
        {
            path: '/customer_categories',
            name: 'customer_categories',
            components: {
                customer_categories: CustomerCategoriesIndex
            }
        },
        {   path: '/customer_categories/create',
            name: 'customer_categories_create', 
            components: {
                customer_categories_create: CustomerCategoriesCreate
            }
        },
        {   path: '/customer_categories/edit/:id',
            name: 'customer_categories_edit', 
            components: {
                customer_categories_edit: CustomerCategoriesEdit
            }
        },
        {
            path: '/users',
            name: 'users',
            components: {
                users: Users
            }
        }     
    ],
})

const app = new Vue({
    el: '#app',
    components: { 
        Sidebar, 
        Dashboard, 
        Tasks, 
        History, 
        Customers, 
        CustomerProfile,
        CompaniesCreate,
        PersonsCreate,
        Exploration, 
        Pipeline, 
        PipelineCreate,
        Epost, 
        Administration,
        CustomerCategoriesIndex,
        CustomerCategoriesCreate,
        CustomerCategoriesEdit,
        Users
    },
    router
})

Vue.mixin({
    methods: {
        closeSubMenu(){
            if ($(".has-treeview").hasClass("menu-open")) {
                //open
                $(".has-treeview").removeClass("menu-open");
                $(".nav-treeview").slideUp();
            }
        }
    }
})


