var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/page1", {
            templateUrl: "index1.html",
            controller: "main"
        })
        .when("/", {
            templateUrl: "index2.html",
            controller:"second"
        })
})

app.controller("main", function ($scope, ser) {
    $scope.confirm = function () {
        $scope.num = false;
        if ($scope.ss && $scope.nn && $scope.sss && $scope.nnn != '') {
            ser.arr.push({ name: $scope.ss, password: $scope.nn, DateOfBirth: $scope.sss, pNo: $scope.nnn })
            console.log(ser.arr);
            window.location.href = "#!"
        }
        else {
            $scope.num = true ;
        }
    }
})

app.controller("second",function($scope,ser){
    $scope.signUp =function(){
        window.location.href="#!page1"
    }
    $scope.logIn = function(){
        debugger
        $scope.data =ser.arr;
        var nan= $scope.data
        for(var i=0;i<nan.length;i++){
            if(nan[i].name == $scope.ssss && nan[i].password == $scope.nan)[
                window.location.href="#"
            ]
        }
    }
})

app.service("ser", function () {
    var a = this
    a.arr = [{ name: "siva", password: "123456" }]
    // console.log(a.arr);
})

