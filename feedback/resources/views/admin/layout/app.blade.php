
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
<title>ადმინისტრატორი 12.3</title>		<link rel="stylesheet" href="{{asset('')}}assets/fonts/fonts/font-awesome.min.css">

		<!-- Font Family-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">


		<!-- Bootstrap Css -->
		<link href="{{asset('assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/css/admin-custom.css')}}" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="{{asset('assets/plugins/toggle-sidebar/sidemenu.css')}}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/plugins/iconfonts/icons.css')}}" rel="stylesheet" />

	</head>
	<body class="app sidebar-mini">

		<div id="global-loader">
			<img src="../assets/images/products/products/loader.png" class="loader-img floating" alt="">
		</div>

		<div class="page">
			<div class="page-main">
				                <div class="app-header1 header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="{{ route('admin.home') }}">
								<img src="{{asset('assets/images/brand/logo1.png')}}" class="header-brand-img" alt="Claylist logo">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="header-navicon">
								<a href="#" data-toggle="search" class="nav-link d-lg-none navsearch-icon">
									<i class="fa fa-search"></i>
								</a>
							</div>
							<div class="header-navsearch">
								<a href="#" class=" "></a>
								<form class="form-inline mr-auto">
									<div class="nav-search">
										<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" >
										<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
									</div>
								</form>
							</div>
							<div class="d-flex order-lg-2 ml-auto">

								<div class="dropdown">
									<a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                                        <img src="{{ asset('assets/images/faces/male/admin-settings-male.png') }}" alt="user-img" style="width: 50px; height: 50px">
                                    </a>

									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">

										<a class="dropdown-item" href="editprofile.html">
											<i class="dropdown-icon  icon icon-settings"></i> Account Settings
										</a>
										<a class="dropdown-item" href="{{ route('admin.logout') }}">
											<i class="dropdown-icon icon icon-power"></i> გასვლა
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div>
								<img src="{{ asset('assets/images/faces/male/admin-settings-male.png') }}" alt="user-img" class="avatar avatar-lg brround">
								<a href="editprofile.html" class="profile-img">
									<span class="fa fa-pencil" aria-hidden="true"></span>
								</a>
							</div>
							<div class="user-info">
								<h2>ADMINISTRATOR</h2>
								<span>FEEDBACK.GE</span>
							</div>
						</div>
					</div>
					<ul class="side-menu">

                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">კატეგორია</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="{{ route('admin.category.index') }}" class="slide-item">კატეგორიების სია</a>
								</li>
                                <li>
									<a href="{{ route('admin.category.create') }}" class="slide-item">კატეგორიის დამატება</a>
								</li>
							</ul>
						</li>

                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">ქალაქები</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="{{ route('admin.citylist') }}" class="slide-item">ქალაქების სია</a>
								</li>
                                <li>
									<a href="{{ route('admin.addcity') }}" class="slide-item">ქალაქის დამატება</a>
								</li>
							</ul>
						</li>

                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">მომხმარებელი</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="{{ route('admin.users.list') }}" class="slide-item">მომხმარებლის სია</a>
								</li>
							</ul>
						</li>

                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">სუბიექტები</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="{{ route('admin.subjectapproval') }}" class="slide-item">დასადასტურებელი</a>
								</li>
                                <li>
									<a href="{{ route('admin.subjectapproved') }}" class="slide-item">დადასტურებული</a>
								</li>
							</ul>
						</li>

                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">სტატიები</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="{{ route('admin.blogapproval') }}" class="slide-item">დასადასტურებელი</a>
								</li>
                                <li>
									<a href="{{ route('admin.blogapproved') }}" class="slide-item">დადასტურებული</a>
								</li>
							</ul>
						</li>

                        <li class="slide">
							<a class="side-menu__item"  href="{{ route('admin.Contact.edit' , 1) }}"><i class="side-menu__icon fa fa-user"></i>კონტაქტი</a>

						</li>

					</ul>

					<div class="app-sidebar-footer">
						<a href="emailservices.html">
							<span class="fa fa-envelope" aria-hidden="true"></span>
						</a>
						<a href="profile.html">
							<span class="fa fa-user" aria-hidden="true"></span>
						</a>
						<a href="editprofile.html">
							<span class="fa fa-cog" aria-hidden="true"></span>
						</a>
						<a href="login.html">
							<span class="fa fa-sign-in" aria-hidden="true"></span>
							</a>
						<a href="chat.html">
							<span class="fa fa-comment" aria-hidden="true"></span>
						</a>
					</div>
				</aside>
                @yield('content')
			</div>

						<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © {!! Date('Y') !!}
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>


		<!-- Dashboard Core -->
		<script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/selectize.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
		<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Counters -->
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>

		<!-- Fullside-menu Js-->
		<script src="{{asset('assets/plugins/toggle-sidebar/sidemenu.js')}}"></script>

		<!-- CHARTJS CHART -->
		<script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

		<!-- Custom scroll bar Js-->
		<script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- ECharts Plugin -->
		<script src="{{asset('assets/plugins/echarts/echarts.js')}}"></script>
		<script src="{{asset('assets/plugins/echarts/echarts.js')}}"></script>
		<script src="{{asset('assets/js/index1.js"')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('')}}assets/js/admin-custom.js"></script>

	</body>
</html>
