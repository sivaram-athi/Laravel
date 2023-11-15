$("ul").on("click",".deleteButton1", function (event) {
    $(this).parent().fadeOut(500,function(){
        $(this).remove();
    });
    event.stopPropagation();
});

$("input[type='text']").on("keypress",function(event){
    if(event.which==13){
        var todotext =$(this).val();
        $("ul").append("<li> " + todotext + " <button class='deleteButton1'>Delete</button></li>")
    }
})

$(".addButton").on("click",function(){
    var todotext = $(".textInput").val();
    $("ul").append("<li> " + todotext + " <button class='deleteButton1'>Delete</button></li>")
});

$(".fa-plus").on("click",function(){
    $("input").fadeToggle();
    $(".addButton").fadeToggle();
})