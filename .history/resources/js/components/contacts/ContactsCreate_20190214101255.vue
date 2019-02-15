<template>
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
</template>

<script>
export default {
    mounted() {
        let app = this;
        let id = app.$route.params.id;
    },
    data: function () {
        return {
            contacts: {}
        }
    },
    methods: {
        saveContactForm() {
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
                        //app.seen = !seen;
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