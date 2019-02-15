<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customer List</h1>
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
                            <h4 class="card-title pull-left">View All Customers</h4>
                            <!-- <router-link :to="{name: 'customer_categories_create'}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</router-link> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">Companies list</div> -->
                                <div class="form-group">
                                    
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped">
                                    <thead>
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
                                        <tr v-for="customer, index in customers">
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
                                                <router-link :to="{name: 'customer_profile', params: {id: customer.id}}" class="btn btn-default">
                                                    <i class="fa fa-eye" aria-hidden="true"> Edit</i>
                                                </router-link>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
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
            // var app = this;
            // axios.get('/api/v1/customerCategory')
            //     .then(function (resp) {
            //         app.customer_categories = resp.data;
            //     })
            //     .catch(function (resp) {
            //         console.log(resp);
            //         Vue.swal({
            //             position: 'center',
            //             type: 'error',
            //             title: 'Something went wrong! Cannot load categories..',
            //             showConfirmButton: false,
            //             timer: 2000
            //         });
            //     });
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
            deleteEntry(id, index) {
                Vue.swal({
                    title: 'Are you sure you want to delete this category?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        var app = this;
                        axios.delete('/api/v1/customerCategory/' + id)
                            .then(function (resp) {
                                Vue.swal({
                                    position: 'center',
                                    type: 'success',
                                    title: 'Category deleted..',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                app.customer_categories.splice(index, 1);
                            })
                            .catch(function (resp) {
                                Vue.swal({
                                    position: 'center',
                                    type: 'error',
                                    title: 'Something went wrong! Cannot delete category..',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            });
                    }
                })
            }
        }
    }
</script>