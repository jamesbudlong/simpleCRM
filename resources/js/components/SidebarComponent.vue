<template>
    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div style="background-color: lightslategrey;">
        <a href="/" class="brand-link">
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
                <router-link :to="{ name: 'dashboard' }" class="nav-item nav-link open_close_dropdown">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </router-link>
                <router-link :to="{ name: 'tasks' }" class="nav-item nav-link open_close_dropdown">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Tasks</p>
                </router-link>
                <router-link :to="{ name: 'history' }" class="nav-item nav-link open_close_dropdown">
                    <i class="nav-icon fa fa-history"></i>
                    <p>History</p>
                </router-link>

                <li class="nav-item has-treeview other_dropdown_menu">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        Customers
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <router-link :to="{ name: 'customers' }" class="nav-item nav-link">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>View All Customers</p>
                        </router-link>

                        <router-link :to="{ name: 'persons_create' }" class="nav-item nav-link">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>Add A Person</p>
                        </router-link>

                        <router-link :to="{ name: 'companies_create' }" class="nav-item nav-link">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>Add A Company</p>
                        </router-link>
                    </ul>
                </li>

                <router-link :to="{ name: 'exploration' }" class="nav-item nav-link open_close_dropdown">
                    <i class="nav-icon fa fa-rocket"></i>
                    <p>Exploration</p>
                </router-link>

                <router-link :to="{ name: 'pipeline' }" class="nav-item nav-link open_close_dropdown">
                    <i class="nav-icon fa fa-bar-chart-o"></i>
                    <p>Pipeline</p>
                </router-link>

                <router-link :to="{ name: 'epost' }" class="nav-item nav-link open_close_dropdown">
                    <i class="nav-icon fa fa-envelope"></i>
                    <p>E-post</p>
                </router-link>

                <li class="nav-item has-treeview other_dropdown_menu">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        Administration
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <router-link :to="{ name: 'customer_categories' }" class="nav-item nav-link">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>Customer Categories</p>
                        </router-link>
                        <router-link :to="{ name: 'users' }" class="nav-item nav-link">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>Users</p>
                        </router-link>
                    </ul>
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

