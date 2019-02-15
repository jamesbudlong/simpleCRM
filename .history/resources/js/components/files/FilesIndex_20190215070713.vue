<template>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success pull-right" v-on:click="seen1 = !seen1; seen2 = true;" v-if="seen1"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
            <button class="btn btn-dark pull-right tasksBackButton" v-on:click="seen1 = true; seen2 = false; seen3 = false" v-if="seen2 || seen3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </div>
        <div class="card-body">
            <div v-if="seen1"><!-- file view -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead  class="thead-dark">
                        <tr>
                        <th>ID</th>
                        <th>Responsible User</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Decay</th>
                        <th>Comment</th>
                        <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task, index in tasks">
                            <td>{{ task.id }}</td>
                            <td>{{ task.user_name }}</td>
                            <td>{{ task.status }}</td>
                            <td>{{ task.priority }}</td>
                            <td>{{ task.decay }}</td>
                            <td>{{ task.comment }}</td>
                            <td>
                                <a href="#" class="btn btn-primary" v-on:click="seen3 = true; seen1 = false; getTaskByID(task.id);">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i>
                                </a>
                                <!-- <a href="#" class="btn btn-danger" v-on:click="deleteEntry(task.id, index)">
                                    <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                </a> -->
                            </td>
                        </tr> 
                    </tbody>
                    </table>
                </div>
            </div>
            <div v-if="seen2"> <!-- add file form -->
                <div class="container">
                    <!-- <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">File Upload</label>
                            <input type="file" id="file" class="form-control" ref="file" v-on:change="handleFileUpload()" required/>
                        </div>
                        <button v-on:click="submitFile()">Submit</button>
                    </div> -->
                    <div class="container">
                        <div class="large-12 medium-12 small-12 filezone">
                            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                            <p>
                                Drop your files here <br>or click to search
                            </p>
                        </div>

                        <div class="display" v-html="HTMLcontent">
                            <div v-for="(file, key) in files" class="file-listing">
                                <img class="preview" v-bind:ref="'preview'+parseInt(key)"/>
                                {{ file.name }}
                                <div class="success-container" v-if="file.id > 0">
                                    Success
                                </div>
                                <div class="remove-container" v-else>
                                    <a class="remove" v-on:click="removeFile(key)">Remove</a>
                                </div>
                            </div>
                        </div>
                        <a class="submit-button" v-on:click="submitFiles()" v-show="files.length > 0">Submit</a>
                    </div>
                </div>
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
        this.getTasks(id);
        this.getUsers();
    },
    data: function () {
        return {
            files: [],
            tasks: {},
            tasksAdd: {},
            tasksEdit: {},
            users: {},
            seen1: true,
            seen2: false,
            seen3: false,
            date: null,
            datetimepicker_options: {
                format: 'DD.MM.YYYY hh:mm',
                useCurrent: false,
                showClear: true,
                showClose: true,
            },
            HTMLcontent: null,
        }
    },
    methods: {
        handleFiles() {
            let uploadedFiles = this.$refs.files.files;

            for(var i = 0; i < uploadedFiles.length; i++) {
                this.files.push(uploadedFiles[i]);
            }
            this.getImagePreviews();
        },
        getImagePreviews(){
            for( let i = 0; i < this.files.length; i++ ){
                if ( /\.(jpe?g|png|gif)$/i.test( this.files[i].name ) ) {
                    let reader = new FileReader();
                    reader.addEventListener("load", function(){
                        this.$refs['preview'+parseInt(i)][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL( this.files[i] );
                }else{
                    this.$nextTick(function(){
                        this.$refs['preview'+parseInt(i)][0].src = '/img/generic.png';
                    });
                }
            }
        },
        removeFile( key ){
            this.files.splice( key, 1 );
            this.getImagePreviews();
        },
        submitFiles() {
            var app = this;
            var customer_id = app.$route.params.id;

            for( let i = 0; i < this.files.length; i++ ){
                if(this.files[i].id) {
                    continue;
                }
                let formData = new FormData();
                formData.append('file', this.files[i]);
                formData.append('customer_id', customer_id);

                axios.post('/api/v1/files/uploadFile',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(data) {
                    this.files[i].id = data['data']['id'];
                    this.files.splice(i, 1, this.files[i]);
                    this.HTMLcontent = '';
                    console.log('success');
                }.bind(this)).catch(function(data) {
                    console.log('error');
                });
            }
        },
        //end
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },
        submitFile(){
            var app = this;
            var customer_id = app.$route.params.id;

            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('customer_id', customer_id);

            axios.post('/api/v1/files/uploadFile', formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
            ).then(function(){
                console.log('SUCCESS!!');
            })
            .catch(function(){
                console.log('FAILURE!!');
            });
        },
        getUsers() {
            axios.get('/user/getAllUsers')
                .then(response => {
                    this.users = response.data;
                });
        },
        getTasks(id) {
            axios.get('/api/v1/contacts/getAllTasksByCustomerID/' + id)
                .then(response => {
                    this.tasks = response.data;
                });
        },
        getTaskByID(edit_id){
            let app = this;
            axios.get('/api/v1/tasks/' + edit_id)
                .then(function (resp) {
                    app.tasksEdit = resp.data;
                })
                .catch(function () {
                    Vue.swal({
                        position: 'center',
                        type: 'error',
                        title: 'Something went wrong! Cannot load task..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
        },
        saveTaskForm(seen) { //ADD TASK
            event.preventDefault();
            var app = this;
            var customer_id = app.$route.params.id;
            var tasksAdd = app.tasksAdd;
            var newTask = {tasksAdd,customer_id};

            axios.post('/api/v1/tasks', newTask)
                .then(function (resp) {
                    Vue.swal({
                        position: 'center',
                        type: 'success',
                        title: 'Task added..',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    app.tasksAdd = {};
                    $('.tasksBackButton').click();
                    app.getTasks(customer_id);
                })
                .catch(function (resp) {
                    //console.log(resp);
                    Vue.swal({
                        position: 'center',
                        type: 'error',
                        title: 'Something went wrong! Cannot add task..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
        },
        updateTaskForm(task_id) {
            event.preventDefault();
            var app = this;
            var newTaskUpdate = app.tasksEdit;
            var task_id = app.$route.params.id;
            axios.patch('/api/v1/tasks/' + task_id, newTaskUpdate)
                .then(function (resp) {
                    Vue.swal({
                        position: 'center',
                        type: 'success',
                        title: 'Task updated..',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    app.tasksEdit = {};
                    $('.tasksBackButton').click();
                    app.getTasks(task_id);
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
        // deleteEntry(id, index) {
        //     event.preventDefault();
        //     var app = this;
        //     var customer_id = app.$route.params.id;
        //     Vue.swal({
        //         title: 'Are you sure you want to delete this contact?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //         }).then((result) => {
        //         if (result.value) {
        //             var app = this;
        //             axios.delete('/api/v1/contacts/' + id)
        //                 .then(function (resp) {
        //                     Vue.swal({
        //                         position: 'center',
        //                         type: 'success',
        //                         title: 'Contact deleted..',
        //                         showConfirmButton: false,
        //                         timer: 2000
        //                     });
        //                     app.getContacts(customer_id);
        //                 })
        //                 .catch(function (resp) {
        //                     Vue.swal({
        //                         position: 'center',
        //                         type: 'error',
        //                         title: 'Something went wrong! Cannot delete contact..',
        //                         showConfirmButton: false,
        //                         timer: 2000
        //                     });
        //                 });
        //         }
        //     })
        // }
    }
}

</script>

<style scoped>
    input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
    div.file-listing img{
        max-width: 90%;
    }

    div.file-listing{
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    div.file-listing img{
        height: 100px;
    }
    div.success-container{
        text-align: center;
        color: green;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }

    a.submit-button{
        display: block;
        margin: auto;
        text-align: center;
        width: 200px;
        padding: 10px;
        text-transform: uppercase;
        background-color: #CCC;
        color: white;
        font-weight: bold;
        margin-top: 20px;
    }
</style>
