
routes.$inject = ['$stateProvider', '$urlRouterProvider'];

export default function routes($stateProvider, $urlRouterProvider) {
    $urlRouterProvider
        .otherwise('/dashboard');

    $stateProvider
        .state('copya', {
            abstract: true,
            url: '/',
            templateUrl: "js/copya/tpl/app.html"
            //template: require('./tpl/app.html'),
        })
        .state('copya.dashboard', {
            url: "dashboard",
            templateUrl: "js/copya/tpl/app.html",
            //controller: 'DashboardCtrl',
        });

    //$locationProvider.html5Mode(true);
}