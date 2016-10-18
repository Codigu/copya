import angular from 'angular';
import uiRouter from 'angular-ui-router';
import routes from './copya.routes';
import CopyaController from './controllers/CopyaController';
import includeReplace from './directives/includeReplace';


angular.module('copya', [uiRouter, 'includeReplace'])
    .controller('CopyaController', CopyaController)
    .config(routes);


