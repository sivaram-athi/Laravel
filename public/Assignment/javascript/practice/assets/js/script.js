

var datas =[
    {name :"siva",id:1},
    {name:"ram" ,id:2},
    {name: "kiran",id:3 },
    {name:"balaji",id:4}
]; 
let arr =[];

$("#search").on("click",()=>{
    search();
    inputVal = ""
})

function search(){
    let inputVal= $("#input-box").val().toLowerCase();
    if(inputVal!==""){
        arr = datas.filter(x =>{
            return x.name == inputVal || x.id ==inputVal;
        })
    }
    let result;
    function print(user){
        result =  `id:${user.id} Name :${user.name}`
    }
    arr.forEach(print)
    li = document.createElement("li");
    li.innerHTML = result;
    $("ul").append(li);
}
