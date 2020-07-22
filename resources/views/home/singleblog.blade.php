
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>{{$data->title}}</title>
 <meta name="description" content="{{$data->short_desc}}">
 <meta name="keywords" content="{{$data->keywords}}">

  
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

        <!--===============Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Blog Post Details</h2>
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a >Post Details</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120 single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
       					<div class="main_blog_details">
							<!---post img--->
       						<img class="img-fluid" height="300px!important" src="{{asset('public/Posts/') }}/{{$data->post_logo}}" alt="" >
							<!---heading--->
       					<h1 class="mt-3">{{@$data->title}}</h1>
       						<div class="user_details">
       							<div class="float-left">
       								<a href="{{url('category')}}/{{$data->category_slug}}"><!--Category-->{{@$data->category_name}}</a>
       							</div>
       							<div class="float-right">
       								<div class="media">
       									<div class="media-body">
       										<h5>{{@$data->name}}</h5>
       										<p>{{date('M d,Y',strtotime(@$data->created_at))}}</p>
       									</div>
       									<div class="d-flex">
       										<img src="" alt="">
       									</div>
       								</div>
       							</div>
       						</div>
                
    <!-- Facebook -->
   
							<!---post details--->
       						<div class="container">
                      <div id="share-buttons">
                     <h5>Share On &nbsp;
    <a href="http://www.facebook.com/sharer.php?url={{url()->full()}}" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
       <a href="https://twitter.com/share?url={{url()->full()}}&amp;text={{$data->title}}&amp;" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>
    
    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->full()}}" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
    
    <!-- Pinterest -->
    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
        <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
    </a>
