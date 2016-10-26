'use strict';

/* Controllers */

angular.module('copya')
    // Chart controller 
    .controller('DashboardCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {

        $scope.refreshTest = function(portlet) {
            console.log("Refreshing...");
            // Timeout to simulate AJAX response delay
            $timeout(function() {
                $(portlet).portlet({
                    refresh: false
                });
            }, 2000);

        }
    }]);



angular.module('copya')
    .directive('widget5Chart', function() {
        return {
            restrict: 'C',
            link: function(scope, el, attrs) {

                var container = '.widget-5-chart';

                var seriesData = [
                    [],
                    []
                ];
                var random = new Rickshaw.Fixtures.RandomData(7);
                for (var i = 0; i < 7; i++) {
                    random.addData(seriesData);
                }

                var graph = new Rickshaw.Graph({
                    element: document.querySelector(container),
                    renderer: 'bar',
                    series: [{
                        data: [{
                            x: 0,
                            y: 10
                        }, {
                            x: 1,
                            y: 8
                        }, {
                            x: 2,
                            y: 5
                        }, {
                            x: 3,
                            y: 9
                        }, {
                            x: 4,
                            y: 5
                        }, {
                            x: 5,
                            y: 8
                        }, {
                            x: 6,
                            y: 10
                        }],
                        color: $.Pages.getColor('danger')
                    }, {
                        data: [{
                            x: 0,
                            y: 0
                        }, {
                            x: 1,
                            y: 2
                        }, {
                            x: 2,
                            y: 5
                        }, {
                            x: 3,
                            y: 1
                        }, {
                            x: 4,
                            y: 5
                        }, {
                            x: 5,
                            y: 2
                        }, {
                            x: 6,
                            y: 0
                        }],
                        color: $.Pages.getColor('master-light')
                    }]

                });


                var MonthBarsRenderer = Rickshaw.Class.create(Rickshaw.Graph.Renderer.Bar, {
                    barWidth: function(series) {

                        return 7;
                    }
                });


                graph.setRenderer(MonthBarsRenderer);


                graph.render();


                $(window).resize(function() {
                    graph.configure({
                        width: $(container).width(),
                        height: $(container).height()
                    });

                    graph.render()
                });

                $(container).data('chart', graph);
            }
        };
    });

$('body').on('click', '.mapplic-pin', function(e) {
    e.preventDefault();
    var location = $(e.target).data('location');
    $('#mapplic').data().mapplic.goToLocation(location, 800);
});