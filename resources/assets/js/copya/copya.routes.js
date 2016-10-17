routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
    $stateProvider
        .state('dashboard', {
            url: '/',
            template: '<h1>testing!</h1>',
            controller: 'HomeController',
            controllerAs: 'home'
        });

    //$locationProvider.html5Mode(true);
}