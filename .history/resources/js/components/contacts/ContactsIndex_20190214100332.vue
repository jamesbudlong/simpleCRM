<template>
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
            <!-- <tr v-for="contact, index in contactsList">
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
</template>

<script>

export default {
    mounted() {
        console.log("whw");
        let app = this;
        let id = app.$route.params.id;
        // app.customerID = id;
        // axios.get('/api/v1/customer/' + id)
        //     .then(function (resp) {
        //         //console.log(resp);
        //         app.customers = resp.data[0];
        //     })
        //     .catch(function () {
        //         Vue.swal({
        //             position: 'center',
        //             type: 'error',
        //             title: 'Something went wrong! Cannot load customer..',
        //             showConfirmButton: false,
        //             timer: 2000
        //         });
        //     });

        //this.getContacts(id);
    },
    data: function () {
        return {
            contactsList: {}
        }
    },
    methods: {
        getContacts(id) {
            axios.get('/api/v1/contacts/getAllContactsByCustomerID/' + id)
                .then(response => {
                    //console.log(response);
                    this.contactsList = response.data;
                    console.log("wow");
                    //console.log(response.data);
                });
        },
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
                        this.getContacts(customer_id);
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
        }
    }
}

</script>

