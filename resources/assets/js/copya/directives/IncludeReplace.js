
function includeReplace() {
    return {
        require: 'ngInclude',
        restrict: 'A',
        link: function(scope, el, attrs) {
            el.replaceWith(el.children());
        }
    }
}


angular.module('copya')
    .directive('includeReplace', includeReplace);