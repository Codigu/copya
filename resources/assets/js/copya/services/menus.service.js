function menuService($resource) {
    return $resource('/api/menus/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

menuService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('menuService', menuService);
