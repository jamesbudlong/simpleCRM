<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
                            <h4 class="card-title pull-left">Users List</h4>
                            <router-link :to="{name: 'users_create'}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</router-link>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user, index in users.data">
                                                <td>{{ user.id }}</td>
                                                <td>{{ user.name }}</td>
                                                <td>{{ user.email }}</td>
                                                <td>telephone field here</td>
                                                <td>{{ user.created_at }}</td>
                                                <td>{{ user.updated_at }}</td>
                                                <td>
                                                    <router-link :to="{name: 'customer_categories_edit', params: {id: user.id}}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i>
                                                    </router-link>
                                                    <a href="#" class="btn btn-danger" v-on:click="deleteEntry(user.id, index)">
                                                        <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <!-- <pagination :data="users" @pagination-change-page="loadUsers"></pagination> -->
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
        data(){
            return {
                users: {}
            }
        },
        mounted(){
            console.log("Mounted!");
        },
        created(){
            this.loadUsers();
        },
        methods: {
            loadUsers(){
                axios.get("/user/getAllUsers").then(({data}) => (this.users = data.data));
            }
        }
    }
</script>