var arr = [
    {
        id: 1,
        title: "Cd Drive",
        img: "assets/img/cd-drive.jpg",
        price: 2000
    },
    {
        id: 2,
        title: "Cpu",
        img: "assets/img/cpu.jpg",
        price: 3000
    },
    {
        id: 3,
        title: "Laptop",
        img: "assets/img/laptop.jpg",
        price: 5000
    },
    {
        id: 4,
        title: "Pendrive",
        img: "assets/img/pendrive.jpg",
        price: 1000
    },
    {
        id: 5,
        title: "Phone",
        img: "assets/img/phone.jpg",
        price: 10000
    },
    {
        id: 6,
        title: "Headphone",
        img: "assets/img/headphone.jpg",
        price: 800
    },
    {
        id: 7,
        title: "Watch",
        img: "assets/img/watch.jpg",
        price: 4000
    },
    {
        id: 8,
        title: "Computer",
        img: "assets/img/computer.jpg",
        price: 30000
    },
    {
        id: 9,
        title: "Mouse",
        img: "assets/img/mouse.jpg",
        price: 300
    },
    {
        id: 10,
        title: "Keyboard",
        img: "assets/img/keyboard.jpg",
        price: 800
    }
];
var arr1 = [];
var value;
for (var i = 0; i < arr.length; i++) {
    value = `<div class="col-md-2 m-3   border rounded  border-2px border-dark bg-white" >
    <img src="${arr[i].img}" alt="" class="mt-2 img-fluid mb-2">
    <h5>${arr[i].title}</h5>
    <p>price:${arr[i].price}</p>
    <input type="number" class="inputs">  
    <button class="btn btn-primary cart mt-3 mb-3" onclick="add(${arr[i].id},event)" >Add to cart</button>             
    </div>`
    $("#result").append(value);
}

// var para0;
// var para1;
// var para2;
// var para3;
// var para4;
// var para5;
// var para6;
// var para7;
// var para8;
// var para9;
$("#container-2").hide()
$("#container-3").hide()
$("#goto").on("click", function () {
    $("#container-1").hide()
    $("#container-3").hide()
    $("#addProduct").hide()
    $("#container-2").show()

    // $("#input0").on("change", function () {
    //     if ($("#input0") !== "") {

    //         para0 = $("#para0").text("price:" + ($("#input0").val()) * 2000);
    //     }
    // })

    // $("#input1").on("change", function () {
    //     if ($("#input1") !== "") {
    //         para1 = $("#para1").text("price:" + ($("#input1").val()) * 3000);
    //     }
    // })

    // $("#input2").on("change", function () {
    //     if ($("#input2") !== "") {
    //         para2 = $("#para2").text("price:" + ($("#input2").val()) * 5000);
    //     }
    // })

    // $("#input3").on("change", function () {
    //     if ($("#input3") !== "") {
    //         para3 = $("#para3").text("price:" + ($("#input3").val()) * 1000);
    //     }
    // })

    // $("#input4").on("change", function () {
    //     if ($("#input4") !== "") {
    //         para4 = $("#para4").text("price:" + ($("#input4").val()) * 10000);
    //     }
    // })

    // $("#input5").on("change", function () {
    //     if ($("#input5") !== "") {
    //         para5 = $("#para5").text("price:" + ($("#input5").val()) * 800);
    //     }
    // })

    // $("#input6").on("change", function () {
    //     if ($("#input6") !== "") {
    //         para6 = $("#para6").text("price:" + ($("#input6").val()) * 4000);
    //     }
    // })

    // $("#input7").on("change", function () {
    //     if ($("#input7") == "") {
    //         para7 = $("#para7").text("price:" + ($("#input7").val()) * 30000);
    //     }
    // })

    // $("#input8").on("change", function () {
    //     if ($("#input8") == "") {
    //         para8 = $("#para8").text("price:" + ($("#input8").val()) * 300);
    //     }
    // })

    // $("#input9").on("change", function () {
    //     if ($("#input9") == "") {
    //         para9 = $("#para9").text("price:" + ($("#input9").val()) * 800);
    //     }
    // })
})

$("#back").on("click", function () {
    $("#container-1").show()
    $("#container-2").hide()
})
// var totalAmount = (x)
$("#buy").on("click", function () {
    $("#container-2").hide()
    $("#container-3").show()
    if (totalAmount > balanceAmount) {
        $("#container-2").show();
        $("#container-3").hide();
        $("#error").text("insufficient balance");
    } else {
        $(".balanceamount").text("balance amount is:" + balance)
    }

})

var items
// var total;
var totalAmount;
var index;
var balanceAmount = 50000;
var balance = 50000;
function add(item) {
    for (var i = 0; i < arr.length; i++) {
        if (item == arr[i].id) {
            var value = $(event.currentTarget.parentNode).find(".inputs")[0].value;
            index = value;
            totalAmount = arr[i].price * index;
            balance -= totalAmount
            arr1 =
                `<div class="col-md-2 m-3   border rounded  border-2px border-dark bg-white" >
                <img src="${arr[i].img}" alt="" class="mt-2 img-fluid mb-2">
                <h5>${arr[i].title}</h5>
                <p id="para">price:${totalAmount}</p> 
                <input type="number" id="input" class="inputs mb-3">   
                <button class="btn btn-danger cart mt-3 mb-3">Delete</button>             
                </div>`
            // total = arr[i].price * $("input").val();
            $("#result2").append(arr1);
        }
    }
}
$("#addBack").on("click", () => {
    $("#addProductContainer").hide();
    $("#container-1").show();
})
$("#addProductContainer").hide()

$("#addProduct").on("click", () => {
    $("#addProductContainer").show();
    $("#container-1").hide()
    $("#container-3").hide()
    $("#container-2").hide()
})

let value2;

$("#add").on("click", () => {
    if ($("#addId").val() == '' || $("#addTitle").val() == '' || $("#addImg").val() == '' || $("#addPrice").val() == '') {
        $("#errorMsg").html("please enter all datas correctly")
    } else {
        let addId = $("#addId").val();
        let addTitle = $("#addTitle").val();
        let addImg = $("#addImg").val();
        let addPrice = $("#addPrice").val();
        let final = {
            id: addId,
            title: addTitle,
            img: addImg,
            price: addPrice
        }
        arr.push(final);
        for (var i = 0; i < arr.length; i++) {
            value2 = `<div class="col-md-2 m-3   border rounded  border-2px border-dark bg-white" >
    <img src="${arr[i].img}" alt="" class="mt-2 img-fluid mb-2">
    <h5>${arr[i].title}</h5>
    <p>price:${arr[i].price}</p>
    <input type="number" class="inputs">  
    <button class="btn btn-primary cart mt-3 mb-3" onclick="add(${arr[i].id},event)" >Add to cart</button>             
    </div>`
        }
        $("#result").append(value2);
        $("#container-1").show();
        $("#addProductContainer").hide();
    }

})