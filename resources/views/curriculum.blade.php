@extends('layouts.main')
@section('title')
Curriculum
@endsection
@section('head')
<style type="text/css">
	.hero-wrap-2 {
		height: 278px !important;
		padding-top: var(--menu-height) !important;
		background-image: url('images/bg_1.jpg');
		background-position-y: 12%;
	}

	.hero-wrap-2 h2 {
		color: #fff;
	}

	.hero-wrap-2 h6 {
		color: #c7c2c2;
	}

	.sticky-sidebar {
		position: relative;
		overflow: visible;
		box-sizing: border-box;
		min-height: 1px;
	}

	.sticky-sidebar.stick {
		position: fixed !important;
	}

	@media (min-width: 767.98px) {
		.sticky-sidebar {
			margin-top: -316px;
		}
	}

	.sticky-sidebar .course_right {
		background-color: #fff;
		padding: 6px 6px 25px;
		-webkit-box-shadow: 10px 10px 24px -4px rgb(0 0 0 / 28%);
		-moz-box-shadow: 10px 10px 24px -4px rgba(0, 0, 0, 0.28);
		box-shadow: 10px 10px 24px -4px rgb(0 0 0 / 28%);
		border-radius: 10px;
	}

	.course-thumbnail .media-intro {
		clear: both;
		display: block;
		text-align: center;
	}

	.responsive-iframe {
		position: relative;
		padding-bottom: 56.25%;
		height: 0;
		overflow: hidden;
	}

	.course-thumbnail .media-intro iframe {
		max-width: 100%;
		margin: auto;
		display: block;
	}

	.responsive-iframe iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	.sticky-sidebar .course_right .course-payment {
		display: block;
		float: none;
		padding: 0 15px;
		margin: 25px 0;
	}

	.sticky-sidebar .course_right .course-payment .course-price {
		margin-bottom: 20px;
		font-size: 1.8rem;
		font-weight: 600;
	}

	.sticky-sidebar .course_right .course-payment .lp-course-buttons .lp-button {
		border-radius: 4px;
		width: 100%;
		display: inline-block;
		font-size: 13px;
		line-height: 40px;
		height: 40px;
		border: 0;
		padding: 0 25px;
		text-transform: capitalize;
		font-weight: regular;
		color: #fff;
		background-color: #fd5f00;
		margin: 0 auto;
	}

	.sticky-sidebar .course_right .thim-course-info {
		padding: 0 15px;
		margin-bottom: 25px;
	}

	.thim-style-content-layout_style_3.single-lp_course .sticky-sidebar .course_right .thim-course-info ul li {
		list-style: none;
		padding: 4px 0 5px;
	}

	.course-meta-single {
		display: inline-block;
		overflow: hidden;
		position: relative;
		padding: 0;
		margin-bottom: 30px;
		margin-top: 30px;
	}

	.course-meta-single>div {
		display: unset;
		margin-bottom: 0;
		color: #fff;
		line-height: 20px;
		margin-left: 15px;
		float: right;
	}

	.course-meta-single>div.course-author img {
		border-radius: 50%;
		width: 60px;
		height: auto;
		float: right;
		margin-left: 10px;
	}

	div.course-author .author-contain {
		display: inline-block;

	}

	div.course-author .author-contain a {
		color: #fff;
		line-height: 20px;
	}

	.fixed-white-menu {
		position: relative !important;
	}

	.ftco-section {
		padding: 5em 0;
	}

	.ftco-section .overview > h2::after {
		content: " ";
		display: block;
		background: #53525738;
		width: 100%;
		height: 1px;
	}
	.ftco-section .overview > h2 {
	padding-bottom: 10px;
	margin-bottom: 10px;	
	}
	.course-price .value{
		text-align:center;
	}
	.course-start-date{
		margin-top:5%;
	}
	.course-start-date .date{
		display: flex;
		font-size: 15px;
		align-items: center;
		justify-content: center;
	}
	.course-start-date .date .sprtr{
		margin-left:1%;
		margin-right:1%;
	}
	.icon-calendar,.icon-clock-o{
		color:#03a503;
		margin:4px;
	}
	.requirements{
		background: #ff000026;
		border-radius: 5px;
		border: solid 1px #e30c0c;
		padding: 1px;
		margin-bottom:10px;
	}
	.requirements ul{
		font-size: 13px;
		margin: 2px;
		padding: 2% 6% 2% 6%;
	}
	#notacptdbtn{
		background: #939191;
	}
	#loginbtn > button,#accptdbtn{
		cursor: pointer;
	}
	#accptdbtn{
		background-color: #03a503;
	}
	#enrolledbtn,#pendingbtn{
		background-color: #939191;
		height:unset;
	}
	#pendingbtn{
		padding:2px;

	}
	.total{
		text-align: center;
		border: solid 1px;
		border-radius: 8%;
		background: #ffffff;
	}
	.courses{
		margin-top:5%;
		margin-bottom: 5%;
		font-size: 14px;
		border: solid 1px #03a503;
		padding: 4%;
		border-radius: 3%;
		background: #03a5030d;
	}
	
