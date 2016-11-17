function formService($resource) {
    return $resource('/api/forms/:id',{id: '@id'},
        { query: {method:'GET', isArray:false}, get: {method: "GET"}, destroy: { method: "DELETE" }, update: { method: "PUT" } }
    );

}

formService.$inject = ['$resource'];

angular
    .module('copya')
    .factory('formService', formService);
