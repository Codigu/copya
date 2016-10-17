import angular from 'angular';
import routes from './copya.routes';
import ngRoute from 'angular-route';

console.log(routes);

angular.module('copya.app', ['ngRoute'])
    .config(routes);