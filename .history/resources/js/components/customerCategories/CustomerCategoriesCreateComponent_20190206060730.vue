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
                    <li class="breadcrumb-item"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item"><router-link :to="{name: 'customer_categories'}">Customer Categories</router-link></li>
                    <li class="breadcrumb-item active">Create</li>
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
                            <div class="panel-heading pull-left">New Category</div>
                            <router-link :to="{name: 'customer_categories'}" class="btn btn-success pull-right">Back</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                
                            </div>

                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <form v-on:submit="saveForm()">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <label class="control-label">Category Name</label>
                                                <input type="text" v-model="customer_categories.category" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <button class="btn btn-success">Create</button>
                                            </div>
                                        </div>
                                    </form>
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
                customer_categories: {
                    category: ''
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCustomerCategory = app.customer_categories;
                axios.post('/api/v1/customerCategory', newCustomerCategory)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your category!");
                    });
            }
        }
    }
</script>