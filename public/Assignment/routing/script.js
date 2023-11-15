var app = angular.module("myApp",["ngRoute"]);

app.config(function($routeProvider){
    $routeProvider
    .when("/page1",{
        templateUrl:"home.html"
    })
    .when("/page2",{
        templateUrl:"page1.html"
    })
    .when("/page3",{
        templateUrl:"angular.html"
    })
})

app.factory('random', function() {
    var randomObject = {};
    var number = Math.floor(Math.random() * 100);
    randomObject.generate = function() {
        return number;
    };
    return randomObject;
});
app.service('service', function() {
    this.name = 'sathish';
    this.myFunc = function (x) {
        return x.toString(16);
    }
});

app.controller('thisapp', function($scope,random,service) {
    $scope.naomi = { name: 'Naomi', address: '1600 Amphitheatre' };
    $scope.igor = { name: 'Igor', address: '123 Somewhere' };
    $scope.generateRandom = function() {
        $scope.randomNumber = random.generate();
        $scope.data = service.name;
        $scope.getValue = service.myFunc(10);
    };
    $scope.hideDialog = (data) =>{
        console.log(data);
    }
}).directive('myCustomer', function() {
    return {
        restrict: 'E',
        scope: {
          customerInfo: '=info',
          close: '&onClose'
        },
        template: `<h1>Name: {{customerInfo.name}} Address: {{customerInfo.address}} <p ng-click="close({message: 'closing for now'})">Click here</p></h1>`
    };
});
app.directive("w3TestDirective", function() {
    return {
        template : "<h1>Made by a directive!</h1>"
    };
});