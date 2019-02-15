<template>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success pull-right" v-on:click="seen = !seen" v-if="seen"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
            <button class="btn btn-dark pull-right" v-on:click="seen = !seen" v-if="!seen"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
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
                    <pagination :data="contactsList" @pagination-change-page="getContacts"></pagination>
                </div>
            </div>
            <div v-if="!seen"> <!-- add contact form -->
                <!-- <contacts-create></contacts-create>               -->
            </div>
        </div>
    </div>


    
</template>

<script>

export default {
    mounted() {
        let app = this;
        let id = app.$route.params.id;
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
        }
    }
}

</script>

