<template>
    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div style="background-color: lightslategrey;">
        <a href="home" class="brand-link">
        <img src="https://cdn.crm1.no/img/crm_150.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Simple CRM</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="https://www.atlassian.com/dam/jcr:13a574c1-390b-4bfb-956b-6b6d114bf98c/max-rehkopf.png" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <!-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                        <router-link :to="{ name: 'tasks' }">Tasks</router-link>
                    </p>
                    </a>
                </li>
                <li class="nav-item nav-link">
                    <a href="#" class="">
                    <i class="nav-icon fa fa-history"></i>
                    <p>
                        <router-link :to="{ name: 'history' }">History</router-link>
                    </p>
                    </a>
                </li>

                <!-- edit start -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        Customers
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p><router-link :to="{ name: 'customers' }">View All Customer</router-link></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-plus nav-icon"></i>
                        <p><router-link :to="{ name: 'persons' }">Add A Person</router-link></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fa fa-plus nav-icon"></i>
                        <p><router-link :to="{ name: 'companies' }">Add A Company</router-link></p>
                        </a>
                    </li>
                    </ul>
                </li>

                <!-- edit end -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-rocket"></i>
                    <p>
                        <router-link :to="{ name: 'exploration' }">Exploration</router-link>
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-bar-chart-o"></i>
                    <p>
                        <router-link :to="{ name: 'pipeline' }">Pipeline</router-link>
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-envelope"></i>
                    <p>
                        <router-link :to="{ name: 'epost' }">E-post</router-link>
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-cogs"></i>
                    <p>
                        <router-link :to="{ name: 'administration' }">Administration</router-link>
                    </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
    export default {}
</script>

