<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Persons</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" @click="closeSubMenu()"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item"><router-link :to="{name: 'customers'}">Customers</router-link></li>
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
                            <h5 class="card-title pull-left">Add a Person</h5>
                            <router-link :to="{name: 'customers'}" class="btn btn-dark pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form v-on:submit="saveForm()">        
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Kundenummer</label>
                                            <input type="text" v-model="customer_categories.category" class="form-control">
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Category Name</label>
                                            <input type="text" v-model="customer_categories.category" class="form-control">
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Category Name</label>
                                            <input type="text" v-model="customer_categories.category" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Category Name</label>
                                            <input type="text" v-model="customer_categories.category" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Category Name</label>
                                            <input type="text" v-model="customer_categories.category" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 form-group">
                                    <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
                                </div>
                            </form>
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
                        Vue.swal({
                            position: 'center',
                            type: 'success',
                            title: 'Category added..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        app.$router.push({path: '/customer_categories'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        Vue.swal({
                            position: 'center',
                            type: 'error',
                            title: 'Something went wrong! Cannot add category..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        }
    }
</script>