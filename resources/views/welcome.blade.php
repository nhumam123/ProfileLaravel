<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Nhumam123</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>

        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item bold"><a class="nav-link" href="#home">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="#about">About</a></li>
								<li class="nav-item"><a class="nav-link" href="#education">Educations</a>
								<li class="nav-item"><a class="nav-link" href="#experiences">Experiences</a></li>
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section id="home" class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="home_left_img">
								<img src="{{ asset('storage/profiles/' . $profile->profile_image_path) }}" alt="Existing Image" class="img-thumbnail" >
							</div>
						</div>
						<div class="col-lg-6">
                            <div class="banner_content">
								<h5>This is me</h5>
								<h2>{{ $profile->name ?? 'No Name Available!' }}</h2>
								<p>{{ $profile->expertise ?? ''}}</p>
								<a class="banner_btn" href="#">Discover Now</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Welcome Area =================-->
        <section id="about" class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>About Myself</h4>
        					<p>{{ $profile->summary ?? 'No Summary Available!' }}</p>
        					<div class="row">
        						<div class="col-md-12">
        							<div class="wel_item">
        								<i class="lnr lnr-users"></i>
        								<h5>Contact</h5>
        								<p><b>email:</b>{{ $profile->email }}</p>
                                        <p><b>contact number: </b>{{ $profile->contact_number }}</p>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-6">
                    <!--================ Skills Area =================-->
        				<div class="tools_expert">
        					<h3>Skills</h3>
        					<div class="skill_main">
                                @if(count($skills) > 0)
                                    @foreach ($skills as $skill)
                                        <div class="skill_item">
                                            <h4>{{ $skill->name }} <span class="counter">{{ $skill->value }}</span>%</h4>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->value }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>Empty</h4>
                                @endif
                            </div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->

        <!--================Education Area =================-->
        <section id="education" class="feature_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Educations</h2>
        			<p></p>
        		</div>
        		<div class="feature_inner row">
        			@foreach($education as $education)
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item text-center">
                            @if($education->education_logo)
                                <img src="{{ asset('storage/uploads/education_logos/' . $education->education_logo) }}" alt="Logo" style="max-height: 150px;">
                            @else
                                <i class="flaticon-city"></i>
                            @endif
                            <h4>{{ $education->institution_name }}</h4>
                            <p>{{ $education->field_of_study }}</p>
                            <p>{{ date('F Y', strtotime($education->start_date)) }} - {{ date('F Y', strtotime($education->end_date)) }}</p>
                        </div>

                    </div>
                    @endforeach
        		</div>
        	</div>
        </section>
        <!--================End Education Area =================-->

        <!--================Experience Area =================-->
        <section id="experiences" class="project_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Experiences</h2>
                    <p></p>
                </div>
                <div class="feature_inner row">
                    @foreach($experience as $experience)
                    <div class="col-12">
                        <div class="wel_item">
                            <h4>{{ $experience->title }}</h4>
                            <h5>{{ $experience->subtitle }}</h5>
                            <p>{{ date('F Y', strtotime($experience->start_date)) }} - {{ date('F Y', strtotime($experience->end_date)) }}</p>
                            <hr>
                            <p>{{ $experience->paragraph }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================End Experience Area =================-->
        <!--================Footer Area =================-->
        <footer class="footer_area p-5">
            <div class="container">
                <p class="text-center mb-0">Naufal Humam Risqullah Pujianputra - 2502010585</p>
            </div>
        </footer>
        <!--================End Footer Area =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
