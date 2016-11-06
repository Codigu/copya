'use strict';

function NavigationCtrl($scope, $sce, $state, $stateParams, navigationService, menuService) {
    $scope.navigations = [];
    $scope.modal = {};
    $scope.modal.slideUp = "default";
    $scope.modal.stickUp = "default";
    $scope.navigation = {};
    $scope.items = [];
    $scope.menus = [];
    $scope.selectedMenu = [];

    /*$scope.items = [{
        url: "Item 1", // this object will be referenced as the $item on scope
    }, {
        url: "Item 2",
    },{
        url: "Item 3",
        "items": [
            {
               url: "Test"
            },
        ]
    }];*/

    $scope.toggleSlideUpSize = function() {
        var size = $scope.modal.slideUp;
        var modalElem = $('#modalSlideUp');
        if (size == "mini") {
            $('#modalSlideUpSmall').modal('show')
        } else {
            $('#modalSlideUp').modal('show');
            if (size == "default") {
                modalElem.children('.modal-dialog').removeClass('modal-lg');
            } else if (size == "full") {
                modalElem.children('.modal-dialog').addClass('modal-lg');
            }
        }
    };

    $scope.submitNavigationForm = function(isValid) {
        // check to make sure the form is completely valid
        if (isValid) {
            navigationService.save({}, $scope.navigation, function(result){
                //$scope.toggleSlideUpSize();
                $('#modalSlideUp').modal('hide');
                $scope.navigations.push(result.data);
                $scope.navigation = {};
                $scope.navigation_.$setUntouched();
                $scope.navigation_.$setPristine();
            }, function(err){
                console.log(err);
            });
        }
    };

    $scope.newPage = function(){
        $state.go('pages.add');
    };

    $scope.editPage = function(id){
        $state.go('pages.edit', {id: id});
    };

    $scope.selectMenu = function(menu){
        $scope.selectedMenu.push(menu);
    };

    $scope.addToNavigation = function(){
        $scope.items = $scope.items.concat($scope.selectedMenu);

        var index;

        for (index = 0; index < $scope.selectedMenu.length; ++index) {
            var itemIndex = $scope.menus.indexOf($scope.selectedMenu[index]);
            $scope.menus.splice(itemIndex, 1);
        }

        $scope.selectedMenu = [];
    };

    $scope.saveNavigationMenu = function(){
        navigationService.update({id: $stateParams.id}, {id: $stateParams.id, items: $scope.items}, function(result){
            console.log('Saved')
        }, function(err){
            console.log(err);
        });
    };

    if($state.is('navigations.index')){
        navigationService.query({}, function(result){
            $scope.navigations = result.data;

        }, function(err){
            console.log(err);
        });
    } else if($state.is('navigations.show')){
        navigationService.get({id: $stateParams.id}, function(result){
            $scope.navigations = result.data;
            $scope.items = result.data.menu;
        }, function(err){
            console.log(err);
        });

        menuService.query({nav_id: $stateParams.id}, function(result){
            $scope.menus = result.data
        }, function(err){

        });
    }
}

NavigationCtrl.$inject = ['$scope', '$sce', '$state', '$stateParams', 'navigationService', 'menuService'];

angular.module('copya', ['ui.tree'])
    // Chart controller 
    .controller('NavigationCtrl', NavigationCtrl);


