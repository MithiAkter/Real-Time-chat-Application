const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");



form.onsubmit =(e)=>{
    e.preventDefault();

}


continueBtn.onclick = ()=>{
//starting Ajax
   let xhr = new XMLHttpRequest();//creating xml object
   xhr.open("POST" , "php/login.php" , true);
   xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            console.log(data);
           if (data == "success"){
                location.href="users.php";
                 }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                     
                   
                 }
            }
        }

    }

    //sending data from ajax to php
    let formData = new FormData(form);//creating new form data object

   xhr.send(formData);//sending the form data to php
}