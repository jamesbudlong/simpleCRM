<template>
<!-- Content Header (Page header) -->
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pipeline</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item"><router-link :to="{name: 'pipeline'}">Pipeline</router-link></li>
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
                            <h5 class="card-title pull-left">Pipeline Profile</h5>
                            <router-link :to="{name: 'pipeline'}" class="btn btn-dark pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="card-body col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div>
                                                        <dt>Description</dt>
                                                    </div>
                                                    <div>
                                                       {{pipelines.description}}
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
                                                    <a v-on:click="showTasks = true;" class="nav-link" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false"><i class="fa fa-tasks" ></i> Tasks (0)</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a v-on:click="showFiles = true;" class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false"><i class="fa fa-files-o"></i> Files (0)</a>
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
                                                    <!-- tasks here -->
                                                    <tasks-index v-if="showTasks"></tasks-index>
                                                </div>
                                                <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                                                    <!-- files here -->
                                                    <files-index v-if="showFiles"></files-index>
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
                                                    <dt>Status</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{pipelines.status}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Expected</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{pipelines.expected}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Probability</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{pipelines.probability}}%
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Value</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    kr {{pipelines.value}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Weighted Value</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    kr weighted value here
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Seller</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{pipelines.user_name}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Customer Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Name</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{pipelines.first_name}} {{pipelines.last_name}} {{pipelines.company_name}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Address</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    {{pipelines.visiting_address}} <br />
                                                    {{pipelines.zipcode}}{{pipelines.place}} <br/>
                                                    {{pipelines.country}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Telephone</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    kr weighted value here
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>E-Mail</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    kr weighted value here
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dt>Website</dt>
                                                </div>
                                                <div class="col-md-12">
                                                    kr weighted value here
                                                </div>
                                            </div>
                                             <br />
                                            <br />
                                            : 
                                            <br />
                                            Telephone:
                                            <br />
                                            E-Mail:
                                            <br />
                                            Website:
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
    import TasksIndex from '../tasks/TasksIndex'
    import FilesIndex from '../files/FilesIndex'

    export default {
        mounted() {
            this.getPipelineDetails();
        },
        data: function () {
            return {
                // customerID: null,
                // customers: {},
                showTasks: false,
                showContacts: false,
                showFiles: false,
                pipelines: {}
            }
        },
        methods: {
            getPipelineDetails(){
                let app = this;
                let pipeline_id = app.$route.params.id;
                axios.get('/api/v1/pipelines/' + pipeline_id)
                    .then(function (resp) {
                        console.log(resp);
                        app.pipelines = resp.data[0];
                    })
                    .catch(function () {
                        Vue.swal({
                            position: 'center',
                            type: 'error',
                            title: 'Something went wrong! Cannot load pipeline..',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
            },
            // getPipelines(id) {
            //     axios.get('/api/v1/pipelines/getPipelinesByCustomerID/' + id)
            //     .then(response => {
            //         this.pipelines = response.data;
            //     });
            // }
        },
        components: {
            'tasks-index': TasksIndex,
            'files-index': FilesIndex
        }
    }
</script>