var app = angular.module('myApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/page2", {
            templateUrl: "index2.html",
        })
        .when('/page3', {
            templateUrl: 'index3.html'
        })
        .when('/page1', {
            templateUrl: "main.html"
        })
        .when("/page4", {
            templateUrl: "angular.html"
        })
        .when("/page5", {
            templateUrl: "index4.html"
        })
        .when("/page6", {
            templateUrl: "index5.html",
            controller: "page6"
        })
        .when("/", {
            templateUrl: "index7.html",
            controller: "second1"
        })
        .when("/page7", {
            templateUrl: "index6.html"
        })
        .when("/page8", {
            templateUrl: "shoping cart.html",
            controller: "shop"
        })
});

app.controller("shop", function ($scope) {
    $scope.arr = [];
    $scope.arr1 = [];
    var xhrHttp = new XMLHttpRequest();
    xhrHttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                $scope.data = JSON.parse(this.responseText);
                $scope.datas = $scope.data.shopping
                $scope.$apply();
            }
        }
    }
    xhrHttp.open('GET', 'product.json', true);
    xhrHttp.send();
    $scope.add = function (a) {
        $scope.numb = 0;
        $scope.datas.forEach(element => {
            if (a == element.id) {
                $scope.arr.push(element)
            }
        });

    }
    $scope.delete = function (a, b) {
        $scope.price -= $(b.target).parents("#summa").find("#nomb").text()
        $scope.arr.splice(a, 1)
    }
    var nomb = 0;
    // var total = 0;
    var totalAmount = 500000;
    $scope.ok = function (s) {
        var no = $(s.target).val();
        var nom = $(s.target).prev().children().text();
        nomb = no * nom;
        $(s.target).parent().find("#nomb").text(nomb);
    }
    $scope.total = function (a) {
        $scope.arr1.push($(a.target).parents("#summa").find("#nomb").text())
        // console.log($scope.arr1);
        $scope.price = $scope.arr1.reduce(get, 0)
        function get(total, num) {
            return Number(total) + Number(num)
        }
    }
    $scope.balance = function () {
        $scope.balance1 = totalAmount - $scope.price
    }
})

app.controller("main1", function ($scope, serv) {
    $scope.confirm = function () {
        $scope.num = false;
        if ($scope.ss && $scope.nn && $scope.sss && $scope.nnn != '') {
            serv.arr.push({ name: $scope.ss, password: $scope.nn, DateOfBirth: $scope.sss, pNo: $scope.nnn })
            // console.log(serv.arr);
            window.location.href = "#!"
        }
        else {
            $scope.num = true;
        }
    }
})

app.controller("second1", function ($scope, serv) {
    $scope.signUp = function () {
        window.location.href = "#!page7"
    }
    $scope.logIn = function () {
        $scope.num1 = false
        $scope.data = serv.arr;
        var nan = $scope.data
        for (var i = 0; i < nan.length; i++) {
            if (nan[i].name == $scope.ssss && nan[i].password == $scope.nan) {
                window.location.href = "#!page1"
            }
            else {
                $scope.num1 = true;
            }
        }
    }
})

app.service("serv", function () {
    var a = this
    a.arr = [{ name: "siva", password: "123456" }]
})



app.controller("main", function ($scope) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
    $scope.nam = ["athi", "siva", "ram"]
    $scope.character = 6;
    var xhrHttp = new XMLHttpRequest();
    xhrHttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                $scope.data = JSON.parse(this.responseText);
                $scope.datas = $scope.data.students
                $scope.$apply();
            }
        }
    }
    xhrHttp.open('GET', 'students.json', true);
    xhrHttp.send();
})

app.controller("page1", function ($scope, $timeout) {
    $scope.name = "balu"
    $timeout(function () {
        $scope.name = "siva"
    }, 3000)
    $scope.values = 0;
    $scope.value = 0
    $scope.increment = function () {
        $scope.values++;
    }
    $scope.decrement = function () {
        $scope.values--;
    }
})

app.controller("page2", function ($scope) {
    $scope.names = ["athi", "siva", "ram", "balaji", "bv", "deva", "aswin"]
    $scope.arr = [];
    $scope.add = function () {
        $scope.arr.push({ name: $scope.nn });
        $scope.nn = ''
    }
    $scope.search = function () {
        $scope.nam = $scope.nn;
    }
})

app.controller("dummy1", function ($scope, service) {
    $scope.generateRandom = function () {
        $scope.data = service.nam;
    }
    $scope.add = function () {
        service.nam.push({ name: $scope.sample });
    }
})

app.controller("second", function ($scope, service) {
    $scope.generateRandom = function () {
        $scope.data1 = service.nam
    }
})

app.service("service", function () {
    this.nam = [{ name: "sivaram" }];
})

app.service("ser", function ($http) {
    var a = this;
    a.score = function () {
        return new Promise((resolve) => {
            $http.get("students.json")
                .then(function (response) {
                    a.add = response.data;
                    resolve(a.add);
                })
        })
    }
})

app.controller("page6", function ($scope,ser) {
    $scope.inited = async function () {
        var b = await ser.score();
        $scope.val = b.students;
        $scope.$apply();
    }
})
