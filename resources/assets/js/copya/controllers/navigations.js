'use strict';

function NavigationCtrl($scope, $sce, $state, $stateParams, pagesService, layoutService) {
    $scope.page = {};
    $scope.layouts = {};
    $scope.pages = [];


    $scope.trustAsHtml = function(value) {
        return $sce.trustAsHtml(value);
    };

    $scope.summernote_options = {
        height: 200,
        onfocus: function(e) {
            $('body').addClass('overlay-disabled');
        },
        onblur: function(e) {
            $('body').removeClass('overlay-disabled');
        }
    };

    $scope.focus = function(e) {
        $('body').addClass('overlay-disabled');
    };

    $scope.blur = function(e) {
        $('body').removeClass('overlay-disabled');
    };

    $scope.submitForm = function(isValid) {
        // check to make sure the form is completely valid
        if (isValid) {
            if($scope.page.id){
                pagesService.update({id: $scope.page.id}, $scope.page, function(result){
                    alert('Page has been saved.');
                    $state.go('pages.index');
                }, function(err){
                    console.log(err);
                });
            } else {
                pagesService.save({}, $scope.page, function(result){
                    alert('Page has been saved.');
                    $state.go('pages.index');
                }, function(err){
                    console.log(err);
                });
            }

        }
    };

    $scope.newPage = function(){
        $state.go('pages.add');
    };

    $scope.editPage = function(id){
        $state.go('pages.edit', {id: id});
    };

    if($state.is('pages.add')){
        layoutService.query({}, function(result){
            $scope.layouts = result.data;
        }, function(err){
            alert(err);
        });
    } else if($state.is('pages.index')){
        pagesService.query({}, function(result){
            $scope.pages = result.data;
        }, function(err){
            console.log(err);
        });
    } else if($state.is('pages.edit')){
        layoutService.query({}, function(result){
            $scope.layouts = result.data;
        }, function(err){
            alert(err);
        });

        pagesService.query({id: $stateParams.id}, function(result){
            $scope.page = result.data;
            console.log = result;
        }, function(err){
            console.log(err);
        });
    }
}

PagesCtrl.$inject = ['$scope', '$sce', '$state', '$stateParams', 'pagesService', 'layoutService'];

angular.module('copya', ['summernote'])
    // Chart controller 
    .controller('PagesCtrl', PagesCtrl);


