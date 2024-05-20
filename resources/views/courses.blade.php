@extends('layouts.main')
@section('title')
Courses
@endsection
@section('content')
<style>
	.hero-wrap-2{
		background-image: url("{{env('APP_URL')}}/images/courses_top.jpg") !important;
	}
</style>
<section class="hero-wrap hero-wrap-2">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <!--<div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Courses</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
          </div> !--->
        </div>
      </div>
    </section>


     <section class="container-fluid Languages">
    
    <div class=" row English_top " style="direction:ltr;">
		
	<br>
	<img class="First_icon" src="{{env('APP_URL')}}/images/E_icon.PNG" > 
	<span><b>nglish Courses</b></span>
		 
    <img class="InterChange_image" src="{{env('APP_URL')}}/images/InterChange.PNG" >

</div>

<div class="container-fluid">

    <div class="row English" >
	 	@foreach ($courseslst as $course)
					@if(!isset($course->Name))
						@continue
					@else
<div class="col-md-4">
	<div class="Course">
<span style=color:#fecd29><b>{{$course->Name}}</b></span>
 <h5>{{$course->catName}}</h5>
<img class="Course_Im" src="{{$course->imgSrc}}" >
<p>{{$course->sDesc ?? ''}}</p>
</div>
</div>

<!-- <div class="col-md-4">
<div class="Course">
<span style=color:#e9d129><b>Intro A</b></span>
<h5>Foundation</h5>
<img class="Course_Im" src="images/Intro.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#e9d129><b>Intro B</b></span>
<h5>Beginner</h5>
<img class="Course_Im" src="images/Intro.JPG" >

</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#e96c00><b>Let's Talk 1</b></span>
<h5>Beginner</h5>
<img class="Course_Im" src="images/Talk1.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#d52316><b>1A</b></span > 
<h5>Beginner</h5>
<img class="Course_Im" src="images/L1.JPG">
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#d52316><b>1B</b></span>
<h5>Beginner</h5>
<img class="Course_Im" src="images/L1.JPG">
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#67b142><b>Let's Talk 2</b></span>
<h5>Pre-intermediate</h5>
<img class="Course_Im" src="images/Talk2.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#2c59c3><b>2A</b></span>
<h5>Pre-intermediate</h5>
<img class="Course_Im" src="images/L2.JPG">
</div>  
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#2c59c3><b>2B</b></span>
<h5>Intermediate</h5>
<img class="Course_Im" src="images/L2.JPG">
</div>
</div> 

<div class="col-md-4">
<div class="Course">
<span style=color:#96579d><b>Let's Talk 3</b></span>
<h5>Intermediate</h5>
<img class="Course_Im" src="images/Talk3.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#10964d><b>3A</b></span>
<h5>Intermediate</h5>
<img class="Course_Im" src="images/L3.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#10964d><b>3B</b></span>
<h5>Upper-intermediate</h5>
<img class="Course_Im" src="images/L3.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#e54327><b>4A</b></span>
<h5>Upper-intermediate</h5>
<img class="Course_Im" src="images/L4.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#e54327><b>4B</b></span>
<h5>Upper-intermediate</h5>
<img class="Course_Im" src="images/L4.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#2075b3><b>5A</b></span>
<h5>Advanced</h5>
<img class="Course_Im" src="images/L5.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course">
<span style=color:#2075b3><b>5B</b></span>
<h5>Advanced</h5>
<img class="Course_Im" src="images/L5.JPG" >
</div>
</div>!-->
@endif 
@endforeach
</div>
</div> 

<div class="row Doutch_top"> 
<br>
<img class="row First_icon" src="{{env('APP_URL')}}/images/D_icon.png" > 
	<span><b>outch Courses</b></span>
		 <br><br>    
</div>



 <div class="row Doutch">
   
<div class="col-md-4">
<div class="Course"> 
<span style=color:#ab1c0e><b>A1-1</b></span>
<h5></h5>
<img class="Course_Im" src="{{env('APP_URL')}}/images/A1.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course"> 
<span style=color:#ab1c0e><b>A1-2</b></span>
<h5></h5>
<img class="Course_Im" src="{{env('APP_URL')}}/images/A1.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course"> 
<span style=color:#005896><b>A2-1</b></span>
<h5></h5>
<img class="Course_Im" src="{{env('APP_URL')}}/images/A2.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course"> 
<span style=color:#005896><b>A2-2</b></span>
<h5></h5>
<img class="Course_Im" src="{{env('APP_URL')}}/images/A2.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course"> 
<span style=color:#00924a><b>B1</b></span>
<h5></h5>
<img class="Course_Im" src="{{env('APP_URL')}}/images/B1.JPG" >
</div>
</div>

<div class="col-md-4">
<div class="Course"> 
<span style=color:#00924a><b>B2</b></span>
<h5></h5>
<img class="Course_Im" src="{{env('APP_URL')}}/images/B1.JPG" >
</div>
</div>

</section>

    <section class="ftco-section">
	<div class="options">
			<div class="container-fluid px-4">

				<!-- <div class="row">
				<?php /*	@foreach ($courseslst as $course)
					@if(!isset($course->Name))
						@continue
					@else*/ ?>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(<?php //{{$course->imgSrc}} ?>); background-size: contain;"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i>Mr. Khan</span>
								<span><i class="icon-table mr-2"></i>10 seats</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#"><?php //{{$course->Name ?? ''}}?></a></h3>
							<p><?php //{{$course->sDesc ?? ''}} ?></p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<?php //@endif ?>
					<?php //@endforeach?>
				</div> -->
				<div class="row">
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(); background-size: contain;"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i>Mr. Khan</span>
								<span><i class="icon-table mr-2"></i>10 seats</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#"></a></h3>
							<p></p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
				</div>
			</div>
</div>
		</section>
@endsection
@section('scripts')
<script>
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
	$('#ftco-nav > ul > li.nav-item').removeClass('active');
		$('#ftco-nav > ul > li.nav-item:eq(2)').addClass('active');
		
		jQuery(function(){
        const params = new URLSearchParams(window.location.search)
        const action = params.get('action');
        if(action == 'signup')
	    jQuery('input[class="sign-up"]').trigger('click');
})	
</script>
@endsection