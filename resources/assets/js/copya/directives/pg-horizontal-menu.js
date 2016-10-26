/* ============================================================
 * Directive: pgHorizontalMenu
 * AngularJS directive for Pages Horizontal Menu
 * ============================================================ */


function pgHorizontalMenu($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {

            $(document).on('click', '.horizontal-menu .bar-inner > ul > li', function(){
                $(this).toggleClass('open').siblings().removeClass('open');
            });

            $('.content').on('click', function () {
                $('.horizontal-menu .bar-inner > ul > li').removeClass('open');
            });
        }
    }
}

pgHorizontalMenu.$inject = ['$parse'];

angular.module('copya')
    .directive('pgHorizontalMenu', pgHorizontalMenu);


function pgHorizontalMenuToggle($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {

            $(element).click(function(e) {
                e.preventDefault();
                $('body').toggleClass('menu-opened');
            });

        }
    }
}

pgHorizontalMenuToggle.$inject = ['$parse'];

angular.module('copya')
    .directive('pgHorizontalMenuToggle', pgHorizontalMenuToggle);
  
       
        