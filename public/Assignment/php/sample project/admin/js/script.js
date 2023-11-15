var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "includes/home.php"
        })
        .when("/page1", {
            templateUrl: "includes/user.php"
        })
        .when("/page2", {
            templateUrl: "includes/upload.php"
        })
        .when("/page3", {
            templateUrl: "includes/form.php"
        })
})