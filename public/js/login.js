//
const warpper = document.querySelector('.warpper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');
var res = null;
if($('.register-link').length > 0){
registerLink.onclick = () => {
    warpper.classList.add('active');
}
}
if($('.login-link').length > 0){
loginLink.onclick = () => {
    warpper.classList.remove('active');
}
}
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
  //  document.getElementById('submitBtn').disabled = true;
    
    $('#submitBtn').addClass('btnDisabled').attr('disabled');
    $('#submitBtn *').hide();
    $('#submitBtn .creating_account').show();
    $('.validation').hide();
    // document.getElementById('frmSignup').style.display = 'none';
    // document.getElementById('Sin').style.display = 'none';
    // document.getElementById('cart').style.display = 'block';
    // document.querySelector('cart').classList.add('active');
    
    var saveData = $.ajax({
        type: "POST",
        url: $(form).prop('action'),
        data: form.serialize(),
        dataType: "text",

        success: function(resultData){
            // jQuery('#submitBtn').removeClass('btnDisabled');
            // document.getElementById('submitBtn').disabled = true;
            res = JSON.parse(resultData);
           if(res.status == 'warnings'){
               validMsgs(res.messages);
           }
           else if(res.status == 'success'){
                console.log('success');
                loginaftersignup();
                return;
                // document.getElementById('frmSignup').style.display = 'none';
                // document.getElementById('Sin').style.display = 'none';
                // document.getElementById('cart').style.display = 'block';
           }
           else
           console.log('internal erro');

           $('#submitBtn *').hide();
            $('#submitBtn > div').show();
           $('#submitBtn').removeClass('btnDisabled').removeAttr('disabled');
        },
      error: function(errors){
            jQuery('#submitBtn').removeClass('btnDisabled').removeAttr('disabled');
            console.log('internal erro');
      }
  });
  return 0;
})

function validMsgs(warns){
    $.each(warns,function(key,value){
        if(typeof(value) == 'object')
             $.each(value,function(k,v){
                 switch(k){
                     case 'password':
                         $('#errorpass').text(v).show();
                         break;
                     case 'email':
                        $('#erroremail').text(v).show();
                             break;
                     case 'username':
                        $('#errorusername').text(v).show();
                             break;
                     case 'mobilenum':
                        $('#errormob').text(v).show();
                             break;
                 }
             })
 })
}

jQuery('#frmLogin').submit(function (e) {
    e.preventDefault();
    form = $(this);
    showloader();
    var saveData = $.ajax({
        type: "POST",
        url: $(form).prop('action'),
        data: form.serialize(),
        dataType: "text",
        success: function(resultData){
            res = JSON.parse(resultData);
           if(res.status){
            window.location.href =res.loginurl;
           }
           else{
            console.log(res.errMsg);
            hideloader();
           }
        },
      error: function(errors){
          res = errors;
          hideloader();
      }
  });
})

jQuery('#frmCart').submit(function (e) {
    e.preventDefault();
    form = $(this);
    showenorlloader();
    var saveData = $.ajax({
        type: "POST",
        url: $(form).prop('action'),
        data: form.serialize(),
        dataType: "text",
        success: function(resultData){
            res = JSON.parse(resultData);
            
           if(res.status == 'success'){
            hideCart();
                if(res.act_courses != null){
                    window.location.href = res.act_courses[0][1];
                }
           }
           else{
            hideenorlloader();
            console.log(res);
           }
        },
      error: function(errors){
            hideenorlloader();
          console.log(errors);
      }
  });
})

function hideCart(){
    $('.courses-cart').fadeOut(500);
    showEnrolMsg();
}

async function showEnrolMsg(){
    await new Promise(r => setTimeout(r, 500));
    $('.enroll-requrested').fadeIn(500);
}

function loginaftersignup(){
    $('#submitBtn *').hide();
    $('#submitBtn .logingmsg').show();
    $('#frmLogin input[name="email"]').val($('#frmSignup input[name="username"]').val());
    $('#frmLogin input[name="password"]').val($('#frmSignup input[name="Password"]').val());
    $('#frmLogin').trigger('submit');
}
function showloader(){
    $('#frmLogin button[type="submit"]').addClass('btnDisabled').attr('disabled');
    $('#frmLogin button[type="submit"] *').hide();
    $('#frmLogin button[type="submit"] img').show();
}
function hideloader(){
    $('#frmLogin button[type="submit"]').removeClass('btnDisabled').removeAttr('disabled');
    $('#frmLogin button[type="submit"] *').hide();
    $('#frmLogin button[type="submit"] span').show();
}
function showenorlloader(){
    $('#frmCart button[type="submit"]').addClass('btnDisabled').attr('disabled');
    $('#frmCart button[type="submit"] *').hide();
    $('#frmCart button[type="submit"] img').show();
}
function hideenorlloader(){
    $('#frmCart button[type="submit"]').removeClass('btnDisabled').removeAttr('disabled');
    $('#frmCart button[type="submit"] *').hide();
    $('#frmCart button[type="submit"] span').show();
}