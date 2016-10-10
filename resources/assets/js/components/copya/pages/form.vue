<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div id="add-new-page" class="container-fluid container-fixed-lg bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Create New Page
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger" v-if="page.errors.length > 0">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in page.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>
                        <form class="" role="form" >
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group form-group-default required ">
                                        <label>Title</label>
                                        <input type="text" class="form-control" v-model="page.title" required>
                                    </div>

                                    <div class="form-group form-group-default required ">
                                        <textarea v-model="page.content"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="from group form-group-default">
                                        Status: {{ page.status | capitalize }} <a @click="changeStatus = true">Edit</a>
                                        <div v-show="changeStatus">
                                            <select name="status" title="status" v-model="page.status">
                                                <option value="draft">Draft</option>
                                                <option value="published">Published</option>
                                            </select>
                                            <button class="btn btn-complete btn-cons m-b-10" type="submit">
                                                <i class="pg-form"></i> <span class="bold">Submit</span>
                                            </button>
                                            <a @click="changeStatus = false">Ok</a>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-cons m-b-10" type="button" @click="store">
                                        <i class="pg-form"></i> <span class="bold">Submit</span>
                                    </button>
                                </div>
                            </div>



                            {{ page | json }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import editor from 'vue-html-editor'

    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                page: {
                    errors: [],
                    status: 'draft',
                    content: '',
                },

                changeStatus: false,

                statusList: [],
            };
        },

        /**
         * Prepare the component.
         */
        ready() {
        },

        methods: {
            store() {
                this.persistClient(
                        'post', '/api/pages',
                        this.page, '#add-new-page'
                );
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form) {
                form.errors = [];

                this.$http[method](uri, form)
                    .then(response => {
                    console.log(response.data);
                    //this.getClients();
                    //redirect to page edit
                })
                .catch(response => {
                    console.log(response.data);
                    if (typeof response.data === 'object') {

                        form.errors = _.flatten(_.toArray(response.data));
                    } else {
                        form.errors = ['Something went wrong. Please try again.'];
                    }
                });
            },
        }
    }
</script>
