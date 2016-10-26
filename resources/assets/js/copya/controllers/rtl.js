'use strict';

/* Controllers */

angular.module('copya')
    .controller('RTLCtrl', ['$scope', function($scope) {

        $scope.app.layout.theme = 'pages/css/pages.rtl.css'

         $scope.$on("$destroy", function(){
            $scope.app.layout.theme = 'pages/css/pages.css'
        });

    }]);