const warpper = document.querySelector('.warpper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');

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

function checkForEnglish(inputText){
    var englishPatterm=/[a-zA-Z]/;
    if(englishPatterm.test(inputText)){
        alert("يرجى كتابة الإسم باللغة العربية")
        document.getElementById('arabicinput').value="";
    }
}