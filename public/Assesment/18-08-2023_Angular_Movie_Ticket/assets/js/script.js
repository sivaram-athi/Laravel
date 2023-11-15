var app = angular.module("myApp", ["ngRoute"])

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "signup.html",
            controller: "page1"
        })
        .when("/page2", {
            templateUrl: "main.html",
            controller: "page2"
        })
        .when("/page3", {
            templateUrl: "last.html"
        })
})

app.service("myService", function () {
    var a = this;
    a.name;
    a.quants;
    a.total;
    a.arr = [{ email: "sivaramathi2001@gmail.com", name: "sivaram", password: "123456" }]
    a.movies = [{ movie: "interstellar", time: "12.30 PM", tickets: 5 }, { movie: "spiderMan", time: "01.05 PM", tickets: 3 }, { movie: "Avengers", time: "03.20 PM", tickets: 2 }]
    a.bevarage = [{ item: "coke", rate: 70, quantity: 0 }, { item: "water bottle", rate: 40, quantity: 0 }, { item: "pop corn", rate: 170, quantity: 0 }, { item: "chicken puff", rate: 90, quantity: 0 }]
})

app.controller("page1", function ($scope, myService) {
    $scope.login1 = true
    $scope.scope = myService.bevarage
    
    $scope.login = function () {
        $scope.signup1 = true
        $scope.login1 = false
    }
    $scope.signup1 = true
    $scope.signup = function () {
        $scope.login1 = true
        $scope.signup1 = false
    }
    for (var i = 0; i < $scope.scope.length; i++) {
        $scope.scope[i].quantity = 0;
    }
    $scope.confirm = function () {
        if ($scope.signUpName && $scope.signUpEmail && $scope.signUpPassword != '') {
            myService.arr.push({ email: $scope.signUpEmail, name: $scope.signUpName, password: $scope.signUpPassword })
            myService.name = $scope.signUpName
            console.log(myService.arr);
            window.location.href = "#!page2"
        }
        else {
            $scope.show = true
        }
    }
    $scope.todo = myService.arr
    $scope.log = function () {
        for (var i = 0; i < $scope.todo.length; i++) {
            if ($scope.loginName == $scope.todo[i].name && $scope.loginPassword == $scope.todo[i].password) {
                myService.name = $scope.loginName
                window.location.href = "#!page2"
            }
            else {
                $scope.shw = true
            }
        }

    }
})

app.controller("page2", function ($scope, myService, $timeout) {
    $scope.name = myService.name
    $scope.movie = myService.movies
    var nan1 = $scope.movie
    $scope.main = myService.bevarage
    var nan = $scope.main
    $scope.show1 = false
    $scope.bevarage1 = false
    $scope.show = function () {
        $scope.show1 = true
        $scope.bevarage1 = false
    }
    $scope.num = 0;
    $scope.bevarage = function () {
        $scope.bevarage1 = true
        $scope.show1 = false
    }
    $scope.select = function () {
        $scope.show1 = true
        $scope.bevarage1 = false
    }
    $scope.tot = function () {
        var hel = 0;
        var hell = 0
        for (var i = 0; i < nan.length; i++) {
            hell = nan[i].rate * nan[i].quantity;
            hel = hel + hell;
            $scope.fun = hel;
            myService.total = $scope.fun
        }
    }
    $scope.ticketRate = 200;
    $scope.dummy = false;
    $scope.move = function (x) {
        $scope.gg = x.movie
        $scope.dummy = true
        $scope.dis = false
        $scope.tick = 0
    }
    $scope.error = true
    $scope.add = function () {
        for (var i = 0; i < nan1.length; i++) {
            if (nan1[i].movie == $scope.gg) {
                if ($scope.tick <= nan1[i].tickets) {
                    $scope.totalPrice = $scope.tick * $scope.ticketRate
                    $scope.error = true
                    // $scope.dis = true
                }
                else{
                    $scope.error = false
                }
            }
        }
    }
    $scope.last = function () {
        if ($scope.tick != '') {
            window.location.href = "#!page3"
            $timeout(function () {
                window.location.href = "#!"
            }, 3000)
        }
        else{
            $scope.pay =true
        }
    }
    $scope.logout = function(){
        window.location.href="#!"
    }
})