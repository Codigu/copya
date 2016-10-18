import angular from 'angular';
import routes from './copya.routes';
//import ui-router from 'angular-ui-router';



angular.module('copya.app', [require('angular-ui-router')])
    .config(routes);