</style>
@endsection
@section('content')
<section class="hero-wrap hero-wrap-2">
	<div class="overlay" style="background: #535257;opacity:0.9"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>{{$courseObj[0]['fullname']}}</h2>
				<h6>
					@if(Cookie::get('lang') == 'EN')
					{{$courseObj[0]['short_desc_en']}}
					@else
					{{$courseObj[0]['short_desc_ar']}}
					@endif
				</h6>
			</div>
			<div class="col-md-12">
				<div class="course-meta course-meta-single">
					<!-- <div class="course-author">
						<img alt="User Avatar" src="https://eduma.thimpress.com/demo-udemy/wp-content/uploads//learn-press-profile/7/e5c6a6fb8aa3864eacaec471611e0470.jpeg" height="150" width="150">
						<div class="author-contain">
							<label itemprop="jobTitle">المدرس</label>
							<div class="value" itemprop="name">
								<a href="https://eduma.thimpress.com/demo-udemy/instructor-4/keny/"><span><span class="instructor-display-name">أحمد يوسف</span></span></a>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
</section>

<section class="ftco-section">
	<div class="container px-4">
		<div class="row">
			<div class="col-md-8">
				<div class="overview">
					<h2>{{__('messages.About_course')}}</h2>
					<div>
					@if(Cookie::get('lang') == 'EN')
						{{$courseObj[0]['summary']}}
					@else
						{{$courseObj[0]['ardesc']}}
					@endif
					</div>
				</div>
			</div>
			<div id="sidebar" class="col-md-4 sticky-sidebar">
				<div class="course_right">
					<div>
						<div>
							<div class="course-thumbnail">
								<div class="media-intro">
									<image src="{{env('LMS_URL').'/'.$courseObj[0]['courseimage']}}" width="200px" height="250px" />
								</div>
							</div>
						</div>
						<div class="course-payment">
							<div class="course-price">
								<div class="value  free-course">
									@if($courseObj[0]['interprice'] == null)
									{{$courseObj[0]['price']}}
									@else
									{{$courseObj[0]['interprice'].'$'}}
									@endif
								</div>
							</div>
							<div class="lp-course-buttons">
							<?php if(!isset($_SESSION))
											session_start(); ?>
											@if(!isset($_SESSION['mdl_userinfo']))
											<a id="loginbtn" href="{{env('APP_URL')}}/login">
											<button class="lp-button button button-enroll-course">
											{{__('messages.login')}}
											</button></a>
											@else
												@if($courseObj[0]['avail'][0]['status'] == 'not accepted')
												<button id="notacptdbtn" class="lp-button button button-enroll-course" disabled>
												{{__('messages.prerequirements_not_achived')}}
												</button>
												@elseif($courseObj[0]['avail'][0]['status'] == 'enrolled')
												<button id="enrolledbtn" class="lp-button button button-enroll-course" disabled>
												{{__('messages.allready_enroled')}}
												<a href="{{env('LMS_URL')}}/course/view.php?id={{$courseObj[0]['id']}}">{{__('messages.LearningPlatform')}}</a>
												</button>
												@elseif($courseObj[0]['avail'][0]['status'] == 'pending')
												<button id="pendingbtn" class="lp-button button button-enroll-course" disabled>
												{{__('messages.pendingRegister')}}
												</button>
												@else
											<?php 
											if(!isset($_SESSION))
											session_start();

											$_SESSION['currancy'] = isset($_SESSION['country']) ? $_SESSION['country'] != 'SY' ? '$' : ' ل.س ' : ' ل.س ';
											?>
											
											<form id="frm_enroll" method="POST" action="{{url('Login')}}?action=enroll">
													@csrf
													<div class="courses">
													<p>{{__('messages.materials')}}</p>
													<p style="display:none;"><input type="checkbox" name="courses[]" value="{{$courseObj[0]['id']}}" cost="0" checked></input></p>
                                                @foreach($courseObj[0]['courses'] as $cr)
												<p><input type="checkbox" name="courses[]" value="{{$cr['id']}}" cost="{{isset($_SESSION['country']) ? $_SESSION['country'] != 'SY' && $cr['interprice'] != '' ? $cr['interprice'] : $cr['price'] : $cr['price']}}" checked>&nbsp;{{$cr['fullname']}} - {{isset($_SESSION['country']) ? $_SESSION['country'] != 'SY' && $cr['interprice'] != '' ? $cr['interprice'] . '$' : $cr['price'] . ' ل.س' : $cr['price'] . ' ل.س'}}</input></p>
                                                @endforeach
												<div class="total">
													<span>{{__('messages.cost')}}</span><span class="cost"></span><span>{{$_SESSION['currancy']}}</span>
												</div>
												</div>
												<div class="course-start-date">
													<div class="date">
													<p>{{__('messages.starts_on')}}</p>
													<p class="sprtr"></p>
													<p><span class="icon-calendar"></span></p>
													<p> {{date("Y-m-d", $courseObj[0]['startdate'])}}</p>
													<p class="sprtr"></p>
													<p><span class="icon-clock-o"></span></p>
													<p> {{date("H:i", $courseObj[0]['startdate'])}} </p>
													</div>
												</div>
												<input type="submit" id="accptdbtn" class="lp-button button button-enroll-course" value="{{__('messages.enrol_now')}}">
												</input>
												</form>
												
												
												@endif
											@endif
							</div>
						</div>

					
						
						<div class="thim-course-info">
							<h3 class="title">{{__('messages.course_details')}}</h3>
							<div class="content">
							@if(Cookie::get('lang') == 'EN')
							{{$courseObj[0]['course_details_en']}}
							@else
							{{$courseObj[0]['course_details']}}
							@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
