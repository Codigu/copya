function navigationsService($resource) {
    return $resource('/api/navigations/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

navigationsService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('navigationsService', navigationsService);
