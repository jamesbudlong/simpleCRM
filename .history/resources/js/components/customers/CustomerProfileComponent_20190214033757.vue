<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customer Profile</h1>
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
                        <div class="card-body">
                            <div class="card col-md-8">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            Mailing Address
                                        </div>
                                        <div class="col-md-4">
                                            Visiting Address
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                first
                                            </div>
                                            <div class="row">
                                                first
                                            </div>
                                            <div class="row">
                                                first
                                            </div>
                                            <div class="row">
                                                first
                                            </div>
                                            <div class="row">
                                                first
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card col-md-8">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- table here -->
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
        // mounted() {
        //     let app = this;
        //     let id = app.$route.params.id;
        //     app.customerCategoryID = id;
        //     axios.get('/api/v1/customerCategory/' + id)
        //         .then(function (resp) {
        //             app.customer_categories = resp.data;
        //         })
        //         .catch(function () {
        //             Vue.swal({
        //                 position: 'center',
        //                 type: 'error',
        //                 title: 'Something went wrong! Cannot load category..',
        //                 showConfirmButton: false,
        //                 timer: 2000
        //             });
        //         });
        // },
        // data: function () {
        //     return {
        //         customerCategoryID: null,
        //         customer_categories: {
        //             category: ''
        //         }
        //     }
        // },
        // methods: {
        //     saveForm() {
        //         event.preventDefault();
        //         var app = this;
        //         var newCustomerCategory = app.customer_categories;
        //         axios.patch('/api/v1/customerCategory/' + app.customerCategoryID, newCustomerCategory)
        //             .then(function (resp) {
        //                 Vue.swal({
        //                     position: 'center',
        //                     type: 'success',
        //                     title: 'Category updated..',
        //                     showConfirmButton: false,
        //                     timer: 2000
        //                 });
        //                 app.$router.push({path: '/customer_categories'});
        //             })
        //             .catch(function (resp) {
        //                 console.log(resp);
        //                 Vue.swal({
        //                     position: 'center',
        //                     type: 'error',
        //                     title: 'Something went wrong! Cannot update category..',
        //                     showConfirmButton: false,
        //                     timer: 2000
        //                 });
        //             });
        //     }
        // }
    }
</script>