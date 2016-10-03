<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        Users
                    </span>

                    <a class="action-link" @click="showCreateUserForm">
                        Create New User
                    </a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Current Clients -->
                <p class="m-b-none" v-if="users.length === 0">
                    You have not created any OAuth clients.
                </p>
                {{ users | json }}
                <table class="table table-borderless m-b-none" v-if="users.length > 0">
                    <thead>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                    </thead>

                    <tbody>
                    <tr v-for="user in users">
                        <!-- ID -->
                        <td style="vertical-align: middle;">
                            {{ user.id }}
                        </td>

                        <!-- Name -->
                        <td style="vertical-align: middle;">
                            {{ user.name }}
                        </td>

                        <!-- Secret -->
                        <td style="vertical-align: middle;">
                            <code>{{ user.secret }}</code>
                        </td>

                        <!-- Edit Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link" @click="edit(user)">
                                Edit
                            </a>
                        </td>

                        <!-- Delete Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link text-danger" @click="destroy(user)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
