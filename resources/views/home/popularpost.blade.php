
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title></title>
 <meta name="description" content="Popular Post">
 <meta name="keywords" content="">

  
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
						<h2>Pupolar Posts Archive</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="popular posts.html">Popular Posts</a>
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
                        <div class="blog_left_sidebar text-center">
                        <h1 >No Posts To Show</h1>
						<!-- ======POSTS===== -->
                      <!--       <div class="row">
								<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="img/home-blog/blog-small-2.jpg" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<a class="cat" href="#">Read More</a>
												<a href="#"><h4>2nd Gen Smoke Co Bomb Alarm integration</h4></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
												<div class="date">
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>	
											</div>
										</div>
									</article>
                            	</div>
							</div> -->
                          <!--======ENDPOST======-->
                            
                  
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <input class="form-control" name="search_blog_footer" placeholder="Search Blog" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Blog '" required="" type="text">
                                <button  class="btn btn-default search"><span class="lnr lnr-magnifier"></span></button>    
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            
                <aside class="single_sidebar_widget search_widget">
                       <h4 class="widget_title">Subscribe To Our Newsletter</h4>
                       <span>{{@$message}}</span>
                                <form action="{{url('Subscribe')}} " id=formsubscribe method="post"><div class="input-group">
{{csrf_field()}}
                                    <input class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" required="" type="text">
                              <button type="submit" class="btn btn-danger subscribe">Subscribe</button> 
                                    
                                </div>
                            </form>
                                <!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            <!--======ADDS SECTION======-->
                        <!--     <aside class="single_sidebar_widget"> 
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
         <!---Thankyou Modal--->
 <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
                    
                    <div class="modal-body">
                       
                        <div class="thank-you-pop">
                            <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                            <h1>You are successfully subscribed to our newsletter!</h1>
                            <p>Now you will always get updated by  our new posts,updates,promotions.</p>
                        
                            
                        </div>
                         
                    </div>
                    
                </div>
            </div>
        </div>
       <script src="{{asset('public/Home/js/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript">
            $(function(){
              $(".search").on('click',function(e){
       e.preventDefault();
            var data=$('input[name=search_blog_footer]').val();
   
            window.location.href="{{url('search')}}/"+data;
        })
              $('#formsubscribe').on('submit',function(e){
e.preventDefault();
var data=$(this).serialize();
$.ajax({
    method:'post',
    data:data,
    url:"{{url('Subscribe')}}",
    dataType:'json',
    async:false,
    success:function(res){
if(res.success){
$('#ignismyModal').modal('show');
$('#formsubscribe')[0].reset();
    }
    else{
alert('Your Email Already Exist');
    }
}
})
              });
    })
        </script>

        <!--================Blog Area =================-->
@endsection('content')        
      