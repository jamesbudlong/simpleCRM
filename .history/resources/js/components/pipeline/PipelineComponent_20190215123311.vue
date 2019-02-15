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
                    <li class="breadcrumb-item" @click="closeSubMenu()"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></li>
                    <li class="breadcrumb-item active">Pipeline</li>
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
                            <h4 class="card-title pull-left">Pipeline List</h4>
                            <!-- <router-link :to="{name: 'customer_categories_create'}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</router-link> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">Companies list</div> -->
                                <div class="form-group">
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                        <thead  class="thead-dark">
                                            <tr>
                                                <th>Status</th>
                                                <th>Name</th>
                                                <th>Customer</th>
                                                <th>Seller</th>
                                                <th>Value</th>
                                                <th>Probability</th>
                                                <th>Weighted Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="pipeline, index in pipelines.data">
                                                <td>{{ pipeline.status }}</td>
                                                <td>{{ pipeline.name }}</td>
                                                <td v-if="pipeline.customer_type == 'person'">{{ pipeline.first_name }} {{ pipeline.last_name }}</td>
                                                <td v-else>{{ pipeline.company_name }}</td>
                                                <td>{{ pipeline.user_name }}</td>
                                                <td>{{ pipeline.value }}</td>
                                                <td>{{ pipeline.probability }}</td>
                                                <td>???</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <!-- <pagination :data="tasks" @pagination-change-page="getTasks"></pagination> -->
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
        data: function () {
            return {
                pipelines: {}
            }
        },
        mounted() {
            this.getPipelines();
        },
        methods: {
            getPipelines(page = 1) {
                axios.get('/api/v1/pipelines/?page=' + page)
                    .then(response => {
                        //console.log(response);
                        this.pipelines = response.data;
                    });
            }
        }
    }
</script>