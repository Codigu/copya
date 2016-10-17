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
                <div class="panel-title">Pages
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
                            <th style="width:20%">Title</th>
                            <th style="width:20%">Status</th>
                            <th style="width:29%">Date Created</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="page in pages">
                                <td class="v-align-middle">
                                    <div class="checkbox ">
                                        <input type="checkbox" value="{{ page.id }}" id="checkbox1">
                                        <label for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="v-align-middle ">
                                    <p>{{  page.title }}</p>
                                </td>
                                <td class="v-align-middle ">
                                    <p>{{  page.status }}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{{ page.created_at }}</p>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success" @click="edit(page)"><i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-success" @click="destroy(page)"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
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
                pages: [],

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
            this.getPages();

            /*$('#modal-create-client').on('shown.bs.modal', () => {
             $('#create-client-name').focus();
             });

             $('#modal-edit-client').on('shown.bs.modal', () => {
             $('#edit-client-name').focus();
             });*/
        },

        methods: {
            getPages() {
                this.$http.get('/api/pages')
                    .then(response => {
                        this.pages = response.data;
                    }, response => {
                        alert('Something went wrong. Please try again later.');
                    });
            },

            edit(page){
                var pathArray = window.location.pathname.split( '/' );
                var protocol = (window.location.protocol) ? window.location.protocol : 'http';
                window.location = protocol+'//'+window.location.host+'/'+pathArray[1]+'/'+pathArray[2]+'/'+page.id+'/edit';
            },

            destroy(page) {
                this.$http.delete('/api/pages/' + page.id)
                    .then(response => {
                        var index = this.pages.indexOf(page);
                        this.pages.splice(index, 1);
                        alert(response.data.message);
                    }, response => {
                        console.log(response.data);
                        alert(response.data.error);
                });
            }

        }
    }
</script>
