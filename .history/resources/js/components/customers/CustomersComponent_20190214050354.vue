<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" @click="closeSubMenu()"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item active">Customer</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title pull-left">Customers List</h4>
                            <!-- <router-link :to="{name: 'customer_categories_create'}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</router-link> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">Companies list</div> -->
                                <div class="form-group">
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Customer Number</th>
                                                <th>Category</th>
                                                <th>Company Number</th>
                                                <th>Name</th>
                                                <th>Zip/Location</th>
                                                <th>Telephone</th>
                                                <th>Mobile</th>
                                                <th>Responsible User</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="customer, index in customers.data">
                                                <td>{{ customer.customer_number }}</td>
                                                <td>{{ customer.category_name }}</td>
                                                <td>{{ customer.company_number }}</td>
                                                <td>{{ customer.first_name }} {{ customer.last_name }} {{customer.company_name}}</td>
                                                <td>location</td>
                                                <td>{{ customer.telephone }}</td>
                                                <td>{{ customer.mobile }}</td>
                                                <td>{{ customer.user_name }}</td>
                                                <td>{{ customer.created_at }}</td>
                                                <td>
                                                    <router-link :to="{name: 'customers_profile', params: {id: customer.id}}" class="btn btn-primary">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <pagination :data="customers" @pagination-change-page="getCustomers"></pagination>
                                </div>
                            </div>
                        </div>
                        <!-- ./card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
</template>

<script>
    export default {
        data: function () {
            return {
                customers: {}
            }
        },
        mounted() {
            this.getCustomers();
        },
        methods: {
            getCustomers(page = 1) {
                axios.get('/api/v1/customer/?page=' + page)
                    .then(response => {
                        console.log(response);
                        this.customers = response.data;
                    });
            },
        }
    }
</script>