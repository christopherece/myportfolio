<template>
    <div>

            <form action="#" @submit.prevent="edit ? updateProject(project.id) : createProject()">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer013">Title</label>
                        <input v-model="project.title" type="text" name="title" class="form-control" id="validationServer013" placeholder="Title"
                                required>
                        <!--<div class="valid-feedback">-->
                            <!--Looks good!-->
                        <!--</div>-->
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer023">Image</label>
                        <input v-model="project.image" name="image" type="text" class="form-control" id="validationServer023" placeholder="Image"
                               value="Otto" required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServerUsername33">Client</label>
                        <div class="input-group">

                            <input v-model="project.client" type="text" name="client" class="form-control" id="validationServerUsername33" placeholder="Client"
                                   aria-describedby="inputGroupPrepend33" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer033">Service</label>
                        <input v-model="project.service" type="text" name="service" class="form-control" id="validationServer033" placeholder="Service"
                               required>
                        <!--<div class="invalid-feedback">-->
                            <!--Please provide a valid city.-->
                        <!--</div>-->
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer043">Url</label>
                        <input v-model="project.url" type="text" name="url" class="form-control" id="validationServer043" placeholder="Url"
                               required>
                        <!--<div class="invalid-feedback">-->
                            <!--Please provide a valid state.-->
                        <!--</div>-->
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer053">Date</label>
                        <input v-model="project.date" type="date" name="date" class="form-control" id="validationServer053" placeholder="Date"
                               required>
                        <!--<div class="invalid-feedback">-->
                            <!--Please provide a valid zip.-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea v-model="project.description" name="description" class="form-control"></textarea>
                </div><hr>
                <div class="form-group">
                    <button v-show="!edit" type="submit" class="btn btn-primary">New Project</button>
                    <button v-show="edit" type="submit" class="btn btn-primary">Update Project</button>
                </div>
            </form>

        <h2>Projects</h2>
        <table class="table table-hover">
            <thead>
                <th>Title</th>
                <th>Description</th>
                <th>Client</th>
                <th>Service</th>
                <th>Url</th>
                <th>Date</th>

            </thead>
            <tbody>
                <tr v-for="project in list">
                    <td>{{project.title}}</td>
                    <td>{{project.description}}</td>
                    <td>{{project.client}}</td>
                    <td>{{project.service}}</td>
                    <td>{{project.url}}</td>
                    <td>{{project.date}}</td>
                    <td>
                        <button @click="showProject(project.id)" class="btn btn-primary btn-sm"><span><i class="fa fa-plus"></i></span></button>
                        <button @click="deleteProject(project.id)" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i></span></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--<ul class="list-group">-->
            <!--<li class="list-group-item" v-for="project in list">-->
                <!--<strong>{{project.title}}</strong>{{project.description}}-->
                <!--<button @click="showProject(project.id)" class="btn btn-default btn-xs">Edit</button>-->
                <!--<button @click="deleteProject(project.id)" class="btn danger btn-xs">Delete</button>-->

            <!--</li>-->
        <!--</ul>-->
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                edit:false,
                list:[],
                project: {
                    id: '',
                    title: '',
                    image: '',
                    description: '',
                    client: '',
                    service: '',
                    url: '',
                    date:'',
                    created_at: '',
                    updated_at: ''
                }
            }
        },
        mounted: function(){
            console.log('Projects Loaded');
            this.fetchProjectLists();
        },
        methods: {
            fetchProjectLists: function(){
                console.log('Fetching Contact');
                axios.get('api/projects')
                    .then((response) => {
                        console.log(response.data)
                       this.list = response.data;
                    }).catch((error) => {
                        console.log(error)
                });

            },
            createProject: function () {
                console.log('Creating Contact');
                let self = this;
                let params = Object.assign({}, self.project);
                axios.post('api/projects/store', params)
                    .then(function () {
                       self.project.title = '';
                        self.project.image = '';
                        self.project.description = '';
                        self.project.client = '';
                        self.project.service = '';
                        self.project.url = '';
                        self.project.date = '';
                        self.project.created_at = '';
                        self.project.updated_at = '';
                        self.edit = false;
                       self.fetchProjectLists();
                    }).catch(function(error){
                        console.log(error)
                });
            },

            showProject: function(id){
                let self = this;
                axios.get('api/projects/'+id)
                    .then(function (response) {
                       self.project.id = response.data.id;
                        self.project.title = response.data.title;
                        self.project.image = response.data.image;
                        self.project.description = response.data.description;
                        self.project.client = response.data.client;
                        self.project.service = response.data.service;
                        self.project.url = response.data.url;
                        self.project.date = response.data.date;
                        self.project.created_at = response.data.created_at;
                        self.project.updated_at = response.data.updated_at;

                    });
                    self.edit = true;
            },

            updateProject: function (id) {
                console.log('Updating projects '+id+'....');
                let self = this;
                let params = Object.assign({}, self.project);
                axios.patch('api/projects/'+id, params)
                    .then(function () {
                        self.project.title = '';
                        self.project.image = '';
                        self.project.description = '';
                        self.project.client = '';
                        self.project.service = '';
                        self.project.url = '';
                        self.project.date = '';
                        self.project.created_at = '';
                        self.project.updated_at = '';
                        self.edit = false;
                        self.fetchProjectLists();
                    }).catch(function(error){
                    console.log(error)
                });
            },

            deleteProject: function (id) {
                let self = this;
                axios.delete('api/projects/'+id)
                    .then(function () {
                        self.fetchProjectLists();
                    }).catch(function (error) {
                    console.log(error)
                });
            }


        }
    }
</script>