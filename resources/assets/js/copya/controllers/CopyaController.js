function CopyaController($scope, $rootScope, $state){
    // App globals
    $scope.app = {
        name: 'Pages',
        description: 'Admin Dashboard UI kit',
        layout: {
            menuPin: false,
            menuBehind: false,
            theme: 'css/copya-dashboard.css'
        },
        author: 'Revox'
    };
    // Checks if the given state is the current state
    $scope.is = function (name) {
        return $state.is(name);
    };
    // Checks if the given state/child states are present
    $scope.includes = function (name) {
        return $state.includes(name);
    };

    // Broadcasts a message to pgSearch directive to toggle search overlay
    $scope.showSearchOverlay = function () {
        $scope.$broadcast('toggleSearchOverlay', {
            show: true
        })
    };

    console.log('CopyaCtrl');
}


CopyaController.$inject = ['$scope', '$rootScope', '$state'];


angular.module('copya')
    .controller('CopyaCtrl', CopyaController);
