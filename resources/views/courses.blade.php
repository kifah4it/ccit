@extends('layouts.main')
@section('title')
    Courses
@endsection
@section('content')
    <style>
        .hero-wrap-2 {
            background-image: url("{{ env('APP_URL') }}/images/courses_top.jpg") !important;
        }
        .course_cont{
            display:flex;
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
            <img class="First_icon" src="{{ env('APP_URL') }}/images/E_icon.PNG">
            <span><b>nglish Courses</b></span>



        </div>

        <div class="container-fluid">

            <div class="row English">
                @foreach ($courseslst as $course)
                    @if (!isset($course->Name))
                        @continue
                    @else
                        <div class="col-md-4">
                            <a href="{{env('APP_URL').'/course/'.$course->Name}}">
                                <div class="Course">
                                <span style=color:#fecd29><b>{{ $course->Name }}</b></span>
                                <h5>{{ $course->catName }}</h5>
                                <div class="course_cont">
                                <img class="Course_Im" src="{{ $course->imgSrc }}">
                                {!! html_entity_decode($course->sDesc) !!}
                                </div>
                            </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </section>
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
