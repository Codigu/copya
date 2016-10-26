function layoutService($resource) {
    return $resource('/api/layouts/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

layoutService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('layoutService', layoutService);
