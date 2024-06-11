@extends('layouts.main')
@section('title')
Home
@endsection
@section("content")
  <div class="slider-fixed-content-container">
  <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">{{trans('messages.silder_title')}}</h1>
            <p>{{trans('messages.slider_paragraph')}}</p>
            <p><a onclick="scrollToSection()" class="btn btn-primary px-4 py-3 mt-3">{{trans('messages.browse_courses')}}</a></p>
          </div>
        </div>
  </div>
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/FB_IMG_1697467201471.jpg);">
      	<div class="overlay"></div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
      </div>
	  <div class="slider-item" style="background-image:url(images/IMG-20230105-WA0161.jpg);background-position:bottom center">
      	<div class="overlay"></div>
      </div>
    </section>
	</div>
    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-teacher"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{trans('messages.Certified_Teachers')}}</h3>
                <p>{{trans('messages.Certified_Teachers_Para')}}</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-reading"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{trans('messages.Special_Education')}}</h3>
                <p>{{trans('messages.Special_Education_Para')}}</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{trans('messages.International_curricula')}}</h3>
                <p>{{trans('messages.desc_curricula')}}</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-diploma"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{trans('messages.Certified_Certificates')}}</h3>
                <p>{{trans('messages.Certified_Certificates_Para')}}</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
						<div class="img" style="background-image: url(images/about.jpg);"></div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">{{trans('messages.what_we_offer')}}</h2>
						<p>{{trans('messages.what_we_offer_para')}}</p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security "></span></div>
									<div class="text pl-3">
										<h3>{{trans('messages.safety')}}</h3>
										<p>{{trans('messages.safety_para')}}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-teacher"></span></div>
									<div class="text pl-3">
										<h3>{{trans('messages.staff')}}</h3>
										<p>{{trans('messages.staff_para')}}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text pl-3">
										<h3>{{trans('messages.certified')}}</h3>
										<p>{{trans('messages.certified_para')}}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text pl-3">
										<h3>{{trans('messages.classes')}}</h3>
										<p>{{trans('messages.classes_para')}}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="icon-speaker_phone"></span></div>
									<div class="text pl-3">
										<h3>{{trans('messages.pool')}}</h3>
										<p>{{trans('messages.pool_para')}}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
									<div class="text pl-3" >
										<h3>{{trans('messages.kids')}}</h3>
										<p>{{trans('messages.kids_para')}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<a href="" id="about"></a>

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5" >
    	<div  class="container">
    		<div class="row justify-content-center mb-5 pb-2 d-flex" >
    			<div class="col-md-6 align-items-stretch d-flex">
    				<div class="img img-video d-flex align-items-center">
    					<div  class="video justify-content-center">
								<!--<video controls class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
								<source src="./images/ccitvideo.mp4" type="video/mp4">
									<span class="ion-ios-play"></span>
									</video>-->
									<video poster="./images/image_16.jpg" id="section2" width="540" height="340"controls id="video">
										<source  src="./images/ccitvideo.mp4" type="video/mp4">
										<span class="ion-ios-play"></span>
									</video>
							</div>
    				</div>
    			</div>
          <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5" >
           <h2 class="mb-4" style="margin-top:30px; font-size:29px;">{{__('messages.ccit')}}</h2>
            <p style="font-size:20px;">{{__('messages.ccit_para2')}}</p>
          </div>
        </div>	
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-12">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="401">0</strong>
		                <span>Students</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Courses</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="50">0</strong>
		                <span>Awards Won</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>


		<section class="ftco-section" id="courses">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4" id="section1">{{trans('messages.Cats')}}</h2>
            <p>{{trans('messages.Cats_parg')}}</p>
          </div>
        </div>	
				<div class="row" >
				<div class="col-md-3 course ftco-animate">

						<div class="cat-widget">
						<a href="{{env('APP_URL')}}/Languages"><div class="cat-box">
						<div class="cat-container">
						<span class="ico icon-language"></span>
						<div class="intern-circle"></div>
						</div>
						</div>
						<div class="text pt-4">
							<h3>{{trans('messages.langs')}}</h3>
							<p>{{trans('messages.GoveCirc_parg')}}</p>
						</div>
						</a>
						</div>
					</div>
				
		
				
					
					<div class="col-md-3 course ftco-animate">

						<div class="cat-widget">
						<a href="{{env('APP_URL')}}/IT"><div class="cat-box">
						<div class="cat-container">
						<span class="ico icon-qrcode"></span>
						<div class="intern-circle"></div>
						</div>
						</div>
						<div class="text pt-4">
							<h3>{{trans('messages.IT')}}</h3>
							<p>{{trans('messages.IT_parg')}}</p>
						</div>
						</a>
						</div>
					</div>
					
					<div class="col-md-3 course ftco-animate">
					
						<div class="cat-widget">
						<a href="{{env('APP_URL')}}/Accounting"><div class="cat-box">
						<div class="cat-container">
						<span class="ico icon-calculator"></span>
						<div class="intern-circle"></div>
						</div>
						</div>
						<div class="text pt-4">
							<h3>{{trans('messages.Accounting')}}</h3>
							<p>{{trans('messages.Acc_parg')}}</p>
						</div>
						</a>
						</div>
					</div>

					<div class="col-md-3 course ftco-animate">
						<!-- <div class="img" style="background-image: url(images/course-1.jpg);"></div> -->
						<div class="cat-widget">
						<a href="{{env('APP_URL')}}/Curriculums"><div class="cat-box">
						<div class="cat-container">
						<span class="ico icon-library_books"></span>
						<div class="intern-circle"></div>
						</div>
						</div>
						<div class="text pt-4">
							<h3>{{trans('messages.GoveCirc')}}</h3>
							<p>{{trans('messages.GoveCirc_parg')}}</p>
						</div>
						</a>
						</div>
					</div>
					

					</div>

					
				</div>
				
			</div>
		</section>



		<section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">{{__('messages.testimonials')}}</h2>
            {{-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> --}}
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/FB_IMG_1698151608813.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>{{trans('messages.Comment_1')}}</p>
                    {{-- <p class="name">Racky Henderson</p> --}}
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/FB_IMG_1698151908758.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>{{trans('messages.Comment_2')}}</p>
                    {{-- <p class="name">Henry Dee</p> --}}
                
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/FB_IMG_1698151588802.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>{{trans('messages.Comment_3')}}</p>
                    {{-- <p class="name">Mark Huff</p> --}}
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/FB_IMG_1698151670252.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>{{trans('messages.Comment_4')}}</p>
                    {{-- <p class="name">Rodel Golez</p> --}}
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>{{trans('messages.Comment_5')}}</p>
                    {{-- <p class="name">Ken Bosh</p> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="images/image_11.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_11.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_22.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_22.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_33.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_33.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_44.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_44.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>
@endsection
@section("scripts")
<script>
	var app_url = '{{env("APP_URL")}}';
	var scrollWindow = function() {
		$(window).scroll(function(){
			
			
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');
					var navbar = $('#ftco-navbar');

					if (st > 10) {
						navbar.removeClass('fixed-trans-menu');
						navbar.addClass('fixed-white-menu');	
					} 
					if (st <= 10) {
						navbar.removeClass('fixed-white-menu');
						navbar.addClass('fixed-trans-menu');	
					} 	
		});
	};
	scrollWindow();
	$('.course .cat-widget').hover(function(){
		$(this).children().addClass('fill')
	},function(){
		$(this).children().removeClass('fill')});
		$(function(){
			$(".about").click(function(e) {
				e.preventDefault();
				$([document.documentElement, document.body]).animate({
					scrollTop: $("#about").offset().top
				}, 700);
});
		})
</script>

@endsection