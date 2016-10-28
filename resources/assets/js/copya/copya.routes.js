

function routes($stateProvider, $urlRouterProvider, $httpProvider) {
    //$http.defaults.headers.get['X-CSRFToken'] = Laravel.csrfToken;

    $urlRouterProvider
        .otherwise('dashboard');

    $stateProvider
        .state('app', {
            abstract: true,
            url: '/',
            templateUrl: "js/copya/tpl/app.html",
            //template: require('./tpl/app.html'),
        })
        .state('app.dashboard', {
            url: "dashboard",
            templateUrl: "js/copya/tpl/dashboard.html",
            controller: 'DashboardCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([

                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/dashboard.js'
                            ]);
                        });
                }]
            }
        })
        .state('pages', {
            abstract: true,
            url: '/pages',
            templateUrl: "js/copya/tpl/app.html",
        })
        .state('pages.index', {
            url: "/index",
            templateUrl: "js/copya/tpl/pages.index.html",
            controller: 'PagesCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/pages.js'
                            ]);
                        });
                }]
            }
        })
        .state('pages.add', {
            url: "/add",
            templateUrl: "js/copya/tpl/pages.form.html",
            controller: 'PagesCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                            'summernote'
                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/pages.js'
                            ]);
                        });
                }]
            }
        })
        .state('pages.edit', {
            url: "/{id}/edit",
            templateUrl: "js/copya/tpl/pages.form.html",
            controller: 'PagesCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                            'summernote'
                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/pages.js'
                            ]);
                        });
                }]
            }
        })
        .state('navigations', {
            abstract: true,
            url: '/navigations',
            templateUrl: "js/copya/tpl/app.html",
        })
        .state('navigations.index', {
            url: "/index",
            templateUrl: "js/copya/tpl/navigations.index.html",
            controller: 'PagesCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/navigations.js'
                            ]);
                        });
                }]
            }
        })
        .state('navigations.add', {
            url: "/add",
            templateUrl: "js/copya/tpl/pages.form.html",
            controller: 'PagesCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                            'summernote'
                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/pages.js'
                            ]);
                        });
                }]
            }
        })
        .state('navigations.edit', {
            url: "/{id}/edit",
            templateUrl: "js/copya/tpl/pages.form.html",
            controller: 'PagesCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                            'summernote'
                        ], {
                            insertBefore: '#lazyload_placeholder'
                        })
                        .then(function() {
                            return $ocLazyLoad.load([
                                'js/copya/controllers/pages.js'
                            ]);
                        });
                }]
            }
        });

}

routes.$inject = ['$stateProvider', '$urlRouterProvider', '$httpProvider'];
//
angular.module('copya')
    .config(routes);