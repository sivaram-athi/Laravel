var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "index1.html",
            controller: "page1"
        })
        .when("/page2", {
            templateUrl: "index2.html",
            controller: "page2"
        })
})

app.service("myService", function ($http) {
    var a = this;
    a.firstName;
    a.lastName;
    a.password;
    a.detail
    a.score = function () {
        return new Promise((resolve) => {
            $http.get("details.json")
                .then(function (response) {
                    a.add = response.data;
                    resolve(a.add);
                })
        })
    }
})

app.controller("page1", function ($scope, myService) {
    $scope.show = false
    $scope.inited = async function () {
        var b = await myService.score();
        $scope.val = b.details;
        myService.detail = $scope.val
        $scope.$apply();
    }
    $scope.login = function () {
        if ($scope.FirstName && $scope.LastName && $scope.Password != '') {
            myService.firstName = $scope.FirstName
            myService.lastName = $scope.LastName
            myService.password = $scope.Password
            $scope.show = true
            for (var i = 0; i < $scope.val.length; i++) {
                if ($scope.FirstName == $scope.val[i].firstName && $scope.LastName == $scope.val[i].lastName && $scope.Password == $scope.val[i].password) {
                    window.location.href = "#!page2"
                }
            }
        }
        else{
            $scope.show = true
        }
    }
})

app.controller("page2", function ($scope, myService) {
    $scope.firstName = myService.firstName
    $scope.lastName = myService.lastName
    $scope.password = myService.password
    var arr
    myService.detail.forEach(element => {
        if (element.firstName == $scope.firstName && element.lastName == $scope.lastName && element.password == $scope.password) {
            arr = element.loans;
        }
    });

    $scope.button1 = function () {
        var loop = []
        $scope.sample = ""
        for (var i = 0; i < arr.length; i++) {
            if (i <= 4) {
                var lot = arr[i]
                loop.push(lot);
                $scope.sample = loop;
            }
        }
    }

    $scope.button2 = function () {
        $scope.sample = ""
        var loop1 = []
        for (var i = 0; i < arr.length; i++) {
            if (i > 4) {
                var lot = arr[i]
                loop1.push(lot);
                $scope.sample = loop1;
            }
        }
    }

    $scope.logout = function(){
        window.location.href="#!"
    }
})