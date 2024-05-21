<!DOCTYPE html>
@if(Cookie::get('lang') == 'EN')
<html lang="en">
@else
<html lang="ar" dir="rtl">
@endif
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(Cookie::get('lang') == 'EN')
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    @else
    <link href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    @endif
    
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/animate.css">
    
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{env('APP_URL')}}/css/aos.css">

    <link rel="stylesheet" href="{{env('APP_URL')}}/css/ionicons.min.css">
    
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/icomoon.css">
    @if(Cookie::get('lang') === 'EN')
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/style.css">
    @else
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/bootstrap/rtl/bootstrap.css">
    <!-- <link rel="stylesheet" href="{{env('APP_URL')}}/css/style.css"> -->
    @endif
    @yield('head')
    @if(Cookie::get('lang') == 'EN') 
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/style.css"> 
    @else 
    <link href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{env('APP_URL')}}/css/bootstrap/rtl/bootstrab.css"> 
    @endif


  </head>
  <body>
  
	  <!-- <div class="bg-top navbar-light">
    	<div class="container-fluid">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="/index">Fox. <span>University</span></a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>Email</span>
						    	<span>youremail@email.com</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>Call</span>
						    	<span>Call Us: + 1235 2355 98</span>
						    </div>
					    </div>
					    <div class="col-md topper d-flex align-items-center justify-content-end">
					    	<p class="mb-0">
					    		<a href="#" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
					    			<span>Apply now</span>
					    		</a>
					    	</p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div> -->
    
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light fixed-trans-menu" id="ftco-navbar">
	    <div class="container-fluid d-flex align-items-center px-4">
      <img src="{{env('APP_URL')}}/images/logo-small.png" class="logo" />
      <?php 
              if(!isset($_SESSION))
                session_start();
      ?>
      @if(isset($_SESSION['mdl_sesskey']))
      
      <div class="lmsitem mob">
      <div class="nav-btn">
        <a href="{{env('LMS_URL')}}/my" class="nav-link pl-0">{{__('messages.LearningPlatform')}}</a>
      </div>
        <span class="icon-graduation-cap LMSico"></span>
        </div>

        @endif
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>
	      </button>
        
	      <div class="collapse navbar-collapse" id="ftco-nav">
        
	        <ul class="offset-md-1 navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="{{env('APP_URL')}}/" class="nav-link pl-0" >{{__('messages.Home')}}</a></li>
	        	<li class="nav-item"><a href="#about" class="nav-link">{{__('messages.About')}}</a></li>
	        	<li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle">{{__('messages.Courses')}}</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li class="nav-item dropdown"><a class="dropdown-item" href="#">{{__('messages.dropE')}}</a></li>
               <li><a class="dropdown-item" href="#">{{__('messages.dropD')}}</a></li>
               <li><a class="dropdown-item" href="#">{{__('messages.dropC')}}</a></li>
               <div class="dropdown-divider"></div>
               <li></li>
                </ul>
               <li class="nav-item">
               @if(isset($_SESSION['mdl_sesskey']))
      
                    <div class="lmsitem desk">
                    <div class="nav-btn">
                      <a href="{{env('LMS_URL')}}/my" class="nav-link pl-0">{{__('messages.LearningPlatform')}}</a>
                    </div>
                      <span class="icon-graduation-cap LMSico"></span>
                      </div>
            
              @endif
            </li>
            </ul>
           
              <?php 
              if(!isset($_SESSION))
                session_start();
              ?>
              @if(!isset($_SESSION['mdl_sesskey']))
                <a href="{{env('APP_URL')}}/login" class="btnnn" id="login">{{__('messages.login')}}</a>
              @else
                  <a href="{{env('LMS_URL')}}/login/logout.php?sesskey={{$_SESSION['mdl_sesskey']}}" class="btnnn" id="logout">{{__('messages.logout')}}</a>
              @endif
           

        
	        <!--	<li class="nav-item"><a href="teacher.html" class="nav-link">{{__('messages.Staff')}}</a></li>
	        	<li class="nav-item"><a href="blog.html" class="nav-link">{{__('messages.Blog')}}</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">{{__('messages.Contact')}}</a></li>-->  </ul>
       
       <!-- <form action="#" class="searchform order-lg-last">
      
        <div class="form-group d-flex">
          <input type="text" class="form-control pl-3" placeholder="{{__('messages.Search')}}">
          <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
        </div>
      </form>  -->
      
      
      <div class="dropdown" style="margin: 9px;margin-bottom:0px; ">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 31px;">
        {{Cookie::get('lang') == 'EN' ? 'EN' : 'AR'}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{env('APP_URL')}}/switchlang/AR">AR</a>
          <a class="dropdown-item" href="{{env('APP_URL')}}/switchlang/EN">EN</a>
        </div>
      </div>
      <ul style="list-style-type: none ; margin-top:20px;padding: unset;text-align: center;">
      <li>
        
      <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3 ">
      <!--<a href="#"><span class=" nav-link pl-0" ></span><span class="text , nav-link pl-0" >+963 955 229 971</span></a> -->
      
                <li class="ftco-animate "><a href="https://www.facebook.com/CCITclassmates?mibextid=ZbWKwL"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/ccitclassmates?igsh=YW5zMXd6czQ5Nnc4"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="https://t.me/ccitclassmates"><span class="icon-telegram"></span></a></li>
                <li class="ftco-animate"><a href="https://www.youtube.com/@ccitclassmates6116"><span class="icon-youtube"></span></a></li>
              </ul>
  
      </li>
	    </ul> 
          </div>
	      </div>
        
	    </div>
	  </nav>
        @yield('content')
      <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">{{__('messages.questions')}}</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">{{__('messages.location')}}</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+963 955 229 971</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">centerccit2@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          
          

          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="{{env('APP_URL')}}/"><span class="ion-ios-arrow-round-forward mr-2"></span>{{__('messages.Home')}}</a></li>
                <li><a href="#about"><span class="ion-ios-arrow-round-forward mr-2"></span>{{__('messages.About')}}</a></li>
                <li><a href="#courses"><span class="ion-ios-arrow-round-forward mr-2"></span>{{__('messages.Courses')}}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 " >
            <div class="ftco-footer-widget mb-5">
             <!--	<h2 class="ftco-heading-2">{{__('messages.')}}</h2>
             <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="{{__('messages.Home')}}">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>-->
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">{{__('messages.conect_us')}}</h2>

            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-telegram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-youtube"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
       <!-- <div class="row">
          <div class="col-md-12 text-center">

            <p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. </p>
          </div>
        </div>
      </div> -->
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{env('APP_URL')}}/js/jquery.min.js"></script>
  <script src="{{env('APP_URL')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{env('APP_URL')}}/js/popper.min.js"></script>
  <script src="{{env('APP_URL')}}/js/bootstrap.min.js"></script>
  <script src="{{env('APP_URL')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{env('APP_URL')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{env('APP_URL')}}/js/jquery.stellar.min.js"></script>
  <script src="{{env('APP_URL')}}/js/owl.carousel.min.js"></script>
  <script src="{{env('APP_URL')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{env('APP_URL')}}/js/aos.js"></script>
  <script src="{{env('APP_URL')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{env('APP_URL')}}/js/scrollax.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <script src="{{env('APP_URL')}}/js/google-map.js"></script>
  @if(Cookie::get('lang') === 'EN')
  <script src="{{env('APP_URL')}}/js/main.js"></script>
  @else
  <script src="{{env('APP_URL')}}/js/main-rtl.js"></script>
  @endif
    @yield('scripts')
  </body>
</html>