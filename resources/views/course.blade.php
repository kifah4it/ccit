@extends('layouts.main')
@section('title')
Courses
@endsection
@section('head')
<style type="text/css">
	.hero-wrap-2 {
		height: 350px !important;
		padding-top: var(--menu-height);
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
		text-transform: uppercase;
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
		position: relative;
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
</style>
@endsection
@section('content')
<section class="hero-wrap hero-wrap-2">
	<div class="overlay" style="background: #535257;opacity:0.9"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>كورس Ventures </h2>
				<h6>أول كورس في مرحلة التأسيس في اللغة الانكليزية</h6>
			</div>
			<div class="col-md-12">
				<div class="course-meta course-meta-single">
					<div class="course-author">
						<img alt="User Avatar" src="https://eduma.thimpress.com/demo-udemy/wp-content/uploads//learn-press-profile/7/e5c6a6fb8aa3864eacaec471611e0470.jpeg" height="150" width="150">
						<div class="author-contain">
							<label itemprop="jobTitle">المدرس</label>
							<div class="value" itemprop="name">
								<a href="https://eduma.thimpress.com/demo-udemy/instructor-4/keny/"><span><span class="instructor-display-name">أحمد يوسف</span></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<section class="ftco-section">
	<div class="container px-4">
		<div class="row">
			<div class="col-md-8">
				<div class="overview">
					<h2>حول الكورس</h2>
					<div>
						<p>منهاج Ventures 1 هو منهج تعليم اللغة الإنجليزية للمبتدئين من إعداد جامعة كامبريدج. يهدف المنهج إلى تعليم الطلاب المهارات الأساسية في اللغة الإنجليزية، بما في ذلك القراءة والكتابة والاستماع والتحدث.</p>
						<p>يتكون المنهج من كتاب مدرسي وكتاب عمل، بالإضافة إلى موارد رقمية. يغطي الكتاب المدرسي الموضوعات التالية:</p>
						<ul>
							<li>أساسيات اللغة الإنجليزية</li>
							<li>المفردات والقواعد</li>
							<li>القراءة والكتابة</li>
							<li>الاستماع والتحدث</li>
						</ul>
						<p>يقدم الكتاب العمل فرصًا للممارسة والمراجعة. كما يتضمن الموارد الرقمية أنشطة وألعابًا واختبارات.</p>
						<p>تشير نتائج الدراسات التي أجريت على منهاج Ventures 1 إلى أنه فعال في تعليم الطلاب اللغة الإنجليزية. فقد وجدت إحدى الدراسات أن الطلاب الذين درسوا باستخدام المنهج حققوا نتائج أفضل في الاختبارات مقارنة بالطلاب الذين لم يدرسوا باستخدامه.</p>
					</div>
				</div>
			</div>
			<div id="sidebar" class="col-md-4 sticky-sidebar">
				<div class="course_right">
					<div>
						<div>
							<div class="course-thumbnail">
								<div class="media-intro">
									<image src="images/ventures1.jpg" width="200px" height="250px" />
								</div>
							</div>
						</div>
						<div class="course-payment">
							<div class="course-price">
								<div class="value  free-course">
									100.000 ل.س
								</div>
							</div>
							<div class="lp-course-buttons">
								<button class="lp-button button button-enroll-course">سجل الآن</button>
							</div>
						</div>
						<div class="thim-course-info">
							<h3 class="title">تفاصيل الكورس</h3>
							<ul>
								<li class="lectures-feature">
									<i class="fa fa-files-o"></i>
									<span class="label">الجلسات</span>
									<span class="value">
										6 </span>
								</li>
								<li class="quizzes-feature">
									<i class="fa fa-puzzle-piece"></i>
									<span class="label">الاختبارات</span>
									<span class="value">
										1 </span>
								</li>
								<li class="duration-feature">
									<i class="fa fa-clock-o"></i>
									<span class="label">مدة الدرس</span>
									<span class="value">ساعة ونصف</span>
								</li>
								<li class="skill-feature">
									<i class="fa fa-level-up"></i>
									<span class="label">المستوى</span>
									<span class="value">تأسيس</span>
								</li>
								<li class="language-feature">
									<i class="fa fa-language"></i>
									<span class="label">اللغة</span>
									<span class="value">الانكليزية</span>
								</li>
								<li class="students-feature">
									<i class="fa fa-users"></i>
									<span class="label">عدد الطلاب</span>
									<span class="value">30</span>
								</li>
								<li class="assessments-feature">
									<i class="fa fa-check-square-o"></i>
									<span class="label">وظائف</span>
									<span class="value"></span>
								</li>
							</ul>
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
	});
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