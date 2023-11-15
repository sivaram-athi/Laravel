var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "login.html",
            controller: "page1"
        })
        .when("/page2", {
            templateUrl: "signup.html",
            controller: "page2"
        })
        .when("/page3", {
            templateUrl: "main.html",
            controller: "page3"
        })
        .when("/page4", {
            templateUrl: "last.html",
        })
})

app.service("myService", function () {
    var a = this;
    a.name;
    a.amnt;
    a.upi;
    a.arr = [{ name: "siva", upi: "123456", accountNumber: 1234567890, amount: 50000, friends: [] }, { name: "athi", upi: "1234567", accountNumber: 123456789, amount: 60000, friends: [] }]
})

app.controller("page1", function ($scope, myService) {
    $scope.main = myService.arr
    var nan = $scope.main
    $scope.signup = function () {
        window.location.href = "#!page2"
    }
    $scope.shw = false
    $scope.login = function () {
        for (var i = 0; i < nan.length; i++) {
            if (nan[i].name == $scope.loginName && nan[i].upi == $scope.loginUpi) {
                myService.name = $scope.loginName
                myService.amnt = nan[i].amount
                myService.upi = nan[i].upi
                window.location.href = "#!page3"
            }
            else {
                // $scope.loginName=''
                // $scope.loginUpi=''
                $scope.shw = true
            }
        }
    }
})

app.controller("page2", function ($scope, myService) {
    $scope.show = false
    $scope.generate = function () {
        $scope.signUpi = ""
        for (var i = 0; i < 6; i++) {
            $scope.signUpi += Math.floor(Math.random() * 9)
        }
    }
    $scope.confirm = function () {
        if ($scope.signUpName && $scope.signUpi && $scope.accountNumber && $scope.accountBalance != '') {
            myService.arr.push({ name: $scope.signUpName, upi: $scope.signUpi, accountNumber: $scope.accountNumber, amount: $scope.accountBalance, friends: [] })
            // console.log(myService.arr);
            window.location.href = "#!"
        }
        else {
            $scope.show = true
        }

    }
})

app.controller("page3", function ($scope, myService, $timeout) {
    $scope.name = myService.name
    $scope.man = myService.arr
    $scope.bal = myService.amnt
    // $scope.ss = myService.upi
    var data = $scope.man
    $scope.logout = function () {
        window.location.href = "#!"
    }
    var arr1 = []
    $scope.show1 = false
    $scope.user = function () {
        for (var i = 0; i < data.length; i++) {
            if (myService.name != data[i].name) {
                $scope.show1 = true
                arr1.push(data[i].name)
            }
        }
    }
    $scope.scope = arr1;

    var letter;
    $scope.add = function (m) {
        for (var i = 0; i < data.length; i++) {
            if (myService.name == data[i].name) {
                letter = m
                data[i].friends.push(letter)
                // console.log(data);
            }
        }

    }

    $scope.inition = function () {
        for (var i = 0; i < data.length; i++) {
            if (myService.name == data[i].name) {
                $scope.friends = data[i].friends
                // console.log($scope.friends);
            }
        }
    }

    $scope.view = function (x) {
        for (var i = 0; i < data.length; i++) {
            if (x == data[i].name) {
                $scope.mainName = data[i].name
                $scope.mainAcc = data[i].accountNumber
            }
        }
    }

    $scope.hel = false
    $scope.transfer = function () {
        myService.arr.forEach(element => {
            if (element.accountNumber == $scope.mainAcc) {
                element.amount += Number($scope.mainAmount)
                window.location.href = "#!page4"
            }
            else {
                $scope.hel = true
            }
            if (element.upi == myService.upi) {
                element.amount -= Number($scope.mainAmount)
                console.log(element.amount);
            }
        });
        $timeout(function () {
            window.location.href = "#!page3"
        }, 3000)
    }
})