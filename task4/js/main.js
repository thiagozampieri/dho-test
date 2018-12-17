"use strict";

var app = angular.module("task4", ["ngRoute", "ngResource", "ngSanitize", "ngLocale", "ui.bootstrap", "ui.sortable", "ngSwipeItem"]);

app.run();

app.config(["$routeProvider", "$httpProvider", "$locationProvider", function ($routeProvider, $httpProvider, $locationProvider) {
    $locationProvider.hashPrefix('');

    $routeProvider.when('/', {
        templateUrl: 'partials/todolist.html',
        controller: 'IndexController',
        label: 'Início',
    })

        .otherwise({
            templateUrl: '/partials/404.html',
            label: 'Error'
        });
}]);