require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
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
import CustomerCategories from './components/CustomerCategoriesComponent'

Vue.use(VueRouter)

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
                customer_categories: CustomerCategories
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
        CustomerCategories
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