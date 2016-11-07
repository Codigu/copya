function navigationService($resource) {
    return $resource('/api/navigations/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

navigationService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('navigationService', navigationService);
