<!DOCTYPE html>
<html dir="{{Cookie::get('lang') == 'EN' ? 'ltr' : 'rtl'}}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Login</title>
        
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        @if(Cookie::get('lang') == 'EN')
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    @else
    <link href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap/rtl/bootstrap-login.css">
    @endif
    </head>
    <body>              
    <div class="warpper">
    <span class="bg-animate"></span>
    <span class="bg-animate2"></span>
   <div class="form-box login">
    <h2 class="animation" style="--i:0; --j:21; " >{{__('messages.login')}}</h2>
    <form action="{{url('Login')}}" method="post">
        @csrf
    <div class="input-box animation " style="--i:1; --j:22;" >
        <input type="text" required name="email">
        <label>{{__('messages.username')}}</label>
        <i class='bx bxs-user'></i>
    </div>
    <!--@error('username')
    <span class="text-danger">{{$message}}</span>
    @enderror-->
    <div class="input-box animation" style="--i:2; --j:23;">
        <input type="password" required name="password">
        <label>{{__('messages.password')}}</label>
        <i class='bx bxs-lock'></i>
    </div>
    <!--@error('password')
    <span class="text-danger">{{$message}}</span>
    @enderror-->
    <button type="submit" class="btn animation" style="--i:3; --j:24;">{{__('messages.login')}}</button>
    <div class="logreg-link animation" style="--i:4; --j:25;">
        <p>{{__('messages.dont_have_account')}} <a href="#" class="register-link">{{__('messages.signup')}}</a></p>
    </div>
    </form>
   </div>
   <div class="info-text login" >
    <h2 class="animation" style="--i:0; --j:20;">{{__('messages.Welcome_CCIT')}}</h2>
    <p class="animation" style="--i:1; --j:21;">{{__('messages.register_with')}}</p>
   </div>
   <div class="form-box register">
    <h2 class="animation" style="--i:17; --j:0;  margin-left: 16px;  ">{{__('messages.signup')}}</h2>
    <form action="{{route('signup.store')}}" method="post">
        @csrf
    
        <div class='input-container'>
    <div class="input-box animation" style="--i:18; --j:1;  width: 48%;">
        <input type="text" required name="name">
        <label >{{__('messages.first_name')}}</label>
        <!--<i class='bx bxs-user'></i>-->
    </div>
    <div class="input-box animation" style="--i:19; --j:2; width: 48%;" >
        <input type="text" required name="last_name">
        <label>{{__('messages.last_name')}}</label>
       <!-- <i class='bx bxs-user'></i>-->
       </div>
    </div>
    <div class="input-box animation" style="--i:20; --j:3;">
        <input type="text" required name="last name">
        <label id='full_name'>{{__('messages.full_name')}}</label>
        <!--<i class='bx bxs-user'></i>-->
        
    </div> 

    <div class="input-box animation" style="--i:20; --j:3; ">
        <input type="phone" required name="date birth">
        <label>{{__('messages.date_birth')}}</label>
        <i class='bx bx-calendar'></i>
    
</div>
    <div class="input-box animation" style="--i:20; --j:3; ">
        <input type="phone" required name="Phone number">
        <label>{{__('messages.phone_number')}}</label>
        <i class='bx bxs-phone'></i>
    
</div>
    <div class="input-box animation" style="--i:20; --j:3;">
        <input type="phone" required name="username">
        <label>{{__('messages.username')}}</label>
        <i class='bx bxs-user'></i>
    </div>

    <div class="input-box animation" style="--i:20; --j:3;">
        <input type="text" required name="Email">
        <label>{{__('messages.email')}}</label>
        <i class='bx bxs-envelope bx-flip-horizontal' ></i>
    </div>


    <div class="input-box animation" style="--i:20; --j:3;">
        <input type="password" required name="Password">
        <label>{{__('messages.password')}}</label>
        <i class='bx bxs-lock'></i>
        
    </div>
    <button type="submit" class="btn animation" style="--i:21; --j:4;">{{__('messages.signup')}}</button>
    <div class="logreg-link animation" style="--i:22; --j:5;">
        <p>{{__('messages.have_account')}}
        <a href="#" class="login-link">{{__('messages.login')}}</a></p>
    </div>
    </form>
   </div>

   <div class="info-text register">
    <h2 class="animation" style="--i:17; --j:0;">{{__('messages.Welcome_CCIT')}}</h2>
    <p class="animation" style="--i:18; --j:1;">{{__('messages.register_with')}}</p>
   </div>

    </div>
    <img src="./images/login_logo2.png" alt="user" class="image-container">
    <script src="js/login.js" ></script>
    </body>
</html>
