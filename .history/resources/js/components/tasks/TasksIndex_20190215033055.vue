<template>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success pull-right" v-on:click="seen1 = !seen1; seen2 = true;" v-if="seen1"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
            <button class="btn btn-dark pull-right backButton" v-on:click="seen1 = true; seen2 = false; seen3 = false" v-if="seen2 || seen3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </div>
        <div class="card-body">
            <div v-if="seen1"><!-- contacts view -->
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
                                <a href="#" class="btn btn-primary" v-on:click="seen3 = true; seen1 = false; getContactByID(contact.id);">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i>
                                </a>
                                <a href="#" class="btn btn-danger" v-on:click="deleteEntry(contact.id, index)">
                                    <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                </a>
                            </td>
                        </tr> 
                    </tbody>
                    </table>
                </div>
            </div>
            <div v-if="seen2"> <!-- add contact form -->
                <form v-on:submit="saveTaskForm()">   
                    <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="control-label">Responsible User</label>
                                <select v-model="tasksAdd.responsible_seller" class="form-control" required>
                                    <option v-for="user in users" v-bind:value="user.id">
                                        {{user.name}}
                                    </option>
                                </select>  
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label">Status</label>
                                <select v-model="tasksAdd.status" class="form-control">
                                    <option value="not_started">Not Started</option>
                                    <option value="started">Started</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="control-label">Priority</label>
                                <select v-model="tasksAdd.priority" class="form-control" required>
                                    <option value="low">Low</option>
                                    <option value="normal">Normal</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label">Decay</label>
                                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                                <!-- <datetime class="form-control" format="DD-MM-YYYY h:i:s" width="300px" v-model="tasksAdd.decay"></datetime> -->
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
            <div v-if="seen3"> <!-- add contact form -->
                <form v-on:submit="updateContactForm(contacts_edit.id)">   
                    <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="control-label">Firstname</label>
                                <input type="text" v-model="contacts_edit.first_name" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label">E-mail</label>
                                <input type="text" v-model="contacts_edit.email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="control-label">Lastname</label>
                                <input type="text" v-model="contacts_edit.last_name" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label">Telephone</label>
                                <input type="text" v-model="contacts_edit.telephone" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="control-label">Title</label>
                                <input type="text" v-model="contacts_edit.title" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label">Mobile</label>
                                <input type="text" v-model="contacts_edit.mobile" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label">Comment</label>
                                <textarea rows="3" v-model="contacts_edit.comment" class="form-control" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                        </div>
                    </div>     
                </form>
            </div>
        </div>
    </div>


    
</template>

<script>

import datetime from 'vuejs-datetimepicker';

export default {
    components: { datetime },
    mounted() {
        let app = this;
        let id = app.$route.params.id;
        let cust_id = app.$route.params.id;
        ///console.log("asdasd "+ id);
        this.getContacts(id);
        this.getUsers();
    },
    data: function () {
        return {
            tasksAdd: {},
            contactsList: {},
            contacts: {},
            contacts_edit: {},
            users: {},
            seen1: true,
            seen2: false,
            seen3: false
        }
    },
    methods: {
        getUsers() {
            axios.get('/user/getAllUsers')
                .then(response => {
                    this.users = response.data;
                });
        },
        getContacts(id) {
            axios.get('/api/v1/contacts/getAllContactsByCustomerID/' + id)
                .then(response => {
                    this.contactsList = response.data;
                });
        },
        getContactByID(edit_id){
            let app = this;
            axios.get('/api/v1/contacts/' + edit_id)
                .then(function (resp) {
                    app.contacts_edit = resp.data;
                })
                .catch(function () {
                    Vue.swal({
                        position: 'center',
                        type: 'error',
                        title: 'Something went wrong! Cannot load contact..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
        },
        saveTaskForm(seen) {
            event.preventDefault();
            var app = this;
            var customer_id = app.$route.params.id;
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
                    $('.backButton').click();
                    app.getContacts(customer_id);
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
        updateContactForm(contact_id) {
            event.preventDefault();
            var app = this;
            var newContactUpdate = app.contacts_edit;
            var customer_id = app.$route.params.id;
            axios.patch('/api/v1/contacts/' + contact_id, newContactUpdate)
                .then(function (resp) {
                    Vue.swal({
                        position: 'center',
                        type: 'success',
                        title: 'Contact updated..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    app.contacts_edit = {};
                    $('.backButton').click();
                    app.getContacts(customer_id);
                })
                .catch(function (resp) {
                    console.log(resp);
                    Vue.swal({
                        position: 'center',
                        type: 'error',
                        title: 'Something went wrong! Cannot update contact..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
        },
        deleteEntry(id, index) {
            event.preventDefault();
            var app = this;
            var customer_id = app.$route.params.id;
            Vue.swal({
                title: 'Are you sure you want to delete this contact?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    var app = this;
                    axios.delete('/api/v1/contacts/' + id)
                        .then(function (resp) {
                            Vue.swal({
                                position: 'center',
                                type: 'success',
                                title: 'Contact deleted..',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            app.getContacts(customer_id);
                        })
                        .catch(function (resp) {
                            Vue.swal({
                                position: 'center',
                                type: 'error',
                                title: 'Something went wrong! Cannot delete contact..',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        });
                }
            })
        }
    }
}

</script>

