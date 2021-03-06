function sidebarService($resource) {
    return $resource('/api/routes/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

sidebarService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('sidebarService', sidebarService);
