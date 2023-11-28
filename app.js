function showPassword(){
   var psd =  document.getElementById("pwd");

    if(psd.type === "password"){
       psd.type = "text"; 
    }else{
        psd.type = "password";
    }
}