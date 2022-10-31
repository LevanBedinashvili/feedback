@extends('guestLayout.app')
@section('content')
		<!--Breadcrumb-->
		<div>
			<div class="bannerimg cover-image bg-background3" data-image-src="../../assets/images/banners/banner2.jpg">
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white ">
							<h1 class="">კონტაქტი</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Breadcrumb-->

		<!--Contact-->
		<div class="sptb bg-white mb-0 pb-0">
			<div class="container">
                <!-- შეტყობინება -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
                @endif
                <br>
                <br>
				<div class="row">
				    <div class="col-lg-5 col-xl-4  col-md-12  d-block mb-7">
					    <div class="section-title center-block text-center">
							<h2>საკონტაქტო ინფორმაცია</h2>
						</div>
                        <br>
						<div class="row text-white">
							<div class="col-12 mb-5">
								<div class="support-service bg-primary br-2 mb-4 mb-xl-0">
									<i class="fa fa-phone"></i>
									<h6>+995 {{ $providerContact->tel_nomeri }}</h6>
									<P>უფასო მხარდაჭერა!</P>
								</div>
							</div>
							<div class="col-12 mb-5">
								<div class="support-service bg-secondary br-2 mb-4 mb-xl-0">
									<i class="fa fa-home"></i>
									<h6>{{ $providerContact->address }}</h6>
									<p>მისამართი!</p>
								</div>
							</div>
							<div class="col-12">
								<div class="support-service bg-warning br-2">
									<i class="fa fa-envelope-o"></i>
									<h6>{{ $providerContact->email }}</h6>
									<p>საკონტაქტო მეილი!</p>
								</div>
							</div>
						</div>
					</div>
				    <div class="col-lg-7 col-xl-8 col-md-12 d-block ">
						<div class="single-page" >
							<div class="col-lg-12  col-md-12 mx-auto d-block">
							    <div class="section-title center-block text-center">
									<h2>მოგვწერე</h2>
								</div>
                                 <br>
								<div class="wrapper wrapper2">
									<div class="card mb-0">
                                        <form action="{{ route('submitContact') }}" method="post">
                                            @csrf
										<div class="card-body">
											<div class="form-group">
												<input type="text" class="form-control" name="name" placeholder="სახელი">
											</div>
											<div class="form-group">
												<input type="email" class="form-control" name="email" placeholder="ელ.ფოსტა">
											</div>
                                            <div class="form-group">
												<input type="text" class="form-control" name="subject" placeholder="თემა">
											</div>
											<div class="form-group">
												<textarea class="form-control" name="text" rows="6" placeholder="ტექსტი"></textarea>
											</div>
											<input type="submit" value="გაგზავნა" class="btn btn-primary">
										</div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Contact-->
<br>
@endsection
