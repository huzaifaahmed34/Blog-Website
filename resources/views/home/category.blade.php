
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

@php


if(isset($category)){

}

@endphp

		
		<!--================Home Banner Area =================-->
        <section class="banner_area">
        			@if(isset($category))
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" style="background-image: url('{{asset('public/categories/')}}/{{$category[0]->category_logo}}")');">

            	
            	</div>
				<div class="container">
					<div class="banner_content text-center">
							@if($category->total()==0)
					<h2>No Result Found</h2>
					@else	
						<h2>{{$category[0]->category_name}}</h2>
						@endif
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a href="">Categories</a>
						</div>
					</div>
				</div>
            </div>
            @elseif(isset($subcategory))
             <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" style="background-image: url('{{asset('public/subcategories/')}}/{{$subcategory[0]->logo}}")');" >

            	</div>
				<div class="container">
					<div class="banner_content text-center">
							@if($subcategory->total()==0)
					<h2>No Result Found</h2>
					@else	
						<h2>{{$subcategory[0]->sname}}</h2>
						@endif
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a >SubCategories</a>
						</div>
					</div>
				</div>
            </div>
                        @elseif(isset($tags))
<?php                     
     ?>        <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" >

            		            	</div>
				<div class="container">
					<div class="banner_content text-center">
				@if($tags->total()==0)
					<h2>No Result Found</h2>
					@else	
							<h2>{{$tags[0]->tag_name}}</h2>
				@endif
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a>Tags</a>

						</div>
					</div>
				</div>
            </div>

             @elseif(isset($search))
                <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" >

            		            	</div>
				<div class="container">
					<div class="banner_content text-center">
				@if($search->total()==0)
					<h2>No Result Found</h2>
					@else	
							<h2></h2>
				@endif
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a>Search</a>

						</div>
					</div>
				</div>
            </div>

            		

            @endif
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
			<div class="container ">
				<form class="subscribe_form relative">
					<div class="form-row">
						<div class="col-md-8">
							@php 

if(isset($category)){
@endphp
	<h6 class="text-info">Total Results Found  : {{ $category->total() }}</h6>
	<h4>Related Categories</h4>
@php
$qry=DB::table('sub_categories')->where('category_id',$category[0]->category_id)->where('is_deleted',0)->get();
foreach($qry as $q){
@endphp
							<a href="{{url('subcategory')}}/{{$q->slug}}" class="btn color-theme button-border text-white">{{$q->name}}</a>
						
		@php
	}
	}
	elseif(isset($subcategory)){
	@endphp
	<h5 >Total Results Found  : {{ $subcategory->total() }}</h5>
	@php
}
elseif(isset($tags)){
	@endphp
<h5 >Total Results Found  : {{ $tags->total() }}</h5>
@php
}	
elseif(isset($search)){
	@endphp
<h5 >Total Results Found  : {{ $search->total() }} </h5>
@php
}					@endphp





							</div>
						
						<div class="col-md-4">
							<div class="input-group d-flex flex-row">
                                <input class="form-control" name="search_blog_footer" placeholder="Search Blog" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Blog '" required="" type="text">
                                <button  class="btn sub-btn color-theme text-white search"><span class="lnr lnr-magnifier"></span></button>		
                            </div>
						</div>
					</div>
				</form>
			</div>
			<hr>

            <div class="container ">
                <div class="row">
                	@if(isset($category))
                	@foreach($category as $c)

                    <div class="col-md-4">
                        <article class="blog_style1 small">
							<div class="blog_img">
								<img class="img-fluid" src="{{asset('public/Posts/') }}/{{$c->post_logo}}"  alt="" style="height:300px" width="100%">
							</div>
							<div class="blog_text">
								<div class="blog_text_inner">
										<a class="cat" href="{{url('/blog')}}/{{$c->post_slug}}">Read More</a>
										<a href="{{url('/blog')}}/{{$c->post_slug}}"><h4>{{$c->title}}</h4></a>
										<span> {{substr($c->short_desc,0,150)}}</span>
									<div class="date">
										<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('M d,Y',strtotime($c->created_at))}}</a>
										<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
									</div>	
								</div>
							</div>
						</article>
                    </div>
					@endforeach
					@elseif(isset($subcategory))
						@foreach($subcategory as $c)

                    <div class="col-md-4">
                        <article class="blog_style1 small">
							<div class="blog_img">
								<img class="img-fluid" src="{{asset('public/Posts/') }}/{{$c->post_logo}}"  alt="" style="height:300px" width="100%">
							</div>
							<div class="blog_text">
								<div class="blog_text_inner">
										<a class="cat" href="{{url('/blog')}}/{{$c->post_slug}}">Read More</a>
										<a href="{{url('/blog')}}/{{$c->post_slug}}"><h4>{{$c->title}}</h4></a>
									<span> {{substr($c->short_desc,0,150)}}</span>
									<div class="date">
										<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('M d,Y',strtotime($c->created_at))}}</a>
										<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
									</div>	
								</div>
							</div>
						</article>
                    </div>
					@endforeach

					@elseif(isset($tags))
						@foreach($tags as $c)
               <div class="col-md-4">
                        <article class="blog_style1 small">
							<div class="blog_img">
								<img class="img-fluid" src="{{asset('public/Posts/') }}/{{$c->post_logo}}"  alt="" style="height:300px" width="100%">
							</div>
							<div class="blog_text">
								<div class="blog_text_inner">
										<a class="cat" href="{{url('/blog')}}/{{$c->post_slug}}">Read More</a>
										<a href="{{url('/blog')}}/{{$c->post_slug}}"><h4>{{$c->title}}</h4></a>
									<span> {{substr($c->short_desc,0,150)}}</span> 
									<div class="date">
										<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('M d,Y',strtotime($c->created_at))}}</a>
										<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
									</div>	
								</div>
							</div>
						</article>
                    </div>
                    			@endforeach
                    				@elseif(isset($search))
						@foreach($search as $c)
               <div class="col-md-4">
                        <article class="blog_style1 small">
							<div class="blog_img">
								<img class="img-fluid" src="{{asset('public/Posts/') }}/{{$c->post_logo}}"  alt="" style="height:300px" width="100%">
							</div>
							<div class="blog_text">
								<div class="blog_text_inner">
										<a class="cat" href="{{url('/blog')}}/{{$c->post_slug}}">Read More</a>
										<a href="{{url('/blog')}}/{{$c->post_slug}}"><h4>{{$c->title}}</h4></a>
										<span> {{substr($c->short_desc,0,150)}}</span>
									<div class="date">
										<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('M d,Y',strtotime($c->created_at))}}</a>
										<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
									</div>	
								</div>
							</div>
						</article>
                    </div>
                    			@endforeach

					@endif
					
                </div>
                @if(isset($category))
				{{$category->links()}}
				@elseif(isset($subcategory))
				{{$subcategory->links()}}
					@elseif(isset($tags))
				{{$tags->links()}}
				@endif
            </div>
        </section>
       <script src="{{asset('public/Home/js/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript">
        	$(function(){
        	  $(".search").on('click',function(e){
       e.preventDefault();
        	var data=$('input[name=search_blog_footer]').val();
   
        	window.location.href="{{url('search')}}/"+data;
        })
    })
        </script>
        <!--================Blog Area =================-->
@endsection('content')