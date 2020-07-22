
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
  
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('public/Home/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/vendors/lightbox/simpleLightbox.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/vendors/animate-css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/vendors/jquery-ui/jquery-ui.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('public/Home/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/Home/css/responsive.css')}}">
    </head>
    @extends('layouts.header')

@extends('layouts.footer')


@section('content') 
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Contact Us</h2>
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a href="">Contact</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_120">
            <div class="container">
              
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Bahawalnagar</h6>
                                <p>Pakistan</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">03042967575</a></h6>
                                <p>Mon to Fri 1pm to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">WeTrioBlog@gmail.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class=" alert-success"></div>
                        <form class="row contact_form" action="{{url('ContactUsSubmit')}}" method="post" id="contactForm" novalidate="novalidate">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        @endsection('content')
   

