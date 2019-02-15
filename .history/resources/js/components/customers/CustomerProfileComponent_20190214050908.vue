<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item"><router-link :to="{name: 'customers'}">Customers</router-link></li>
                    <li class="breadcrumb-item active">View</li>
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
                            <h5 class="card-title pull-left">Customer Profile</h5>
                            <router-link :to="{name: 'customers'}" class="btn btn-dark pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="card-body col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <dt>Mailing Address</dt>
                                                    </div>
                                                    <div>
                                                       {{ customers.mailing_address }}
                                                       <br />
                                                       {{ customers.ma_zip_code }}
                                                       {{ customers.ma_place }}
                                                       <br />
                                                       {{ customers.ma_country }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <dt>Visiting Address</dt>
                                                    </div>
                                                    <div>
                                                        {{ customers.visiting_address }}
                                                       <br />
                                                       {{ customers.va_zip_code }}
                                                       {{ customers.va_place }}
                                                       <br />
                                                       {{ customers.va_country }}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div>
                                                            <i class="fa fa-list icon-fixed-width"></i>
                                                        </div>
                                                        <div>
                                                           {{ customers.company_number }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div>
                                                            <i class="fa fa-phone icon-fixed-width"></i>
                                                        </div>
                                                        <div>
                                                            {{ customers.telephone }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div>
                                                            <i class="fa fa-mobile icon-fixed-width"></i>
                                                        </div>
                                                        <div>
                                                            {{ customers.mobile }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div>
                                                            <i class="fa fa-globe icon-fixed-width"></i>
                                                        </div>
                                                        <div>
                                                            {{ customers.website }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div>
                                                            <i class="fa fa-envelope icon-fixed-width"></i>
                                                        </div>
                                                        <div>
                                                            {{ customers.fax }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- tab headers -->
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true"><i class="fa fa-comments-o"></i> History (0)</a>
                                                </li>
                                                <li class="nav-item ">
                                                    <a class="nav-link" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false"><i class="fa fa-tasks"></i> Tasks (0)</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false"><i class="fa fa-user"></i> Contacts (0)</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false"><i class="fa fa-files-o"></i> Files (0)</a>
                                                </li>
                                            </ul>
                                            <!-- end headers -->
                                            <!-- tab contents -->
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab">
                                                    ASD
                                                </div>
                                                <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                                                    QWE
                                                </div>
                                                <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                                    ZXC
                                                </div>
                                                <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                                                    RTY
                                                </div>
                                            </div>
                                            <!-- end tab contents -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Industry</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.industry }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Company Type</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.company_type }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Category</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.customer_category }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Responsible User</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.responsible_seller }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Created</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.created_at }} by {{ customers.created_by }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Last Updated</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.updated_at }} by {{ customers.updated_by }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Pipeline</h5>
                                        </div>
                                        <div class="card-body">
                                            <button class="btn btn-success pull-right">New Opportunity</button>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Tagger</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Followers</h5>
                                        </div>
                                        <div class="card-body">
                                            <button class="btn btn-success">Follow</button>
                                        </div>
                                    </div>

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
        mounted() {
            this.getCategory();

            let app = this;
            let id = app.$route.params.id;
            app.customerID = id;
            
            axios.get('/api/v1/customer/' + id)
                .then(function (resp) {
                    app.customers = resp.data;
                })
                .catch(function () {
                    Vue.swal({
                        position: 'center',
                        type: 'error',
                        title: 'Something went wrong! Cannot load customer..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
        },
        data: function () {
            return {
                customerID: null,
                customers: {

                },
                responsible_seller: null,
                category: null
            }
        },
        methods: {
            getCategory() {
                let id = app.$route.params.id;
                axios.get('/api/v1/customerCategory/getCategory' + id)
                    .then(function (resp) {
                        app.category = resp.data;
                    })
                    .catch(function () {
                        Vue.swal({
                            position: 'center',
                            type: 'error',
                            title: 'Something went wrong! Cannot get category..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            },
            // saveForm() {
            //     event.preventDefault();
            //     var app = this;
            //     var newCustomerCategory = app.customer_categories;
            //     axios.patch('/api/v1/customerCategory/' + app.customerCategoryID, newCustomerCategory)
            //         .then(function (resp) {
            //             Vue.swal({
            //                 position: 'center',
            //                 type: 'success',
            //                 title: 'Category updated..',
            //                 showConfirmButton: false,
            //                 timer: 2000
            //             });
            //             app.$router.push({path: '/customer_categories'});
            //         })
            //         .catch(function (resp) {
            //             console.log(resp);
            //             Vue.swal({
            //                 position: 'center',
            //                 type: 'error',
            //                 title: 'Something went wrong! Cannot update category..',
            //                 showConfirmButton: false,
            //                 timer: 2000
            //             });
            //         });
            // }
        }
    }
</script>