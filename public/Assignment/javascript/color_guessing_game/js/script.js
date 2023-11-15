var numSquares =6;
var colors = generateRandomColor(numSquares);
var squares = $(".square");
var colorDisplay = $("#colorDisplay");
var messageDisplay = $("#message");
var heading = $("h1");
var resetButton = $("#reset");
var easyButton =$("#easyBtn");
var hardButton=$("#hardBtn");
var pickedColor = pickcolor();
colorDisplay[0].textContent = pickedColor;

$(easyButton).on("click",function(){
    $(easyButton).addClass("selected");
    $(hardButton).removeClass("selected");
    numSquares =3;
    colors = generateRandomColor(numSquares);
    pickedColor = pickcolor();
    messageDisplay[0].textContent = "";
    // colorDisplay[0].textContent = pickedColor;
    heading[0].style.background = "steelblue";
    for(var i=0;i<squares.length;i++){
        if(colors[i]){
            squares[i].style.background =colors[i];
        }
        else{
            squares[i].style.display ="none";
        }
    };
});


$(hardButton).on("click",function(){
    $(hardButton).addClass("selected");
    $(easyButton).removeClass("selected");
    numSquares=6;
    colors = generateRandomColor(numSquares);
    pickedColor = pickcolor();
    messageDisplay[0].textContent = "";
    // colorDisplay[0].textContent = pickedColor;
    heading[0].style.background = "steelblue";
    for(var i=0;i<squares.length;i++){
        squares[i].style.background =colors[i];
        squares[i].style.display ="block";
    };
});


$(resetButton).on("click", function () {
    colors = generateRandomColor(numSquares);
    pickedColor = pickcolor();
    colorDisplay[0].textContent =pickedColor;
    this.textContent="New Colors"
    for (var i = 0; i < squares.length; i++) {
        squares[i].style.background = colors[i];
    }
    heading[0].style.background = "steelblue";
    messageDisplay[0].textContent = "";
    resetButton[0].textContent = "New color";
});


for (var i = 0; i < squares.length; i++) {
    squares[i].style.background = colors[i];

    squares[i].addEventListener("click", function () {
        var clickedColor = this.style.background;
        if (clickedColor === pickedColor) {
            messageDisplay[0].textContent = "correct";
            changeColor(clickedColor);
            resetButton[0].textContent = "play again?"
            heading[0].style.background = clickedColor;
        }
        else {
            this.style.background = "#232323";
            messageDisplay[0].textContent = "Try Again";
        };
    });
};


function changeColor(color) {
    for (var i = 0; i < squares.length; i++) {
        squares[i].style.background = color;
    }
}


function pickcolor() {
    var random = Math.floor(Math.random() * colors.length);
    return colors[random];
}


function generateRandomColor(num) {
    var arr = [];
    for (var i = 0; i < num; i++) {
        arr.push(randomColor())
    }
    return arr;
}


function randomColor() {
    var x = Math.floor(Math.random() * 255) + 1;
    var y = Math.floor(Math.random() * 255) + 1;
    var z = Math.floor(Math.random() * 255) + 1;
    return ("rgb(" + x + ", " + y + ", " + z + ")");
}

