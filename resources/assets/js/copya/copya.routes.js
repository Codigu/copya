routes.$inject = ['$routeProvider', '$locationProvider'];

export default function routes($routeProvider, $locationProvider) {
    $routeProvider
        .when('/', {
            template: '<h1>You have to work</h1>',
        });

    //$locationProvider.html5Mode(true);
}