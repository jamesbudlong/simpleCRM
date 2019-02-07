require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2'
Vue.use(VueRouter)
Vue.use(VueSweetalert2)
window.Vue = Vue;

import Sidebar from './components/SidebarComponent'
import Dashboard from './components/DashboardComponent'
import Tasks from './components/TasksComponent'
import History from './components/HistoryComponent'
import Customers from './components/CustomersComponent'
import Companies from './components/CompaniesComponent'
import Persons from './components/PersonsComponent'
import Exploration from './components/ExplorationComponent'
import Pipeline from './components/PipelineComponent'
import Epost from './components/EpostComponent'
import Administration from './components/AdministrationComponent'

//Customer Categories
import CustomerCategoriesIndex from './components/customerCategories/CustomerCategoriesIndexComponent'
import CustomerCategoriesCreate from './components/customerCategories/CustomerCategoriesCreateComponent'
import CustomerCategoriesEdit from './components/customerCategories/CustomerCategoriesEditComponent'

//Users
import Users from './components/UsersComponent'

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
            path: '/companies',
            name: 'companies',
            components: {
                companies: Companies
            }
        },
        {
            path: '/persons',
            name: 'persons',
            components: {
                persons: Persons
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
        Companies, 
        Persons, 
        Exploration, 
        Pipeline, 
        Epost, 
        Administration,
        CustomerCategoriesIndex,
        CustomerCategoriesCreate,
        CustomerCategoriesEdit,
        Users
    },
    router
});

//Custom jQuery

$(".open_close_dropdown").on("click", function (event) {
    event.preventDefault();

    if ($(".has-treeview").hasClass("menu-open")) {
        //open
        $(".has-treeview").removeClass("menu-open");
        $(".nav-treeview").slideUp();
    }
});

$(".other_dropdown_menu").on("click", function (event) {
    event.preventDefault();

    if(!$(this).hasClass("menu-open")){
        $('.has-treeview').not(this).each(function(){
            $(".has-treeview").removeClass("menu-open");
            $(".nav-treeview").slideUp();
        });
    }    
});