'use strict';

function Sidebar($scope, sidebarService) {
    $scope.items = [];

    console.log('Sidebar here - call api call to get list of sidebar');
    sidebarService.query({}, function (result) {
        $scope.items = result.data
    }, function(err){
        console.log(err);
    });
}

Sidebar.$inject = ['$scope','sidebarService'];

angular.module('copya')
    .controller('SidebarCtrl', Sidebar);

