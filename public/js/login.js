const warpper = document.querySelector('.warpper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');
var res = null;
registerLink.onclick = () => {
    warpper.classList.add('active');
}

loginLink.onclick = () => {
    warpper.classList.remove('active');
}

/*const arabicinput=document.getElementById('arabicinput');
arabicinput.addEventListener('input',function(event){
    const inputText=event.target.value;
    const arabicRegex=/[\u0600-\u06FF\s]/;
    if(!arabicRegex.test(inputText)){
        alert("يرجى ادخال نص باللغة العربية")
    }
});*/

/*function validateArabicInput(){
    var arabicinput=document.getElementById("arabicinput")
    var errorMessage=document.getElementById("errorMessage")
    var inputValue=arabicinput.value;
    if(/^[a-zA-Z]*$/.test(inputValue)){
        errorMessage.style.display="block";
        arabicinput.setCustomValidaty("يرجى ادخال حروف عربية فقط");
    }
    else{
        errorMessage.style.display="none";
        arabicinput.setCustomValidaty("");
    }
}*/

function checkForEnglish(inputText) {
    var englishPatterm = /[a-zA-Z]/;
    if (englishPatterm.test(inputText)) {
        alert("يرجى كتابة الإسم باللغة العربية")
        document.getElementById('arabicinput').value = "";
    }
}

jQuery('#frmSignup').submit(function (e) {
    e.preventDefault();
    form = $(this);
    var saveData = $.ajax({
        type: "POST",
        url: "http://localhost:8080/ccit/public/signup",
        data: form.serialize(),
        dataType: "text",
        success: function(resultData){
            res = JSON.parse(resultData);
           if(res.status == 'warnings'){
               validMsgs(res.messages)
           }
        },
      error: function(errors){
          res = errors;
      }
  });
})

function validMsgs(warns){
    $.each(warns,function(key,value){
        if(typeof(value) == 'object')
             $.each(value,function(k,v){
                 switch(k){
                     case 'password':
                         console.log(v);
                         break;
                     case 'email':
                             console.log(v);
                             break;
                     case 'username':
                             console.log(v);
                             break;
                     case 'mobilenum':
                             console.log(v);
                             break;
                 }
             })
 })
}