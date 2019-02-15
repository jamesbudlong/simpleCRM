<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tasks</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" @click="closeSubMenu()"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item active">Tasks</li>
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
                            <h4 class="card-title pull-left">Tasks List</h4>
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
                                        <thead  class="thead-dark">
                                            <tr>
                                                <th>Done</th>
                                                <th>Decay</th>
                                                <th>Responsible Seller</th>
                                                <th>Customer/Opportunity</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="task, index in tasks.data">
                                                <td>done?</td>
                                                <td>{{ task.decay }}</td>
                                                <td>{{ task.user_name }}</td>
                                                <td>customer name</td>
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
                tasks: {}
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
            this.getTasks();
        },
        methods: {
            getTasks(page = 1) {
                axios.get('/api/v1/tasks/?page=' + page)
                    .then(response => {
                        //console.log(response);
                        this.tasks = response.data;
                    });
            }
        }
    }
</script>