@endsection
@section('scripts')
<script>
	$(function() {
		var navbar = $('nav');
		navbar.removeClass('fixed-trans-menu');
		navbar.addClass('fixed-white-menu');
	}
	);
	$(function(){
		var htmlcont = $.parseHTML($('.overview > div').text());
		$('.overview > div').html(htmlcont);
		htmlcont = $.parseHTML($('.thim-course-info > .content').text());
		$('.thim-course-info > .content').html(htmlcont);
		$.each($('.requirements li'),function(i){
		htmlcont = $.parseHTML($(this).text());
		$(this).html(htmlcont);
		})
	})
	$(function(){
		totalcost();

		$url = $('#loginbtn').prop('href')+'?redirect='+window.location.href;
		$('#loginbtn').prop('href',$url);
		
		$('#frm_enroll :checkbox').change(function(e){
			totalcost();
		})

	}
	)
	function totalcost(){
		var sum = 0;
			$('#frm_enroll input[type=checkbox]').each(function(s,e){
				if ($(this).is(':checked')) {
					sum += Number($(this).attr('cost'));
				}
			})
			$('.total > .cost').text(sum);
	}
	// $(function(){
	// 	var courses = {{$courseObj[0]['id']}} ;
	// 	$('#accptdbtn').click(function(s,e){
	// 		e.preventDefault();
	// 		$.cookie('courses', array('{{$courseObj[0]['id']}}'), { expires: 7, path: '/' });
	// 	})
	// })

	// var scrollWindow = function() {
	// 	$(window).scroll(function(){


	// 		var $w = $(this),
	// 				st = $w.scrollTop(),
	// 				navbar = $('#sidebar'),
	// 				sd = $('.js-scroll-wrap');
	// 						console.log('st:'+ st + 'sidebar: ' + navbar.position().top)			
	// 				if(st >= navbar.position().top){
	// 						navbar.addClass('stick');
	// 				}
	// 				else{
	// 					navbar.removeClass('stick');
	// 				}
	// 	});
	// };
	// scrollWindow();
</script>
@endsection