<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pipeline</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item"><router-link :to="{name: 'pipeline'}">Pipeline</router-link></li>
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
                            <h3 class="card-title pull-left">Add a Pipeline</h3>
                            <router-link :to="{name: 'customers'}" class="btn btn-dark pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form v-on:submit="saveForm()">        
                                <div class="panel-body">                                  
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" v-model="pipelines.name" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Status</label>
                                            <input type="text" v-model="pipelines.status" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Expected</label>
                                            <input type="text" v-model="pipelines.expected" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Probability</label>
                                            <input type="text" v-model="pipelines.probability" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Responsible User</label>
                                            <select v-model="pipelines.responsible_seller" class="form-control" required>
                                                <option v-for="user in users" v-bind:value="user.id">
                                                    {{user.name}}
                                                </option>
                                            </select>  
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Value</label>
                                            <input type="text" v-model="pipelines.value" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label class="control-label">Description</label>
                                            <textarea rows="3" v-model="pipelines.description" class="form-control" style="resize: none;"></textarea>
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
                pipelines: {},
                users: {},
            }
        },
        mounted() {
            this.getUsers();
        },
        methods: {
            getUsers() {
                axios.get('/user/getAllUsers')
                    .then(response => {
                        //console.log(response);
                        this.users = response.data;
                    });
            },
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