    
@section('footer')	 <!--================ start footer Area  =================-->	
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Us</h6>
                            <p>We believe in attaining a leading position in providing latest information about local and global news and issues, updated articles related to technology, current affairs and a variety of tasty food recipes.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Search Blog</h6>
                            <p>Stay updated with our latest trends</p>		
                            <div id="mc_embed_signup">
                              
                                    <div class="input-group d-flex flex-row">
                                        <input name="search_blog_footer1" placeholder="Search Blog" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Blog '" required="" type="text">
                                        <button class="btn sub-btn search1"><span class="lnr lnr-magnifier"></span></button>		
                                    </div>									
                                    <div class="mt-10 info"></div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget f_social_wd">
                            <h6 class="footer_title">Follow Us</h6>
                            <p>Let us be social</p>
                            <div class="f_social">
                            	<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>						
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('public/Home/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('public/Home/js/popper.js')}}"></script>
        <script src="{{asset('public/Home/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/Home/js/stellar.js')}}"></script>
        <script src="{{asset('public/Home/vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{asset('public/Home/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('public/Home/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('public/Home/vendors/isotope/isotope-min.js')}}"></script>
        <script src="{{asset('public/Home/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/Home/vendors/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{asset('public/Home/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('public/Home/js/mail-script.js')}}"></script>
        <script src="{{asset('public/Home/js/theme.js')}}"></script>
    


      <script src="{{asset('public/js/Share.js')}}"></script>
    


     
        <script src="{{asset('public/Home/js/jquery.form.js')}}"></script>
        <script src="{{asset('public/Home/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('public/Home/js/contact.js')}}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{asset('public/Home/js/gmaps.min.js')}}"></script>
        <script src="{{asset('public/Home/js/theme.js')}}"></script>
    </body>

    </body>
</html>
   <script type="text/javascript">
            $(function(){
              $(".search1").on('click',function(e){
       e.preventDefault();
            var data=$('input[name=search_blog_footer1]').val();
   
            window.location.href="{{url('search')}}/"+data;
        })
    })
        </script>
@endsection('footer')