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
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <button class="btn btn-success pull-right">New History</button>
                                                        </div>
                                                        <div class="card-body">
                                                            asd
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <button class="btn btn-success pull-right">New Task</button>
                                                        </div>
                                                        <div class="card-body">
                                                            asd
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <button class="btn btn-success pull-right" v-on:click="seen = !seen" v-if="seen"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
                                                            <button class="btn btn-dark pull-right" v-on:click="seen = !seen; getContacts()" v-if="!seen"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                                        </div>
                                                        <div class="card-body">
                                                            <div v-if="seen"><!-- contacts view -->
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                    <thead  class="thead-dark">
                                                                        <tr>
                                                                        <th>ID</th>
                                                                        <th>Firstname</th>
                                                                        <th>Lastname</th>
                                                                        <th>Title</th>
                                                                        <th>Email</th>
                                                                        <th>Telephone</th>
                                                                        <th>Mobile</th>
                                                                        <th>Comment</th>
                                                                        <th width="10%">Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="contact, index in contactsList">
                                                                            <td>{{ contact.id }}</td>
                                                                            <td>{{ contact.first_name }}</td>
                                                                            <td>{{ contact.last_name }}</td>
                                                                            <td>{{ contact.title }}</td>
                                                                            <td>{{ contact.email }}</td>
                                                                            <td>{{ contact.telephone }}</td>
                                                                            <td>{{ contact.mobile }}</td>
                                                                            <td>{{ contact.comment }}</td>
                                                                            <td>
                                                                                <!-- <router-link :to="{name: 'customer_categories_edit', params: {id: customer_category.id}}" class="btn btn-primary">
                                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i>
                                                                                </router-link>
                                                                                <a href="#" class="btn btn-danger" v-on:click="deleteEntry(customer_category.id, index)">
                                                                                    <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                                                                </a> -->
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div v-if="!seen"> <!-- add contact form -->
                                                                <form v-on:submit="saveContactForm(seen)">   
                                                                    <div class="card-body col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6 form-group">
                                                                                <label class="control-label">Firstname</label>
                                                                                <input type="text" v-model="contacts.first_name" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6 form-group">
                                                                                <label class="control-label">E-mail</label>
                                                                                <input type="text" v-model="contacts.email" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 form-group">
                                                                                <label class="control-label">Lastname</label>
                                                                                <input type="text" v-model="contacts.last_name" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6 form-group">
                                                                                <label class="control-label">Telephone</label>
                                                                                <input type="text" v-model="contacts.telephone" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 form-group">
                                                                                <label class="control-label">Title</label>
                                                                                <input type="text" v-model="contacts.title" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6 form-group">
                                                                                <label class="control-label">Mobile</label>
                                                                                <input type="text" v-model="contacts.mobile" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 form-group">
                                                                                <label class="control-label">Comment</label>
                                                                                <textarea rows="3" v-model="contacts.comment" class="form-control" style="resize: none;"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 form-group">
                                                                            <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
                                                                        </div>
                                                                    </div>     
                                                                </form>                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <button class="btn btn-success pull-right">New File</button>
                                                        </div>
                                                        <div class="card-body">
                                                            asd
                                                        </div>
                                                    </div>
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
                                                    {{ customers.category_name }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Responsible Seller</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.user_name }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Created</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.created_at }} by {{ customers.user_name }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Last Updated</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{ customers.updated_at }} by {{ customers.user_name }}
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
            let app = this;
            let id = app.$route.params.id;
            app.customerID = id;
            axios.get('/api/v1/customer/' + id)
                .then(function (resp) {
                    console.log(resp);
                    app.customers = resp.data[0];
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

            this.getContacts(id);
        },
        data: function () {
            return {
                customerID: null,
                customers: {},
                contacts: {},
                seen: true
            }
        },
        methods: {
            saveContactForm(seen) {
                event.preventDefault();
                var app = this;
                var customer_id = app.customerID;
                var contacts = app.contacts;
                var newContacts = {contacts,customer_id};

                axios.post('/api/v1/contacts', newContacts)
                    .then(function (resp) {
                        Vue.swal({
                            position: 'center',
                            type: 'success',
                            title: 'Contact added..',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        app.contacts = {};
                        app.seen = !seen;
                        getContacts(customer_id);
                        //app.$router.push({path: '/customer_categories'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        Vue.swal({
                            position: 'center',
                            type: 'error',
                            title: 'Something went wrong! Cannot add contact..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            },
            getContacts(id) {
                axios.get('/api/v1/contacts/getAllContactsByCustomerID/' + id)
                    .then(response => {
                        //console.log(response);
                        this.contactsList = response.data;
                        console.log(response.data);
                    });
            }
        }
    }
</script>