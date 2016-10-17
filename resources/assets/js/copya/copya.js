import angular from 'angular';
import uiRouter from 'angular-ui-router';
import routes from './copya.routes';
//import ngRoute from 'angular-route';

console.log(routes);

angular.module('copya.app', [uiRouter])
    .config(routes);