require('./bootstrap');
require('angular');
require('jquery');
require('axios');
require('ajax');

(function () {
    angular.module('services', []);
    angular.module('controllers', ['directives']);
    angular.module('directives', ['services']);
    var myApp = angular.module("myApp", ['controllers']);
})();

