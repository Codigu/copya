<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="panel panel-transparent">
            <div class="panel-heading">
                <div class="panel-title">Users
                </div>
                <div class="btn-group pull-right m-b-10">
                    <button type="button" class="btn btn-default">Add new</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings</a>
                        </li>
                        <li><a href="#">Help</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:1%">
                                <button class="btn"><i class="pg-trash"></i>
                                </button>
                            </th>
                            <th style="width:20%">User Id</th>
                            <th style="width:20%">Name</th>
                            <th style="width:29%">Email</th>
                        </tr>
                        </thead>
                            <tbody>
                                <tr v-for="user in users">
                                    <td class="v-align-middle">
                                        <div class="checkbox ">
                                            <input type="checkbox" value="{{ user.id }}" id="checkbox1">
                                            <label for="checkbox1"></label>
                                        </div>
                                    </td>
                                    <td class="v-align-middle ">
                                        <p>{{  user.id }}</p>
                                    </td>
                                    <td class="v-align-middle ">
                                        <p>{{  user.name }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ user.email }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                users: [],

                createForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },

                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                }
            };
        },

        /**
         * Prepare the component.
         */
        ready() {
            this.getUsers();

            /*$('#modal-create-client').on('shown.bs.modal', () => {
             $('#create-client-name').focus();
             });

             $('#modal-edit-client').on('shown.bs.modal', () => {
             $('#edit-client-name').focus();
             });*/
        },

        methods: {
            getUsers() {
                this.$http.get('/api/users')
                    .then(response => {
                        this.users = response.data;
                    });
            },

            /* /!**
             * Show the form for creating new clients.
             *!/
             showCreateClientForm() {
             $('#modal-create-client').modal('show');
             },

             /!**
             * Create a new OAuth client for the user.
             *!/
             store() {
             this.persistClient(
             'post', '/oauth/clients',
             this.createForm, '#modal-create-client'
             );
             },

             /!**
             * Edit the given client.
             *!/
             edit(client) {
             this.editForm.id = client.id;
             this.editForm.name = client.name;
             this.editForm.redirect = client.redirect;

             $('#modal-edit-client').modal('show');
             },

             /!**
             * Update the client being edited.
             *!/
             update() {
             this.persistClient(
             'put', '/oauth/clients/' + this.editForm.id,
             this.editForm, '#modal-edit-client'
             );
             },

             /!**
             * Persist the client to storage using the given form.
             *!/
             persistClient(method, uri, form, modal) {
             form.errors = [];

             this.$http[method](uri, form)
             .then(response => {
             this.getClients();

             form.name = '';
             form.redirect = '';
             form.errors = [];

             $(modal).modal('hide');
             })
             .catch(response => {
             if (typeof response.data === 'object') {
             form.errors = _.flatten(_.toArray(response.data));
             } else {
             form.errors = ['Something went wrong. Please try again.'];
             }
             });
             },

             /!**
             * Destroy the given client.
             *!/
             destroy(client) {
             this.$http.delete('/oauth/clients/' + client.id)
             .then(response => {
             this.getClients();
             });
             }*/
        }
    }
</script>
