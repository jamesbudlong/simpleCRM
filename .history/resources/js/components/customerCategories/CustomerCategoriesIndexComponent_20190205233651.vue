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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                        <!-- <tr v-for="company, index in companies">
                                            <td>{{ company.name }}</td>
                                            <td>{{ company.address }}</td>
                                            <td>{{ company.website }}</td>
                                            <td>{{ company.email }}</td>
                                            <td>
                                                <router-link :to="{name: 'editCompany', params: {id: company.id}}" class="btn btn-xs btn-default">
                                                    Edit
                                                </router-link>
                                                <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(company.id, index)">
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

<script>
    export default {
        data: function () {
            return {
                customer_categories: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/customerCategory')
                .then(function (resp) {
                    app.customer_categories = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load customer categories!");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/customerCategory/' + id)
                        .then(function (resp) {
                            app.customer_categories.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete customer category!");
                        });
                }
            }
        }
    }
</script>