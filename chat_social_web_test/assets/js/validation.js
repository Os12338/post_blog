function getE(ele){
    return document.querySelector(ele).value
}

// fetch all register parameters
document.querySelector('form').addEventListener('submit',function(event){
    event.preventDefault();
});

document.querySelector('[type="submit"]').addEventListener('click',function(){
    if(getE('[name="username"]') !== undefined && getE('[name="username"]') !== ""){
        console.log(getE('[name="username"]'))
    }else{
        console.log("no username")
    }

})