routes.$inject = ['$stateProvider', '$urlRouterProvider'];

export default function routes($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('dashboard', {
            url: '/',
            template: '<h1>testing</h1>'
        });

    $urlRouterProvider.when('', '/');
    //$locationProvider.html5Mode(true);
}