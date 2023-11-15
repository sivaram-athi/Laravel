// var firstName = prompt("Enter Your First Name");
// var lastName = prompt ("Enter Your Last Name");
// var Age = prompt("Enter Your Age");
// console.log("Your Full name is " + firstName + " " + lastName);
// console.log("your are " + Age + " years old");


// var Age = prompt("Enter your age");
// var days = Age *365;
// console.log( Age+ " years is approxly" + " "+ days);



// var age =prompt("enter your age")
// if(age<0){
//     console.log("invalid input");
// }
// else if(age==21){
//     console.log("happy 21st Birthday");
// }
// else if(age ){
//     console.log("your age is odd!")
// }



// var count=0;
// while(count<1000){
//     console.log("helloooooooooo");
    
//     count++;
// }


// var name= prompt("Enter your Name");

// var age=prompt("Enter your age");

// if(age<=18){
//     alert("sorry " + name +" You are not eligible");
// }
// else{
//     alert( "hurray! " + name +" you are eligible");
// }

                        //while loop

// var num =-10;
// while(num<=19){
//     console.log(num);
//     num++;
// }


// var num =10;
// while(num<=40){
//     if(num%2==0){
//         console.log(num);
//     }
//     num++;
// }


// var num =300;
// while(num<=333){
//     if(num%2 !==0){
//         console.log(num);
//     }
//     num++;
// }


// var num =5;
// while(num<=50){
//     if(num % 5==0 && num % 3==0){
//         console.log(num);
//     }
//     num++;
// }


                                  //for loop

// for(i=-10;i<=19;i++){
//     console.log(i);
// }


// for(i=10;i<=40;i+=2){
//     if(i%2==0){
//         console.log(i); 
//     }   
// }


// for(i=300;i<=333;i++){
//     if(i%2 !==0){
//         console.log(i); 
//     }   
// }

// for(i=5;i<50;i++){
//     if(i%5==0 && i%3==0){
//     console.log(i)
//     }
// }

                                // isEven
// function isEven(num){
//     if(num %2 == 0){
//         return true;
//     }
//     else{
//         return false;
//     }
// }

                                //   factorial

// function factorial(n){
//     if(n==0){
//         return 1;
//     }
//     return n * factorial(n - 1);
// }

                                    //   kebabToSnake

// function kebabToSnake(name){
//     var newName = name.replace(/-/g ,"_");
//     return newName;
// }

//                                   Bmi calculator

// function bmiCalculator(weight,height){
//     var bmi = weight /(height*height);
//     console.log(bmi);
// }


// var para =document.getElementById("first");
// para.classList.add("big")

// var tag = document.getElementById("last");

// tag.innerHTML = "vanakkam da mapla "
// tag.classList.add("last")

// function printReverse(arr){
//     var fisrtNumber =arr[0];
//     for(var i=1;i<arr.length;i++){
//        if(arr[i]!==fisrtNumber){
//         return false;
//        } 
//     }
//     return true;
// }



$("h1").css("font-size","50px");
// $("#first").css("font-size","50px");

$("#first").text("vanakam da mapla ");

$("#last").html("<h2>varata maamey durrrr..... </h2>");

$("body").keypress(function(event){
    $("h1").text(event.key)
});

$("h1").on("mouseover",function(){
    $("h1").css("color","blue");
})
$("h1").on("mouseout",function(){
    $("h1").css("color","black");
})
$("h2").on("dblclick",function(){
    $(this).hide();
})

// $("#p1").mousedown(function(){
//     alert("Mouse down over p1!");
//   });

$("#p1").hover(function(){
    $(this).css("color","blue");
  },
  function(){
    $(this).css("color","black");
  });


// $("div").css("backgroundColor","purple");
// $(".highlight").css("width","200px");
// $("#third").css("border","2px solid orange");
