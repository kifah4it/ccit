@extends('layouts.main')
@section('title')
Home
@endsection
@section("content")
<style>
	.hero-wrap-2 {
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

<div class="container-fluid Languages">
<div class="row English_top">
<br>
	<img class="L_icon" src="{{env('APP_URL')}}/images/L_icon.png" > 
	<span class="Lan"><b>anguages</b></span>


</div>
<div class="container-fluid">
	<div class="row">

		<div class="col-md-4">
			<a href="{{env('APP_URL')}}/courses/English">
				<div class="City">
					<img class="City_Im" src="{{env('APP_URL')}}/images/English.jpg">
					<div class="City_te">
						<p>English</p>
					</div>
			</a>
		</div>
	</div>

	<div class="col-md-4">
		<a href="{{env('APP_URL')}}/courses/Frensh">
			<div class="City">

				<img class="City_Im" src="{{env('APP_URL')}}/images/France.jpg">
				<div class="City_te">
					<p>Frensh</p>
				</div>

			</div>
		</a>
	</div>

	<div class="col-md-4">
		<a href="{{env('APP_URL')}}/courses/Germany">
			<div class="City">

				<img class="City_Im" src="{{env('APP_URL')}}/images/Germany.jpg">
				<div class="City_te">
					<p>German</p>
				</div>
			</div>
		</a>
	</div>

</div>
</div>
</div>

@endsection

@section('scripts')
<script>
	var scrollWindow = function() {
		$(window).scroll(function() {


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

	jQuery(function() {
		const params = new URLSearchParams(window.location.search)
		const action = params.get('action');
		if (action == 'signup')
			jQuery('input[class="sign-up"]').trigger('click');
	})
</script>
@endsection