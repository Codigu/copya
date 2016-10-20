window.$ = window.jQuery = require('jquery');

require('pace');

require('./plugins/bootstrapv3/js/bootstrap.min');
require('./plugins/jquery/jquery-easy');
require('./plugins/jquery-unveil/jquery.unveil.min');
require('./plugins/jquery-bez/jquery.bez.min');
require('./plugins/jquery-ios-list/jquery.ioslist.min');
require('./plugins/jquery-actual/jquery.actual.min');
require('./plugins/jquery-scrollbar/jquery.scrollbar.min');
require('./plugins/classie/classie');
require('oclazyload');
require('./plugins/angular-ui-util/ui-utils.min');
require('./plugins/angular-sanitize/angular-sanitize.min');


import angular from 'angular';
import uiRouter from 'angular-ui-router';
import routes from './copya.routes';
import CopyaController from './controllers/CopyaController';
import includeReplace from './directives/includeReplace';
import lazyLoad from './copya.lazyload';
import pgsidebar from './directives/pg-sidebar';

angular.module('copya', [
        uiRouter,
        'ui.utils',
        'oc.lazyLoad',
        'includeReplace',
        'pgsidebar'
    ])
    .controller('CopyaController', CopyaController)
    .config(routes)
    .config(lazyLoad);



require('./pages/pages');
require('./plugins/modernizr.custom');


