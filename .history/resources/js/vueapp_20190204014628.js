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
        Administration 
    },
    router
});

//Custom jQuery

$(".hh_sf").next().addClass("collapsed").slideUp();

$(".hh_main").on('click', '.hh_sf', function (event) {
            event.preventDefault();
            var currentClass = $(this).next().prop('class');
            if (currentClass == "hh_inner expanded") {
                $(this).next().removeClass("expanded");
                $(this).next().addClass("collapsed");
                $(this).next().slideUp();
            } else {
                $(".expanded").slideUp().addClass("collapsed").removeClass("expanded");

                $(this).next().removeClass("collapsed");
                $(this).next().addClass("expanded");
                $(this).next().slideDown();
            }

        });