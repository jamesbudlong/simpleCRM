<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customer Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" @click="closeSubMenu()"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item active">Customer Categories</li>
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
                            <h4 class="card-title pull-left">Category List</h4>
                            <router-link :to="{name: 'customer_categories_create'}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</router-link>
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
                                        <thead  class="thead-dark">
                                            <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="customer_category, index in customer_categories.data">
                                                <td>{{ customer_category.id }}</td>
                                                <td>{{ customer_category.category }}</td>
                                                <td>{{ customer_category.created_at }}</td>
                                                <td>{{ customer_category.updated_at }}</td>
                                                <td>
                                                    <router-link :to="{name: 'customer_categories_edit', params: {id: customer_category.id}}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i>
                                                    </router-link>
                                                    <a href="#" class="btn btn-danger" v-on:click="deleteEntry(customer_category.id, index)">
                                                        <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <pagination :data="customer_categories" @pagination-change-page="getCategories"></pagination>
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
                customer_categories: {}
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
            this.getCategories();
        },
        methods: {
            getCategories(page = 1) {
                axios.get('/api/v1/customerCategory/?page=' + page)
                    .then(response => {
                        //console.log(response);
                        this.customer_categories = response.data;
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
                                app.getCategories();
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