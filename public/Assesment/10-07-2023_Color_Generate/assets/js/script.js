var displayColor = document.getElementById("displayColor");
var generateButton = document.getElementById("generateButton");
var addButton1 = document.getElementById("addButton1");
var removeButton1 = document.getElementById("removeButton1");
var addButton2 = document.getElementById("addButton2");
var removeButton2 = document.getElementById("removeButton2");
var redSort = document.getElementById("redSort");
var blueSort = document.getElementById("blueSort");
var greenSort = document.getElementById("greenSort");
var copyList = document.getElementById("copyList");
var moveList = document.getElementById("moveList");
var ul = document.getElementById("ul");
var cutList = document.getElementById("cutList");
var input1 = document.getElementById("input1");
var input2 = document.getElementById("input2");
var input3 = document.getElementById("input3");
var input4 = document.getElementById("input4");
var colors = randomColor();
var arr = [];
function randomColor() {
    var x = Math.floor(Math.random() * 255) + 1;
    var y = Math.floor(Math.random() * 255) + 1;
    var z = Math.floor(Math.random() * 255) + 1;
    var obj = {
        "red": x,
        "green": y,
        "blue": z,
        "rgb": "rgb(" + x + ", " + y + ", " + z + ")"
    };
    return obj;
};
var i = 0;
generateButton.addEventListener("click", function () {
    arr.push(randomColor())
    displayColor.style.background = arr[i].rgb;
    i++;
});
var numer;
addButton1.addEventListener("click", function () {
    var li = document.createElement("li");
    for (var i = 0; i < arr.length; i++) {
        numer = "Red:" + arr[i].red + " Green:" + arr[i].green + " Blue:" + arr[i].blue;
        li.style.background = arr[i].rgb;
    }
    
    li.innerHTML = numer;
    ul.prepend(li);
});
removeButton1.addEventListener("click", function () {
    arr.shift();
    ul.removeChild(ul.firstElementChild);
});
addButton2.addEventListener("click", function () {
    var li = document.createElement("li");
    for (var i = 0; i < arr.length; i++) {
        numer = "Red:" + arr[i].red + " Green:" + arr[i].green + " Blue:" + arr[i].blue;
        li.style.background = arr[i].rgb;
    }
    li.innerHTML = numer;
    ul.appendChild(li);
});
removeButton2.addEventListener("click", function () {
    arr.shift();
    ul.removeChild(ul.lastElementChild);
});
redSort.addEventListener("click", redColorSort);
function redColorSort() {
    arr.sort(function (a, b) {
        return a.red - b.red;
    });
    ul.innerHTML = "";
    for (var array of arr) {
        var li = document.createElement("li");
        for (var i = 0; i < arr.length; i++) {
            numer = "Red:" + array.red + " Green:" + array.green + " Blue:" + array.blue;
            li.style.background = array.rgb;
        }
        li.innerHTML = numer;
        ul.appendChild(li);
    }
}
greenSort.addEventListener("click", greenColorSort);
function greenColorSort() {
    arr.sort(function (a, b) {
        return a.green - b.green;
    });
    ul.innerHTML = "";
    for (var array of arr) {
        var li = document.createElement("li");
        for (var i = 0; i < arr.length; i++) {
            numer = "Red:" + array.red + " Green:" + array.green + " Blue:" + array.blue;
            li.style.background = array.rgb;
        }
        li.innerHTML = numer;
        ul.appendChild(li);
    }
}
blueSort.addEventListener("click", blueColorSort);
function blueColorSort() {
    arr.sort(function (a, b) {
        return a.blue - b.blue;
    })
    ul.innerHTML = "";
    for (var array of arr) {
        var li = document.createElement("li");
        for (var i = 0; i < arr.length; i++) {
            numer = "Red:" + array.red + " Green:" + array.green + " Blue:" + array.blue;
            li.style.background = array.rgb;
        }
        li.innerHTML = numer;
        ul.appendChild(li);
    }
}
copyList.addEventListener("click", function () {
    var copy = arr.slice(input1.value, input2.value);
    for (var array of copy) {
        var li = document.createElement("li");
        numer = " Red:" + array.red + "Green:" + array.green + "Blue:" + array.blue;
        li.style.background = array.rgb;
        li.innerHTML = numer;
        cutList.appendChild(li);
    }
});
moveList.addEventListener("click", function () {
    var copy = arr.splice(input3.value, input4.value);
    ul.innerHTML = "";
    for (var array of arr) {
        var li = document.createElement("li");
        numer = " Red:" + array.red + " Green:" + array.green + " Blue:" + array.blue;
        li.style.background = array.rgb;
        li.innerHTML = numer;
        ul.appendChild(li);
    }
    for (var array1 of copy) {
        var li = document.createElement("li");
        numer = " Red:" + array1.red + " Green:" + array1.green + " Blue:" + array1.blue;
        li.style.background = array1.rgb;
        li.innerHTML = numer;
        cutList.appendChild(li);
    }
});