let students = [
    { id: 0, name: "Athi", Marks: 100 },
    { id: 1, name: "Siva", Marks: 200 },
    { id: 2, name: "Ram", Marks: 300 },
    { id: 3, name: "Balaji", Marks: 400 },
    { id: 4, name: "Bv", Marks: 500 }
]

let firstOne;
for (let i = 0; i < students.length; i++) {
    firstOne =
        `<div class="col-md-2 m-3 p-5  border rounded  border-2px border-dark bg-white" id="fullDiv${i}">
    <p class="names">name:${students[i].name}</p> 
    <p class="marks">marks:${students[i].Marks}</p>  
    <button class="btn btn-primary cart mt-3 mb-3" onclick="add(${students[i].id})">Edit</button>             
    </div>`
    $("#firstDiv").append(firstOne)
}

let adding;
let addName;
let addMarks;
let addId;
let final;
$("#add").on("click", () => {
    if ($("#addId").val() == '' || $("#addName").val() == '' || $("#addMarks").val() == '') {
        $("#errorMsg").html("please enter all datas correctly")
    } else {

        addId = Number($("#addId").val());
        addName = $("#addName").val();
        addMarks = Number($("#addMarks").val());
        final = { id: addId, name: addName, Marks: addMarks };
        students.push(final);
        for (var i = 0; i < students.length; i++) {
            if (students[i].id == addId) {
                adding = `<div class="col-md-2 m-3 p-5  border rounded  border-2px border-dark bg-white" id="fullDiv${i}">
        <p class="names">name:${students[i].name}</p> 
        <p class="marks">marks:${students[i].Marks}</p>  
        <button class="btn btn-primary cart mt-3 mb-3" onclick="add(${students[i].id})" >Edit</button>             
        </div>`
                $("#firstDiv").append(adding);
            }
        }
        $("#errorMsg").hide()
    }

})

let secondOne;
let data;
let j = 0;
function add(num) {
    $("#secondDiv").show()
    if (j == 0) {
        for (let i = 0; i < students.length; i++) {
            data = num;
            if (num == students[i].id) {
                secondOne =
                    `<div class="col-md-4  m-3 p-5  border rounded  border-2px border-dark bg-white" id="${students[i]}">
                <input type="text" class="form-control mb-2 iname" value ="${students[i].name}" id="inputName">
                <input type="text" class="form-control mb-2 imarks" value ="${students[i].Marks}" id="inputMark">
                <button class="btn btn-primary cart mt-3 mb-3" onclick="save(${students[i].id},event)" >Update</button>
                </div>`
                $("#secondDiv").append(secondOne);
                j++;
            }
        }
    }
}

function save(num1, event) {
    $("#secondDiv").html('')
    j = 0;
    // chec = $("#inputName").val()
    let check1 = $(event.currentTarget.parentNode).find(".iname")[0].value;
    let check2 = $(event.currentTarget.parentNode).find(".imarks")[0].value;
    for (let i = 0; i < students.length; i++) {
        if (num1 == students[i].id) {
            $(`#fullDiv${data} .names`)[0].innerHTML = "name:" + check1
            students[data].name = check1;
            $(`#fullDiv${data} .marks`)[0].innerHTML = "Marks:" + check2
            students[data].Marks = check2;
        }
        $("#secondDiv").hide()
    }
}

$("#search").on("click", () => {
    search()
})

let arr = [];

let k = 0
function search() {
    let inputVal = $("#input-box").val().toLowerCase()
    if (inputVal != '') {
        if (k == 0) {
            var filtered = $.grep(students, function (obj) {
                return obj.name.toLowerCase().indexOf(inputVal) > -1;
            });
            $.each(filtered, function (index, obj) {
                var p =
                    `<div class="col-md-2 m-3 p-5  border rounded  border-2px border-dark bg-white">
                <p class="names">name:${obj.name}</p> 
                <p class="marks">marks:${obj.Marks}</p>
                <button class="btn btn-primary cart mt-3 mb-3" onclick="add(${obj.id})">Edit</button>             
                </div>`
                $("#thirdDiv").append(p);
                k++;
            });
        }
    }
};