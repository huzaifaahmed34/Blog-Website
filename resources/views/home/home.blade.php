
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

        <!--================Post Slider Area =================-->
        <section class="post_slider_area">
			<div class="post_slider_inner owl-carousel">
                   @php 
                 $qry=DB::table('posts')->where('is_deleted',0)->limit(4)->orderBy('post_view_count','desc')->get();
                                        @endphp
                                        @foreach($qry as $q)
				<div class="item">
					<div class="post_s_item">
						<div class="post_img">
							<img src="{{asset('public/Posts/') }}/{{$q->post_logo}}" height="400" width=100%  alt="" style="width: 100%!important">
						</div>
						<div class="post_text">
							<a class="cat"  href="{{url('/blog')}}/{{$q->post_slug}}">Read More</a>
							<a href="{{url('/blog')}}/{{$q->post_slug}}"><h4>{{$q->title}} </h4><p>{{substr($q->short_desc,0,100)}}</p>
							<div class="date">
								<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('M d,Y',strtotime($q->created_at))}}</a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$q->post_comment_count}}</a>
							</div>

						</div>
                         
					</div>
				</div>
			@endforeach
			</div>
        </section>
        <!--================End Post Slider Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
						<!-- ======POSTS===== -->
                        @php if(isset($posts)){
                        foreach($posts as $p){
                    
                    @endphp


                            <article class="blog_style1">
                            	<div class="blog_img">
                            		<img class="img-flid"   src="{{asset('public/Posts/') }}/{{$p->post_logo}}" alt="" width="770px" height="400px">
                            	</div>
                            	<div class="blog_text">
									<div class="blog_text_inner">
									
										<a href="{{url('/blog')}}/{{$p->post_slug}}"><h4>{{$p->title}}</h4></a>
										<p>{{$p->short_desc}}  <a class="cat" href="{{url('/blog')}}/{{$p->post_slug}}">Read More</a></p>
										<div class="date">

											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('M d,Y',strtotime($p->created_at))}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$p->post_comment_count}}</a>
										</div>	
                                        <div id="share-buttons">
                                         <h5>Share On &nbsp;
    <a  id="" href="http://www.facebook.com/sharer.php?url={{url()->current()}}/blog/{{$p->post_slug}}" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
       <a  id="" href="https://twitter.com/share?url={{url()->current()}}/blog/{{$p->post_slug}}&amp;text={{$p->title}}{{$p->short_desc}}&amp;" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>
    
    <!-- LinkedIn -->
    <a  id="" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}/blog/{{$p->post_slug}}" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
    
  
</h5></div>
									</div>
                            	</div>
                            </article>
                    @php
                    }
                }
                    @endphp

                          <!--======ENDPOST======-->
                         {{ $posts->links() }}
                   
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