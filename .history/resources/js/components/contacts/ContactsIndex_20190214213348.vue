<template>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success pull-right" v-on:click="seen = !seen" v-if="seen"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
            <button class="btn btn-dark pull-right backButton" v-on:click="seen = !seen;" v-if="!seen"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
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
                                </router-link> -->
                                <a href="#" class="btn btn-danger" v-on:click="deleteEntry(contact.id, index)">
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
            <div v-if="!seen"> <!-- add contact form -->
                <form v-on:submit="saveContactForm()">   
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


    
</template>

<script>

export default {
    mounted() {
        let app = this;
        let id = app.$route.params.id;
        let cust_id = app.$route.params.id;
        ///console.log("asdasd "+ id);
        this.getContacts(id);
    },
    data: function () {
        return {
            contactsList: {},
            contacts: {},
            seen: true
        }
    },
    methods: {
        getContacts(id) {
            axios.get('/api/v1/contacts/getAllContactsByCustomerID/' + id)
                .then(response => {
                    this.contactsList = response.data;
                });
        },
        saveContactForm(seen) {
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

