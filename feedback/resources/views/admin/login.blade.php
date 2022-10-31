
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-TileColor" content="#0f75ff">
	<meta name="theme-color" content="#9d37f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Title -->
	<title>ადმინისტრატორი</title>
	<link rel="stylesheet" href="{{ asset('assets/fonts/fonts/font-awesome.min.css') }}">

	<!-- Bootstrap Css -->
	<link href="{{asset('assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="{{asset('assets/plugins/toggle-sidebar/sidemenu.css')}}" rel="stylesheet" />


	<!-- Dashboard css -->
	<link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/admin-custom.css')}}" rel="stylesheet" />

	<!-- c3.js Charts Plugin -->
	<link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

	<!---Font icons-->
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

</head>
	<body class="construction-image">
		<!--Loader-->
		<div id="global-loader">
			<img src="{{asset('assets/images/products/products/loader.png')}}" class="loader-img floating" alt="">
		</div>

		<!--Page-->
		<div class="page ">
			<div class="page-content z-index-10">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
							<div class="card mb-0">
								<div class="card-header">
									<h3 class="card-title">ავტორიზაცია</h3>
								</div>
								<form action="{{ route('admin.check') }}" method="POST">
									@csrf
									<div class="card-body">
										<div class="form-group">
                                            @if (Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                            </div>
                                        @endif
											<label class="form-label text-dark">ელ.ფოსტა</label>
											<input type="email" name="email" class="form-control" placeholder="ელ.ფოსტა">
                                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
										</div>
										<div class="form-group">
											<label class="form-label text-dark">პაროლი</label>
											<input type="password" name="password" class="form-control"  placeholder="პაროლი">
										</div>
										<div class="form-footer mt-2">
											<button class="btn btn-primary btn-block">ავტორიზაცია</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Dashboard js -->
		<script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/selectize.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<!-- Custom scroll bar Js-->
		<script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>




		<!--Counters -->
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>


		<!-- Custom Js-->
		<script src="{{asset('assets/js/admin-custom.js')}}"></script>

	</body>
</html>
