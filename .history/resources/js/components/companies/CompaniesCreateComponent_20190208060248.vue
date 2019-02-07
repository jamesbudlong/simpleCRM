<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Companies</h1>
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
                            <h3 class="card-title pull-left">Add a Company</h3>
                            <router-link :to="{name: 'customers'}" class="btn btn-dark pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form v-on:submit="saveForm()">        
                                <div class="panel-body">

                                    <div class="form-group">
                                        <h4><b>Search in Brønnøysund</b></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label class="control-label">Find companies easily with a search in the Brønnøysund Register Center.</label>
                                            <div class="input-group">
                                                <input type="text" id="search_bar" name="search_bar" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" id="search_button" name="search_button" type="button">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h4><b>Company Information</b></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Customer Number</label>
                                            <input type="text" v-model="customers.customer_number" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Company Name</label>
                                            <input type="text" v-model="customers.company_name" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Company Number</label>
                                            <input type="text" v-model="customers.company_number" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Industry</label>
                                            <input type="text" v-model="customers.industry" class="form-control" required>
                                            <!-- <select v-model="industry" class="form-control" required>
                                                <option v-for="categ in customer_categories" v-bind:value="categ.id">
                                                    {{categ.category}}
                                                </option>
                                            </select>   -->
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Company Type</label>
                                            <input type="text" v-model="customers.company_type" class="form-control" required>
                                            <!-- <select v-model="company_type" class="form-control" required>
                                                <option v-for="user in users" v-bind:value="user.id">
                                                    {{user.name}}
                                                </option>
                                            </select>   -->
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Category</label>
                                            <select v-model="category" class="form-control" required>
                                                <option v-for="categ in customer_categories" v-bind:value="categ.id">
                                                    {{categ.category}}
                                                </option>
                                            </select>  
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Responsible User</label>
                                            <select v-model="responsible_seller" class="form-control" required>
                                                <option v-for="user in users" v-bind:value="user.id">
                                                    {{user.name}}
                                                </option>
                                            </select>  
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h4><b>General Comment</b></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label class="control-label">General Comment</label>
                                            <textarea rows="3" v-model="customers.general_comment" class="form-control" style="resize: none;" required></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h4><b>Address</b></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Mailing Address</label>
                                            <input type="text" v-model="customers.mailing_address" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Visiting Address</label>
                                            <input type="text" v-model="customers.visiting_address" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label class="control-label">Zip Code</label>
                                            <input type="text" v-model="customers.ma_zip_code" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Place</label>
                                            <input type="text" v-model="customers.ma_place" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label class="control-label">Zip Code</label>
                                            <input type="text" v-model="customers.va_zip_code" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Place</label>
                                            <input type="text" v-model="customers.va_place" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" v-model="customers.ma_country" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" v-model="customers.va_country" class="form-control" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h4><b>Contact Information</b></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">E-Mail</label>
                                            <input type="email" v-model="customers.email" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Website</label>
                                            <input type="url" v-model="customers.website" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Telephone</label>
                                            <input type="text" v-model="customers.telephone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Mobile</label>
                                            <input type="text" v-model="customers.mobile" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Fax</label>
                                            <input type="text" v-model="customers.fax" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            
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
                category: 1,
                responsible_seller: 1,
                customer_categories: {},
                users: {},
                customers: {}
            }
        },
        mounted() {
            this.getCategories();
            this.getUsers();
        },
        methods: {
            getCategories() {
                axios.get('/api/v1/customerCategory/getAllCategories')
                    .then(response => {
                        //console.log(response);
                        this.customer_categories = response.data;
                    });
            },
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
                var category = app.category;
                var responsible_seller = app.responsible_seller;
                console.log(responsible_seller);
                var customers = app.customers;
                var customer_type = 'company';
                var newCustomerCategory = {customers,category,responsible_seller,customer_type};

                axios.post('/api/v1/customer', newCustomerCategory)
                    .then(function (resp) {
                        Vue.swal({
                            position: 'center',
                            type: 'success',
                            title: 'Company added..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        app.$router.push({path: '/customers'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        Vue.swal({
                            position: 'center',
                            type: 'error',
                            title: 'Something went wrong! Cannot add company..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            }
        }
    }
</script>