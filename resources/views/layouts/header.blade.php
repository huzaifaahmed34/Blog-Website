
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="logo_part">
            	<div class="container">
            		<a class="logo" href="#"><img src="{{asset('public/Home/img/logo.png')}}" alt=""></a>
            	</div>
            </div>
			<div class="main_menu">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="{{asset('public/Home/img/logo.png')}}" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav">
								<li class="nav-item "><a class="nav-link" href="{{url('/')}}">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="{{url('/popular-post')}}">Popular Posts</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('About-Us')}}">About Us</a></li>
								<li class="nav-item submenu dropdown">
									<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
									<ul class="dropdown-menu">
										@php
										$qry=DB::table('categories')->where('is_deleted',0)->get();
										
										@endphp
										@foreach($qry as $q)
										<li class="nav-item"><a class="nav-link" href="{{url('category')}}/{{$q->category_slug}}">{{$q->category_name}}</a></li>
										@endforeach
									
									</ul>
								</li> 
								<li class="nav-item"><a class="nav-link" href="{{route('Contact-Us')}}">Contact</a></li>
							</ul>
						</div> 
					</div>
				</nav>
			</div>
        </header>

        
        <!--================Header Menu Area =================-->

  @yield('content')
	@yield('footer')