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
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><router-link :to="{name: 'customer_categories'}">Create Category</router-link></li>
                    <li class="breadcrumb-item active">Create</li>
                    <router-link :to="{name: 'customer_categories_create'}" class="btn btn-success pull-right">Create Category</router-link>
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
                            <!-- <h5 class="card-title">Customer Categories</h5> -->
                            <router-link :to="{name: 'customer_categories_create'}" class="btn btn-success pull-right">Create new Category</router-link>
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
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th width="100"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr v-for="customer_category, index in customer_categories">
                                            <td>{{ customer_category.id }}</td>
                                            <td>{{ customer_category.category }}</td>
                                            <td>{{ customer_category.created_at }}</td>
                                            <td>{{ customer_category.updated_at }}</td>
                                            <td>
                                                <router-link :to="{name: 'customer_categories_edit', params: {id: customer_category.id}}" class="btn btn-xs btn-default">
                                                    Edit
                                                </router-link>
                                                <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(customer_category.id, index)">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                    </table>
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