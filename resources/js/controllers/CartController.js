var app = angular.module('myApp', []);
app.controller('CartController', function ($scope) {
    let CartCtrl = this;
    // CartCtrl.quantity = 1 ;
    
    CartCtrl.cart = document.getElementById('cart');
    CartCtrl.addCart = function(id,user){
        $data ={
            user_id : user.id,
            // product_quantity : quantity,
            product_id : id.id
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/addCart",
            data: $data,
            type: 'POST',
            dataType: 'json',
            success: function (result) {

                CartCtrl.cart.innerHTML = result;

                console.log(result);

            }
        });
    }
});

app.controller('Cart1Controller', function ($scope) {
    let Cart1Ctrl = this;
    Cart1Ctrl.add = true;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/amazon/cart/web",
        type: 'GET',
        dataType: 'json',
        success: function (result) {

            Cart1Ctrl.fun = result;

            Cart1Ctrl.fun2 = Cart1Ctrl.fun.map(e => {
                return Cart1Ctrl.fun1 = e.product_price * e.product_quantity;
            }); 

            if (Cart1Ctrl.fun2.length == 0) {
                Cart1Ctrl.fun3 = 0
            }
            else {
                Cart1Ctrl.fun3 = Cart1Ctrl.fun2.reduce(function (total, number) {
                    return total + number;
                })
            }
            

            $('#num').text(Cart1Ctrl.fun3);
            $('#num1').text(Cart1Ctrl.fun3);

            // console.log(Cart1Ctrl.fun3);


        }
    });

    Cart1Ctrl.click = function (id) {
        Cart1Ctrl.add = false;
    }
    // Cart1Ctrl.quans = 1
    Cart1Ctrl.click1 = function (id, stat) {

        $data = {
            product_id: id,
            quantity: stat
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: "/amazon/cart/cart",
            data: $data,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                console.log(result);
                Cart1Ctrl.fun = result;

                Cart1Ctrl.fun2 = Cart1Ctrl.fun.map(e => {
                    return Cart1Ctrl.fun1 = e.product_price * e.product_quantity;
                });

                if (Cart1Ctrl.fun2.length == 0) {
                    Cart1Ctrl.fun3 = 0
                }
                else {
                    Cart1Ctrl.fun3 = Cart1Ctrl.fun2.reduce(function (total, number) {
                        return total + number;
                    })
                }


                $('#num').text(Cart1Ctrl.fun3);
                $('#num1').text(Cart1Ctrl.fun3);

            }
        });
        Cart1Ctrl.add = true;
    }

    Cart1Ctrl.click2 = function (id, event) {
        $data = {
            id: id
        }

        event.target.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('delete');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: "/amazon/cart/del",
            data: $data,
            type: 'GET',
            dataType: 'json',
            success: function (result) {

                console.log(result);
                Cart1Ctrl.fun = result;

                Cart1Ctrl.fun2 = Cart1Ctrl.fun.map(e => {
                    return Cart1Ctrl.fun1 = e.product_price * e.product_quantity;
                });

                if (Cart1Ctrl.fun2.length == 0){
                    Cart1Ctrl.fun3 = 0
                }
                else{
                    Cart1Ctrl.fun3 = Cart1Ctrl.fun2.reduce(function (total, number) {
                        return total + number;
                    })
                }
                


                $('#num').text(Cart1Ctrl.fun3);
                $('#num1').text(Cart1Ctrl.fun3);
            }
        });
    }
});