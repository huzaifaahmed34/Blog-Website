
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
						<h2>About Us</h2>
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a href="">About Us</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
					
                <h2> ABOUT US</h2>
<div class="container">
<p style="font-size: 20px;
    font-family: initial;">
This all started from the Islamia University of Bahawalpur where we managed to get our bachelor degrees.<br> We were strangers for each other. But with the passage of time, all of us become familiar to each other.<br> A lot of difficulties were also faced by us in early days. Some people tried to make us fight with each other, because our understanding could not be easily digested by them.<br> Time passed with the speed of light and we came close to each other forming a Trio.<br>We were also used to face a lot of problems regarding searching material from the internet.<br> Once, an idea flashed through minds that why should establish a platform from where all the necessary information about life like politics technology global and local issues news and foods etc could easily be fetched by people.<br> We started working on the plan and it bore fruit in the form of this Trio blog where every information is just a click away.<br><br>
We believe in attaining a leading position in providing latest information about local and global news and issues, updated articles related to technology, current affairs and a variety of tasty food recipes.


</p>

<cite>
Think one hundred times
Before you take a decision,
But once the decision is taken,
Stand by it as a man.
            </cite>             
<address>                              (Quaid -E-Azam)
</address>
</div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                          <div class="col-lg-12">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <input class="form-control" name="search_blog_footer" placeholder="Search Blog" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Blog '" required="" type="text">
                                <button  class="btn btn-default search"><span class="lnr lnr-magnifier"></span></button>    
                                
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                         <!--    
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Popular Posts</h3>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Space The Final Frontier</h3></a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                
                                <div class="br"></div>
                            </aside>
 -->							<!--======ADDS SECTION======-->
                       <!--      <aside class="single_sidebar_widget"> 
                                <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside> -->
							<!--======END ADDS=======---->
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Catgories</h4>
                                <ul class="list cat-list">
                                 @php 
                                        $qry=DB::table('categories')->where('is_deleted',0)->get();
                                        @endphp
                                        @foreach($qry as $q)
                                           <li>
                                        <a  href="{{url('category')}}/{{$q->category_slug}}" class="d-flex justify-content-between">
                                            <p>{{$q->category_name}}</p>
                                            
                                        </a>  </li>
                                 
                                        @endforeach
                                                                            
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                      @php 
                                        $qry=DB::table('post_tag')->distinct('tag_name')->inRandomOrder()    ->limit(20)->get();
                                        @endphp
                                        @foreach($qry as $q)
                                    <li><a href="{{url('tags')}}/{{$q->tag_name}}">{{$q->tag_name}}</a></li>
                                    
                                        @endforeach
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
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
        
   