



var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "signup.php",
            controller: "signup"
        })
})

app.controller("signup", function ($scope) {
    
})

