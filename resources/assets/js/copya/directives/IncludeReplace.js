import angular from 'angular';

function includeReplace() {
    return {
        require: 'ngInclude',
        restrict: 'A',
        link: function(scope, el, attrs) {
            el.replaceWith(el.children());
        }
    }
}


export default angular.module('includeReplace', [])
    .directive('includeReplace', includeReplace);