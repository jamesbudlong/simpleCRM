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
            <tr v-for="contact, index in contactsList.data">
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
            contactsList: {}
        }
    },
    methods: {
        getContacts(id, page = 1) {
            axios.get('/api/v1/contacts/getAllContactsByCustomerID/' + id + '?page=' + page)
                .then(response => {
                    this.contactsList = response.data;
                });
        }
    }
}

</script>

