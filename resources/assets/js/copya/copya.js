angular.module('copya', ['ui.router','oc.lazyLoad', 'ui.utils','ngResource', 'ngSanitize'])
    .run( function run( $http ){

        $http.defaults.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;

    });
