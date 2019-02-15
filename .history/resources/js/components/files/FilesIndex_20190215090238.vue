<template>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success pull-right" v-on:click="seen1 = !seen1; seen2 = true;" v-if="seen1"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
            <button class="btn btn-dark pull-right filesBackButton" v-on:click="seen1 = true; seen2 = false; seen3 = false" v-if="seen2 || seen3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </div>
        <div class="card-body">
            <div v-if="seen1"><!-- file view -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead  class="thead-dark">
                        <tr>
                        <th></th>
                        <th>Filename</th>
                        <th>Size</th>
                        <th>Last Ned</th>
                        <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="get_file, index in get_files">
                            
                            <td align="center"><img style="display:block;" width="25%" height="25%" :src="'/files/uploads/' + get_file.path + '/' + get_file.filename"/> </td>
                            <td><a :href="'/files/uploads/' + get_file.path + '/' + get_file.filename">{{ get_file.filename }}</a></td>
                            <td>{{ get_file.size }} KB</td>
                            <td> -- </td>
                            <td>
                                <a href="#" class="btn btn-danger" v-on:click="deleteEntry(get_file.id, index)">
                                    <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                </a>
                            </td>
                        </tr> 
                    </tbody>
                    </table>
                </div>
            </div>
            <div v-if="seen2"> <!-- add file form -->
                <div class="container">
                    <div class="container">
                        <div class="large-12 medium-12 small-12 filezone">
                            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                            <p>
                                Drop your files here <br>or click to search
                            </p>
                        </div>
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
        this.getFiles(id);
    },
    data: function () {
        return {
            get_files: {},
            files: [],
            seen1: true,
            seen2: false,
            seen3: false
        }
    },
    methods: {
        getFiles(id) {
            axios.get('/api/v1/files/getAllFilesByCustomerID/' + id)
                .then(response => {
                    this.get_files = response.data;
                });
        },
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
                    this.removeFile(i);
                    
                }.bind(this)).catch(function(data) {
                    console.log('error');
                });
            }

            Vue.swal({
                position: 'center',
                type: 'success',
                title: 'File/s uploaded..',
                showConfirmButton: false,
                timer: 2000
            });

            $('.filesBackButton').click();
            this.getFiles(customer_id);
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
