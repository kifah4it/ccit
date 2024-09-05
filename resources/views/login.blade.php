
<!DOCTYPE html>

<html dir="{{ Cookie::get('lang') == 'EN' ? 'ltr' : 'rtl' }}">

<head>
    {{-- {!! NoCaptcha::renderJs() !!} --}}
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Le6ZTYqAAAAAAccdNRU7j020mi5HZcFYG-1Y5Vl"></script>
    <style>
        .total>p {
            display: none;
        }

        .loader {
            width: 100%;
            height: 100%;
            z-index: 99999;
            position: absolute;
            background: #ffffff;
            text-align: center;
            padding-top: 30%;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Login</title>
    <link rel="icon" href="./images/login_logo2.png">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/icomoon.css">
    @if (Cookie::get('lang') == 'EN')
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/login.css?v={{ env('version') }}">
    @else
        <link
            href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic:200,300,400,500,600,700,800,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap/rtl/bootstrap-login.css?v={{ env('version') }}">
    @endif

</head>

<body>
    <div class="warpper {{ isset($courses) ? 'active' : '' }}">
        <div class="loader">
            <div class="loader-content">
                <img src="./images/login-loader.gif" height="40px">
                <p dir="ltr" class="id-status">Checking user identity ...</p>
                
                <form id="frm_recaptcha" action="{{ url('recaptcha') }}" method="post">
                    
                    {{-- {!! NoCaptcha::display() !!} --}}
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                    
                </form>

            </div>
        </div>
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        @if (!isset($courses))
            <div class="form-box login">
                <h2 class="animation" style="--i:0; --j:21; ">{{ __('messages.login') }}</h2>
                <form id="frmLogin" action="{{ url('Login') }}" method="post">
                    @csrf

                    <div class="input-box animation " style="--i:1; --j:22;">
                        <input type="text" required name="email">
                        <label>{{ __('messages.username') }}</label>
                        <i class='bx bxs-user'></i>
                    </div>
                    <!--@error('username')
    <span class="text-danger">{{ $message }}</span>
@enderror-->
                    <div class="input-box animation" style="--i:2; --j:23;">
                        <input type="password" required name="password">
                        <label>{{ __('messages.password') }}</label>
                        <i class='bx bxs-lock'></i>
                    </div>
                    <!--@error('password')
    <span class="text-danger">{{ $message }}</span>
@enderror-->
                    <button type="submit" class="btn animation"
                        style="--i:3; --j:24;"><span>{{ __('messages.loginto') }}</span><img
                            src="./images/login-loader.gif" height="40px" style="display:none"></button>
                    <div class="logreg-link animation" style="--i:4; --j:25;">
                        <p>{{ __('messages.dont_have_account') }} <a href="#"
                                class="register-link">{{ __('messages.signup') }}</a></p>
                    </div>
                </form>
            </div>
        @endif
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">{{ __('messages.Welcome_CCIT') }}</h2>
            <p class="animation" style="--i:1; --j:21;" id="edit1">{{ __('messages.register_with') }}</p>
        </div>
        <div class="form-box register {{ isset($courses) ? 'enrol' : '' }}">
            @if (isset($courses))
                <div id="cart" class="courses-cart">
                    <form id="frmCart" method="post" action="{{ url('enroll') }}">
                        @csrf
                        <h2>{{ __('messages.Courses') }}</h2>
                        <ul>
                            @foreach ($courses as $cr)
                                <li {{ $cr['format'] == 'singleactivity' ? 'style=display:none' : '' }}>
                                    <img src="{{ env('LMS_URL') . '/' . $cr['courseimage'] }}">
                                    <div class="details">
                                        <p>&nbsp;&nbsp; {{ $cr['fullname'] }} </p>
                                        <p>&nbsp;&nbsp;
                                            {{ isset($_SESSION['country']) ? ($_SESSION['country'] != 'SY' && $cr['interprice'] != '' ? $cr['interprice'] . '$' : $cr['price'] . ' ل.س') : $cr['price'] . ' ل.س' }}
                                        </p>
                                        <input type="hidden" name="courses[]"
                                            value="{{ $cr['id'] }}:{{ $cr['cohortid'] }}"
                                            cost="{{ isset($_SESSION['country']) ? ($_SESSION['country'] != 'SY' && $cr['interprice'] != '' ? $cr['interprice'] : $cr['price']) : $cr['price'] }}" />
                                    </div>
                                </li>
                                <p>ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</p>
                            @endforeach
                        </ul>

                        <div>
                            <div class="total"><span>{{ __('messages.cost') }} </span><span
                                    class="cost"></span><span
                                    class="curr">{{ isset($_SESSION['country']) ? ($_SESSION['country'] != 'SY' && $cr['interprice'] != '' ? '$' : ' ل.س') : ' ل.س' }}</span>
                            </div>
                            <div class="payment">
                                {{-- <h4>{{__('messages.pay_methods')}}</h4>
    <input type="radio" value="option1" name="option" id="option1">
    <label for="option1">{{__('messages.requesto_to_pay')}}</label><br>
    <input type="radio" value="option2" name="option" id="option2">
    <label for="option2">{{__('messages.online_pay')}}</label> --}}
                                <div style="text-align:center">
                                    <button type="submit"><span>{{ __('messages.enroll') }}</span><img
                                            src="./images/login-loader.gif" height="31px"
                                            style="display:none"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="enroll-requrested" style="display:none">
                    <div style="text-align:center">
                        <span class="icon-check"></span>
                    </div>
                    <h2>{{ __('messages.enrolledSuccessfully') }}</h2>
                    <p style="text-align:center"> {{ __('messages.enrollment_msg1') }}</p>
                </div>
            @endif
            @if (!isset($courses))
                <h2 class="animation" id="Sin" style="--i:17; --j:0;  margin-left: 16px;
    ">
                    {{ __('messages.signup') }}</h2>
                <form id="frmSignup" action="{{ route('signup.store') }}" method="post">
                    @csrf

                    <div class='input-container'>
                        <div class="input-box animation" style="--i:18; --j:1;  width: 48%;">
                            <input type="text" required name="first_name">
                            <label>{{ __('messages.first_name') }}</label>
                            <!--<i class='bx bxs-user'></i>-->
                        </div>
                        <div class="input-box animation" style="--i:19; --j:2; width: 48%;">
                            <input type="text" required name="last_name">
                            <label>{{ __('messages.last_name') }}</label>
                            <!-- <i class='bx bxs-user'></i>-->
                        </div>
                    </div>
                    <div class="input-box animation" style="--i:20; --j:3;">
                        <input type="text" required name="englishname" id="englishname" style="direction:rtl;">
                        <label id='full_name' for="arabicinput">{{ __('messages.full_name') }}</label>
                        <!--<i class='bx bxs-user'></i>-->

                    </div>
                    <div class='input-container'
                        style="{{ Cookie::get('lang') == 'EN' ? 'direction:rtl' : 'direction:ltr' }}">
                        <div class="input-box animation" style="--i:20; --j:3; width: 31%; ">
                            <input list="year1" type="text" required name="year" id="year1-input">
                            <label>{{ __('messages.year') }}</label>
                            <datalist id="year1">
                                <option value="1970"></option>
                                <option value="1971"></option>
                                <option value="1972"></option>
                                <option value="1973"></option>
                                <option value="1974"></option>
                                <option value="1975"></option>
                                <option value="1976"></option>
                                <option value="1977"></option>
                                <option value="1978"></option>
                                <option value="1979"></option>
                                <option value="1980"></option>
                                <option value="1981"></option>
                                <option value="1982"></option>
                                <option value="1983"></option>
                                <option value="1984"></option>
                                <option value="1985"></option>
                                <option value="1986"></option>
                                <option value="1987"></option>
                                <option value="1988"></option>
                                <option value="1989"></option>
                                <option value="1990"></option>
                                <option value="1991"></option>
                                <option value="1992"></option>
                                <option value="1993"></option>
                                <option value="1994"></option>
                                <option value="1995"></option>
                                <option value="1996"></option>
                                <option value="1997"></option>
                                <option value="1998"></option>
                                <option value="1999"></option>
                                <option value="2000"></option>
                                <option value="2001"></option>
                                <option value="2002"></option>
                                <option value="2003"></option>
                                <option value="2004"></option>
                                <option value="2005"></option>
                                <option value="2006"></option>
                                <option value="2007"></option>
                                <option value="2008"></option>
                                <option value="2009"></option>
                                <option value="2010"></option>
                                <option value="2011"></option>
                                <option value="2012"></option>
                                <option value="2013"></option>
                                <option value="2014"></option>
                                <option value="2015"></option>
                                <option value="2016"></option>
                                <option value="2017"></option>
                                <option value="2018"></option>
                            </datalist>
                            <!--<i class='bx bx-calendar'></i>-->
                        </div>

                        <div class="input-box animation" style="--i:20; --j:3; width: 31%;  ">
                            <input type="text" required name="month" list="month1" id="month1-input">
                            <label style=" margin-right: 25;">{{ __('messages.month') }}</label>
                            <datalist id="month1">
                                <option value="1">jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>

                                </datakist>
                                <!-- <i class='bx bx-calendar'></i>-->
                        </div>

                        <div class="input-box animation" style="--i:20; --j:3; width: 31%; ">
                            <input type="phone" required name="day" list="day1">
                            <label>{{ __('messages.day') }}</label>
                            <datalist id="day1">
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                                <option value="5"></option>
                                <option value="6"></option>
                                <option value="7"></option>
                                <option value="8"></option>
                                <option value="9"></option>
                                <option value="10"></option>
                                <option value="11"></option>
                                <option value="12"></option>
                                <option value="13"></option>
                                <option value="14"></option>
                                <option value="15"></option>
                                <option value="16"></option>
                                <option value="17"></option>
                                <option value="18"></option>
                                <option value="19"></option>
                                <option value="20"></option>
                                <option value="21"></option>
                                <option value="22"></option>
                                <option value="22"></option>
                                <option value="23"></option>
                                <option value="24"></option>
                                <option value="25"></option>
                                <option value="26"></option>
                                <option value="27"></option>
                                <option value="28"></option>
                                <option value="29"></option>
                                <option value="30"></option>
                                <option value="31"></option>

                                </datakist>
                                <!-- <i class='bx bx-calendar'></i>-->
                        </div>
                    </div>
                    <div class="input-box animation" style="--i:20; --j:3; ">
                        <input type="phone" required name="mob_num">
                        <label>{{ __('messages.phone_number') }}</label>
                        <span id="errormob" class="validation">wrong phone_number</span>
                        <i class='bx bxs-phone'></i>

                    </div>
                    <div class="input-box animation" style="--i:20; --j:3;">
                        <input type="phone" required name="username">
                        <label>{{ __('messages.username') }}</label>
                        <span id="errorusername" class="validation">wrong username</span>
                        <i class='bx bxs-user'></i>
                    </div>

                    <div class="input-box animation" style="--i:20; --j:3;">
                        <input type="text" required name="Email">
                        <label>{{ __('messages.email') }}</label>
                        <span id="erroremail" class="validation">wrong Email</span>
                        <i class='bx bxs-envelope bx-flip-horizontal'></i>
                    </div>


                    <div class="input-box animation" style="--i:20; --j:3;">
                        <input type="password" required name="Password" id="pass">
                        <label>{{ __('messages.password') }}</label>
                        <i class='bx bxs-lock'></i>
                        <span class="validation" id="errorpass">wrong password</span>
                    </div>
                    <div id="bt">
                        <button type="submit" class="btn animation" style="--i:21; --j:4; " id="submitBtn">
                            <div>{{ __('messages.signup') }}</div>
                            <span class="logingmsg" style="display:none">{{ __('messages.logging') }}</span>
                            <span class="creating_account"
                                style="display:none">{{ __('messages.creating_account') }}</span>
                        </button>
                        <div class="logreg-link animation" style="--i:22; --j:5;">
                            <p id="edit">{{ __('messages.have_account') }}
                                <a href="#" class="login-link" id="edit">{{ __('messages.loginto') }}</a>
                            </p>
                        </div>
                    </div>
                </form>
            @endif
        </div>

        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">{{ __('messages.Welcome_CCIT') }}</h2>
            <p class="animation" style="--i:18; --j:1;" id="edit1">{{ __('messages.register_with') }}</p>
        </div>

    </div>
    <a href="{{ env('APP_URL') }}" class="logo-container"><img src="./images/login_logo2.png" alt="user"
            class="image-container"></a>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/login.js?v={{ env('version') }}"></script>
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    <script>
        function totalcost() {
            var sum = 0;
            $('#cart li input[type=hidden]').each(function(s, e) {
                num = Number($(this).attr('cost'));
                console.log(typeof(num));
                sum += isNaN(num) ? 0 : num;

            })
            $('.total > .cost').text(sum);
        }
        $(function() {
            totalcost();
        });

        $(function(){
            $.ajax({
                type: "GET",
                url: "{{ env('LMS_URL') }}/local/ops/pages/isloggedin.php",
                dataType: "text",
                xhrFields: {
                    withCredentials: true
                },
                success: function(resultData) {
                    res = JSON.parse(resultData);
                    if (res != 0) {
                        if($('.form-box.register.enrol').length < 1){
                        $('.id-status').text('Redirecting to LMS ...');
                        window.location.href = 'https://lms.change-cit.com/my/';
                        }

                    } else {
                        $('.loader').fadeOut(500);
                    }
                },
                error: function(errors) {
                    $('.loader').fadeOut(500);
                        console.log(errors);
                }
            });
        
        })
    </script>
                   
</body>
{{-- <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Le6ZTYqAAAAAAccdNRU7j020mi5HZcFYG-1Y5Vl', {action: 'auth'}).then(function(token) {
           document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script> --}}
<script>
    $(function(){
      grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6Le6ZTYqAAAAAAccdNRU7j020mi5HZcFYG-1Y5Vl', {action: 'LOGIN'});
        console.log(token);
      });
})
  </script>
</html>
