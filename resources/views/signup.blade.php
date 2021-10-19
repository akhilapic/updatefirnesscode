<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{url('/assets/images/favicon.ico')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Fitness Point </title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Custom -->
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Sign in Banner -->
	<section class="signin-banner signup-banner">
		<div class="signinheader position-relative">
			<div class="container">
				<div class="d-flex justify-content-between">
					<a href="{{url('/home')}}" class="logo"><img src="{{asset('/assets/images/logo.svg')}}" alt=""></a>

					<a href="{{url('/home')}}" class="f-16 fr white mb-0 d-inline-flex aic"><img class="mr-2" src="{{asset('/assets/images/close.svg')}}" alt="">Close</a>
				</div>
			</div>
		</div>

		<div class="signin-content position-relative">
			<div class="container">
				<div class="signin-content-col">
					<div>
						<h2 class="title f-46 fm white text-center">Sign Up</h2>
						<p class="f-18 fr white mb-0 text-center">Create Your Account</p>
						<div class="signin-field-block d-sm-flex d-block">
							<div class="col-left">
								<form action="javascript:void(0)">
									<div class="form-group form-group-transparent">
										<label class="f-16 fr white">Full Name</label>
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Enter Full Name">
										</div>
									</div>
									<div class="form-group form-group-transparent">
										<label class="f-16 fr white">Email</label>
										<div class="input-group">
											<input type="email" class="form-control" placeholder="Enter Email Address">
										</div>
									</div>
									<div class="form-group form-group-transparent">
										<label class="f-16 fr white">Mobile Number</label>
										<div class="input-group input-group-inline">
											<input type="text" class="form-control mobilecode" placeholder="+966">
											<input type="text" class="form-control" placeholder="Enter Mobile Number">
										</div>
									</div>
									<div class="form-group form-group-transparent">
										<label class="f-16 fr white">Password</label>
										<div class="input-group">
											<input type="password" class="form-control" placeholder="Enter Password">
											<span class="icon-right fii-eye"></span>
										</div>
									</div>

									<button type="submit" class="btn btn-xs btn-primary mt-3">Sign Up</button>
								</form>
							</div>
	
							<div class="col-middle">
								<div class="middle-inner d-flex aic jcc h-100">
									<span class="or-text">Or</span>
								</div>
							</div>
	
							<div class="col-right">
								<div class="d-flex flex-column h-100 justify-content-center">
									<div class="mb-4 order-sm-1 order-2">
										<a href="#" class="social-btn fb-btn d-flex aic"><img src="{{url('/assets/images/fb-btn-img.svg')}}" alt="">Sign In with Facebook</a>
										<a href="#" class="social-btn googleplus-btn d-flex aic"><img src="{{url('/assets/images/googleplsu-btn-img.svg')}}" alt="">Sign In with Google</a>
									</div>
	
									<p class="f-16 flight gray-600 order-sm-2 order-1 mb-sm-0 mb-5 text-sm-left text-center">Already have an account? <a href="{{url('/signin')}}" class="fm white"> Sign In </a></p>
								</div>
							</div>
						</div>
					</div>

					<div class="note-text w-100 mx-auto">
						<p class="f-16 fr white text-center mb-0">
							* By Signing Up, you agree to our <a href="#"> Terms of Conditions</a> and to receive Fitness Storm emails & 
							updates and acknowledge that you read our <a href="#">Privacy Policy</a> .
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>



    <!-- Scripts -->
	<script src="{{url('/assetsjs/jquery.min.js')}}"></script>

	<!-- Bootstrap -->
	<script src="{{url('/assets/js/popper.min.js')}}"></script>
	<script src="{{url('/assets/js/bootstrap.min.js')}}"></script>

	<!-- Owl Carousel -->
	<script src="{{url('/assets/js/owl.carousel.min.js')}}"></script>

	<!-- Select 2 Js -->
	<script src="{{url('/assets/js/select2.min.js')}}"></script>

	<!-- Slick slider -->
	<script src="{{url('/assets/js/slick.js')}}"></script>

	<!-- Custom Js -->
	<script src="{{url('/assets/js/custom.js')}}"></script>

</body>

</html>