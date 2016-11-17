'use strict';

function FormsCtrl($scope, $sce, $state, $stateParams, formService) {
    $scope.forms = [];

    $scope.edit = function(id){
        $state.go('forms.edit', {id: id});
    };

    formService.query({}, function(result){
        $scope.forms = result.data;
        console.log($scope.forms);
    }, function(err){
        console.log(err.data);
    });
}

FormsCtrl.$inject = ['$scope', '$sce', '$state', '$stateParams', 'formService'];

angular.module('copya', ['ui.tree'])
    // Chart controller 
    .controller('FormsCtrl', FormsCtrl);


