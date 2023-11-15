// var random = Math.random()*6;
// var randomImg =Math.floor(random)+1;
var randomImage1 = Math.floor(Math.random()*6)+1;
var randomDiceImage1 = "img/dice" + randomImage1 +".PNG";
var randomImage2 =Math.floor(Math.random()*6)+1;
var randomDiceImage2 = "img/dice" + randomImage2 +".PNG";
var winDisplay =document.querySelector("h1")


var image1=document.querySelector(".img1");
var image2 =document.querySelector(".img2")

image1.setAttribute("src" ,randomDiceImage1);
image2.setAttribute("src" ,randomDiceImage2);

if(randomDiceImage1>randomDiceImage2){
    winDisplay.textContent ="player 1 win";
}
else if(randomDiceImage2>randomDiceImage1){
    winDisplay.textContent ="player 2 win";
}
else{
    winDisplay.textContent ="match Draw";
}