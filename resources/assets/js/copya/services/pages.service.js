function pagesService($resource) {
    return $resource('/api/pages/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

pagesService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('pagesService', pagesService);
