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

                                    <div class="form-group">
                                        <h3>Personal Information</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Customer Number</label>
                                            <input type="text" v-model="customer_categories.customer_number" class="form-control">
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Category</label>
                                            <!-- <input type="text" v-model="customer_categories.customer_category" class="form-control"> -->
                                            <select  v-model="selected" id="deptList">
                                                <option v-for="dept in depts" v-bind:value="dept.Did">
                                                    {{dept.DName}}
                                                </option>
                                            </select>  
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label class="control-label">Responsible User</label>
                                            <input type="text" v-model="customer_categories.responsible_user" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Firstname</label>
                                            <input type="text" v-model="customer_categories.first_name" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Lastname</label>
                                            <input type="text" v-model="customer_categories.last_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h3>General Comment</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label class="control-label">General Comment</label>
                                            <textarea rows="3" v-model="customer_categories.general_comment" class="form-control" style="resize: none;"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h3>Address</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Mailing Address</label>
                                            <input type="text" v-model="customer_categories.mailing_address" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Visiting Address</label>
                                            <input type="text" v-model="customer_categories.visiting_address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label class="control-label">Zip Code</label>
                                            <input type="text" v-model="customer_categories.ma_zip_code" class="form-control">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Place</label>
                                            <input type="text" v-model="customer_categories.ma_place" class="form-control">
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label class="control-label">Zip Code</label>
                                            <input type="text" v-model="customer_categories.va_zip_code" class="form-control">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Place</label>
                                            <input type="text" v-model="customer_categories.va_place" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" v-model="customer_categories.ma_country" class="form-control">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" v-model="customer_categories.va_country" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h3>Contact Information</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">E-Mail</label>
                                            <input type="text" v-model="customer_categories.email" class="form-control">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Website</label>
                                            <input type="text" v-model="customer_categories.website" class="form-control">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Telephone</label>
                                            <input type="text" v-model="customer_categories.telephone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Mobile</label>
                                            <input type="text" v-model="customer_categories.mobile" class="form-control">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">Fax</label>
                                            <input type="text" v-model="customer_categories.fax" class="form-control">
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
        data: {
            depts: {}
        },
        mounted() {
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                axios.get('/api/v1/customerCategory/getCategories')
                    .then(response => {
                        //console.log(response);
                        this.depts = response.data;
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