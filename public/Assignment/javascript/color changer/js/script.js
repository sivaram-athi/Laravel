// var button = document.querySelector("button");
// var ispurple = false;
// button.addEventListener("click", background);

// function background(){
    
//     // if(ispurple){
//     //     document.body.style.background ="white";
//     //     ispurple =false;
//     // }
//     // else{
//     //     document.body.style.background ="purple";
//     //     ispurple =true;
//     // }
//     document.body.classList.toggle("purple");
// }


var p1button =document.getElementById("p1");
var p2button = document.getElementById("p2");
var p1display = document.getElementById("p1display");
var p2display =document.getElementById("p2display");
var resetButton = document.getElementById("reset");
var numInput =document.querySelector("input");
var newWinningScore =document.querySelector("p span");
var p1Score = 0;
var p2Score =0;
var gameOver =false;
var winningPoint = 5;

p1button.addEventListener("click",function(){
    if(!gameOver){
        p1Score++;
        if(p1Score === winningPoint){
            p1display.classList.add("winner");
            gameOver=true;
        }
        p1display.textContent = p1Score;
    }
});


p2button.addEventListener("click",function(){
    if(!gameOver){
        p2Score++;
        if(p2Score===winningPoint){
            p2display.classList.add("winner");
            gameOver=true;
        }
    }  
    p2display.textContent=p2Score;
});

resetButton.addEventListener("click",function(){
    reset()
});

function reset(){
    p1Score=0;
    p2Score=0;
    p1display.textContent =p1Score;
    p2display.textContent =p2Score;
    p1display.classList.remove("winner");
    p2display.classList.remove("winner");
    gameOver=false;
}

numInput.addEventListener("change",function(){
    newWinningScore.textContent=numInput.value;
    winningPoint=Number(numInput.value);
    reset();
});