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
                        <div class="panel-title" v-if="!page.id">
                            Create New Page
                        </div>
                        <div class="panel-title" v-if="page.id">
                            Edit Page
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
                                        <vue-html-editor name="content" :model.sync="page.content"></vue-html-editor>
                                    </div>
                                    {{ page | json }}
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="from group form-group-default">
                                                Status: {{ page.status | capitalize }} <a @click="changeStatus = true">Edit</a>
                                                <div v-show="changeStatus">
                                                    <select name="status" title="status" v-model="page.status">
                                                        <option value="draft">Draft</option>
                                                        <option value="published">Published</option>
                                                    </select>
                                                    <a @click="changeStatus = false">Ok</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="from group form-group-default">
                                                Layout:
                                                <div>
                                                    <select name="layout" title="Page Layout" v-model="page.layout">
                                                        <option value="{{ layout }}" v-for="layout in layouts">{{ layout | capitalize }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-primary btn-cons m-b-10" type="button" @click="store" v-if="!page.id">
                                        <i class="pg-form"></i> <span class="bold">Submit</span>
                                    </button>
                                    <button class="btn btn-primary btn-cons m-b-10" type="button" @click="update" v-if="page.id">
                                        <i class="pg-form"></i> <span class="bold">Update</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                page: {
                    errors: [],
                    id: '',
                    status: 'draft',
                    content: '',
                    title: '',
                    layout: 'default'
                },
                layouts: [],
                text: "page.content",
                changeStatus: false,
            };

        },
        components: {
            "vue-html-editor": require("./../../../../plugins/vue-html-editor/vue-html-editor")
        },

        /**
         * Prepare the component.
         */
        ready() {
            this.show();
            this.getLayouts();
        },

        methods: {
            store() {
                this.persistClient(
                        'post', '/api/pages',
                        this.page, '#add-new-page'
                );
            },
            update() {
                this.persistClient(
                        'put', '/api/pages/'+ this.page.id,
                        this.page, '#add-new-page'
                );
            },
            getLayouts() {
                this.$http.get('/api/layouts')
                    .then(response => {
                        this.layouts = response.data;
                    }, response => {

                        alert('Something went wrong. Please try again later.');
                });
            },
            show() {
                var pathArray = window.location.pathname.split( '/' );

                if(pathArray[3] % 1 === 0){
                    this.$http.get('/api/pages/'+pathArray[3])
                        .then(response => {

                        this.page = response.data;
                        this.page.errors = [];
                        this.page.layout = 'default'; //temporary
                    });
                }
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form) {
                form.errors = [];

                this.$http[method](uri, form)
                    .then(response => {
                    if(method == 'post'){
                        var pathArray = window.location.pathname.split('/');
                        var protocol = (window.location.protocol) ? window.location.protocol : 'http';
                        var newUrl = protocol + '//' + window.location.host + '/' + pathArray[1] + '/' + pathArray[2] + '/' + response.data.id + '/edit/';
                        window.location = newUrl;
                    }
                })
                .catch(response => {

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