</h5></div>
							<p>{!!@$data->description!!}
							
							</P>
							
							</div>
       					</div>
       					        
                        <div class="comments-area">
                  
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                          
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Emilly Blunt</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                            <p class="comment">
                                                Never say goodbye till the end comes!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                           <a href="" class="btn-reply text-uppercase">reply</a> 
                                    </div>
                                </div>
                            </div>	
                            <div class="comment-list left-padding">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                      
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Elsie Cunningham</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                            <p class="comment">
                                                Never say goodbye till the end comes!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                           <a href="" class="btn-reply text-uppercase">reply</a> 
                                    </div>
                                </div>

         </div>                                                            				
                        </div>
                        <div class="comment-form">
                            <div class=" alert-success">
                            </div>
                            <h4>Leave a Comment</h4>
                            <form id=form1>
                                {{csrf_field()}}
                            <input type="hidden" name="post_id" value="{{$data->id}}">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                        <span id=nameerror class="text-danger"> </span>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                  </div>
                                 
                                 						
                                
                           
                                <div class="form-group">
                                      <span id=messageerror class="text-danger"> </span>
                                    <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                </div>
                                <button type="button" class="primary-btn submit_btn text-light" >Post Comment</button>	
                            </form>
                        </div>
        			</div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Posts">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Related Posts</h3>
                                @php 
                                if(@$data->subcategory_id!=NULL){
                            
                             $qry=DB::table('posts')->where('subcategory_id',@$data->subcategory_id)->where('id','!=',@$data->id)->orderBy('id','desc')->limit(5)->get();
                            }
                            else{

                                 $qry=DB::table('posts')->where('category_id',@$data->category_id)->where('id','!=',@$data->id)->orderBy('id','desc')->limit(5)->get();
                                }
                                @endphp
                                @foreach($qry as $r)
                                <div class="media post_item">
                                    <img src="{{asset('public/Posts/') }}/{{$r->post_logo}}"  width=100 height="70" alt="post">
                                    <div class="media-body">
                                        <a href="{{url('/blog')}}/{{$r->post_slug}}"><h3>{{@$r->title}}</h3></a>
                                        <p> {{date('M d,Y',strtotime(@$r->created_at))}}</p>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="br"></div>
                            </aside>
							<!--======ADDS SECTION======-->
                          <aside class="single_sidebar_widget search_widget">
                       <h4 class="widget_title">Subscribe To Our Newsletter</h4>
                       <span>{{@$message}}</span> 
                                <form action="{{url('Subscribe')}}" id="formsubscribe" method="post"><div class="input-group">
{{csrf_field()}}
                                    <input class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" required="" type="text">
                              <button type="submit" class="btn btn-danger subscribe">Subscribe</button> 
                                    
                                </div>
                            </form>
                                <!-- /input-group -->
                                <div class="br"></div>
                            </aside>
							<!--======END ADDS=======---->
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Catgories</h4>
                                <ul class="list cat-list">
                             @php 
                                if($data->subcategory_id==NULL){
                            
                            $qry=DB::table('categories')->where('is_deleted',0)->get();
                            @endphp
  @foreach($qry as $q)
  <li>
                                        <a  href="{{url('category')}}/{{$q->category_slug}}" class="d-flex justify-content-between">
                                            <p>{{$q->category_name}}</p>
                                            
                                        </a>  </li>

                                @endforeach 
                        @php
                    }
                            else{

                             $qry=DB::table('sub_categories')->where('category_id',$data->category_id)->where('is_deleted',0)->get();
                                

                                @endphp
                                @foreach($qry as $q)
  <li>
                                        <a  href="{{url('subcategory')}}/{{$q->slug}}" class="d-flex justify-content-between">
                                            <p>{{$q->name}}</p>
                                            
                                        </a>  </li>
                                @endforeach									
                                @php
                            }
                            @endphp
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Related Tags</h4>
                                <ul class="list">
                                       @php 
                                        $qry=DB::table('post_tag')->distinct('tag_name')->where('post_id',$data->id)->limit(20)->get();
                                        @endphp
                                        @foreach($qry as $q)
                                    <li><a   href="{{url('tags')}}/{{$q->tag_name}}" >{{$q->tag_name}}</a></li>
                                    
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
<!--         <script type="text/javascript">
            $(function(){
            

    })
        </script> -->

             <script src="{{asset('public/Home/js/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript">
            $(function(){
               function showcomments(){
                var post_id="{{$data->id}}";
                $.ajax({
                    type:'ajax',
                    method:'get',
                    data:{'post_id':post_id},
                    url:'{{url("showcomments")}}',
                    dataType:'json',
                    async:'false',
                    success:function(res){
                        var html='';
                        html+='<h4>FeedBack</h4>';
                        for(var i=0;i<res.length;i++){
                            html+=' <div class="comment-list coloum" id=coloum style="display:none">'+
                                '<div class="single-comment justify-content-between d-flex">'+
                                   '<div class="user justify-content-between d-flex">'+
                                        '<div class="thumb">'+
                                            '<img src="{{asset("public/Home/img/user.png")}}" width=70 alt="">'+
                                        '</div>'+
                                        '<div class="desc">'+
                                            '<h5><a href="#">'+res[i].name+'</a></h5>'+
                                            '<p class="date">'+res[i].created_at+' </p>'+
                                            '<p class="comment">'+
                                         res[i].message+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                  
                               ' </div>'+
                           ' </div>';
                       } 

               if(res.length>5){
        html+='<div class="col-sm-12 text-center" style="margin-bottom:20px;"><a href="javascript:" id="loadMore">Load More Comments</a><p class="totop"> </div>';
                
                }
                else{
}
                $('.comments-area').html(html);
                        $('.coloum').slice(0, 4).show();
                
    

                    }
                })
               }

$('.btn-reply').click(function(){
$('.replyform').style('display','block');
});
               $('.submit_btn').click(function(){
                    var data=$('#form1').serialize();
                   var name=$('input[name=name]');
                   var message=$('textarea[name=message]');
                   var result='';
                   if(name.val()==''){
                       $('#nameerror').html('Name cannot be blank !');
                   }else{
                       $('#nameerror').html('');
                        result+='1';
                   }
                       if(message.val()==''){
                       $('#messageerror').html('Message cannot be blank !');
                   }else{
                       $('#messageerror').html('');
                        result+='1';
                   }
                   if(result=='11'){
                         $.ajax({
                    method:'post',
                    data:data,
                    url:'{{url("addcomments")}}',
                    dataType:'json',
                    async:'false',
                    success:function(res){
                        $('#form1')[0].reset();
                        $('.alert-success').addClass('alert').html('Your Comment is successfully added').fadeIn().delay(4000).fadeOut('slow');
                            showcomments();
                    }
                });
}
               });



               showcomments();

//Load More Feature

    $(".comments-area").on('click','#loadMore', function () {
     
        $(".coloum:hidden").slice(0, 10).slideDown();
        if ($(".coloum:hidden").length == 0) {
            $("#loadMore").fadeOut('slow');
        }
      
    });

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