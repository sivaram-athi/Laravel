var firstDate
$(".button-1").on("click",function(){
    firstDate =$(".date-1").val()  
});

var secondDate
$(".button-2").on("click",function(){
    secondDate =$(".date-2").val()
});



$(".cal").on("click",dateDiff);


function dateDiff(){
    var dateOne = new Date(firstDate);
    var dateTwo = new Date(secondDate);
    var time = Math.abs(dateTwo-dateOne);
    var days =Math.ceil(time /(1000*60*60*24));
    $("#output").text(days);
}