var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "signup.html"
        })
        .when("/page1", {
            templateUrl: "login.html"
        })
        .when("/page2", {
            templateUrl: "main.html"
        })
})


app.service("myService", function () {
    this.name;
    this.arr = [{ Name: "siva", Password: "123456", Email: "siva@gmail.com", color: ["rgb(255, 155, 55)", "rgb(255, 55, 155)", "rgb(55, 255, 155)", "rgb(55, 155, 255)", "rgb(255, 130, 55)", "rgb(55, 155, 55)"], friends: [] }]
})

app.controller("signup", function ($scope, myService) {
    $scope.confirm = function () {
        if ($scope.signUpName && $scope.signUpPassword && $scope.signUpEmail != '') {
            myService.arr.push({ Name: $scope.signUpName, Password: $scope.signUpPassword, Email: $scope.signUpEmail, color: [], friends: [] })
            window.location.href = "#!page1"
            // console.log(myService.arr);
        }
    }
})

app.controller("login", function ($scope, myService) {
    $scope.main = myService.arr
    var nan = $scope.main
    $scope.signup = function () {
        window.location.href = "#!"
    }
    $scope.login = function () {
        // debugger
        for (var i = 0; i < nan.length; i++) {
            if (nan[i].Name == $scope.loginName && nan[i].Password == $scope.loginPassword) {
                myService.name = $scope.loginName
                window.location.href = "#!page2"
            }
        }
    }
})
app.controller("main", function ($scope, myService) {
    $scope.name = myService.name
    var fun = myService.arr
    
    var inc = 1
    $scope.generateButton = function () {

        for(var i=0;i<fun.length;i++){
            // debugger
            if(myService.name == fun[i].Name){
                if (inc <= 6) {
                    inc = inc+1;
                    $scope.r = Math.floor(Math.random() * 256);
                    $scope.g = Math.floor(Math.random() * 256);
                    $scope.b = Math.floor(Math.random() * 256);
                    $scope.rgb = "rgb(" + $scope.r + ", " + $scope.g + ", " + $scope.b + ")"
                    console.log($scope.rgb);
                    fun[i].color.push($scope.rgb)
                    $scope.back = $scope.rgb
                }
            }
        }  
    }
    $scope.data =myService.arr
    var data = $scope.data;
    $scope.prev =false;
    $scope.preview = function(){
        // debugger
        for(var i=0;i<data.length;i++){
            if(myService.name== data[i].Name){
                $scope.prev = !$scope.prev
                var color = data[i].color;
                $scope.color = color
                // console.log($scope.color);
                // $scope.bac =$scope.color
            }
        }
    }

    var arr1=[];
    $scope.show = false
    $scope.makeFriend= function(){
        for(var i=0 ;i<data.length;i++){
            if(myService.name != data[i].Name){
                $scope.show=true
                arr1.push(data[i].Name)
            }
        }
    }
    $scope.scope = arr1;

    var letter;
    $scope.click =function(m){
        for(var i=0;i<data.length;i++){
            if(m == data[i].Name){
               letter = m
            }
        }
        for(var i=0;i<data.length;i++){
            if(myService.name==data[i].Name){
                data[i].friends.push(letter)
                // console.log(data);
            }
        }
    }
    $scope.blr = false;
    var frd;
    $scope.friend= function(){
        for(var i=0;i<data.length;i++){
            if ( myService.name ===  data[i].Name ){
                $scope.blr = true;
                frd = data[i].friends;
            }
        }
        $scope.blue=frd
    }
    var click
    var clicked =[]
    $scope.click1 =function(ss){
        // debugger
        for(var j=0;j<=data.length;j++) {
            if (ss==data[j].Name){
                clicked = data[j].color
                // console.log(clicked);
                $scope.color = clicked;
            }
        }
    }
})