var app = angular.module('myApp', []);
app.controller('AdminController', function ($scope) {
    let adminCtrl = this;

    adminCtrl.approve = function ($id, $status, event) {

        
        // $ff = $id.filter(function(e){
        //     if(e.category_id == 2){
        //         return e
        //     }
        // })
        
        // $ff.forEach(e => {
        //     {e.slack =  e.category_name}
        // });
        // console.log($ff);

        if ($status == 1) {
            $val = 0;
        }
        else {
            $val = 1;
        }
        $data = {
            id: $id,
            status: $val
        }
        // console.log(event);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/admin/approve",
            data: $data,
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                if (result == 0) {
                    $(event.target).addClass('butt1');
                    $(event.target).removeClass('butt');
                    $(event.target).html('Approve') ;
                }
                else {
                    $(event.target).addClass('butt');
                    $(event.target).removeClass('butt1');    
                    $(event.target).html('DisApprove') ;
                }
            }
        });
    }

    adminCtrl.delete = function (id, event) {
        $p_id = id

        $data = {
            id: $p_id
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/admin/delete",
            data: $data,
            type: 'POST',
            dataType: 'json',
            success: function (result) {

                console.log(result);

                if(result){
                    event.target.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('delete');
                }
                    
                }
            });


    }

    adminCtrl.categorydelete = function (id, event) {
        $p_id = id

        $data = {
            id: $p_id
        }


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/admin/categorydelete",
            data: $data,
            type: 'POST',
            dataType: 'json',
            success: function (result) {

                console.log(result);
                if(result){
                    event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('delete');
                }
                
            }
        });
    }

    

});
