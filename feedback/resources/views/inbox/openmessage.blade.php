@extends('guestLayout.app')
@section('content')
<!--Breadcrumb-->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">ჩემი პროფილი</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcrumb-->

<!--User Dashboard-->
<section class="sptb">
    <div class="container">
        <div class="row">
            @include('guestLayout.sidebar')
            <div class="col-xl-9 col-lg-12 col-md-12">
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card-body">
                                    <div class="d-flex">
                                        @if(Auth::user()->id == $msg->reciver_id)
                                            @if($msg->user->avatar == NULL)
                                            <div class="fb-user-thumb">
                                                <img src="{{ asset('assets/images/faces/male/profile.png') }}" alt=""
                                                    class="avatar brround avatar-md">
                                            </div>
                                            @else
                                            <div class="fb-user-thumb">
                                                <img src="{{ asset('feedback/storage/app/public/'.$msg->user->avatar) }}" alt=""
                                                    class="avatar brround avatar-md">
                                            </div>
                                            @endif
                                            <div class="ml-2">
                                                <h5 class="mb-1 font-weight-semibold"><a href="#" class="#"> {{ $msg->user->fname }} {{ $msg->user->lname }} </a></h5>
                                                <p>From: {{ $msg->user->email }}</p>
                                                <br>
                                            </div>
                                        @else
                                            <div class="fb-user-thumb">
                                                <img src="{{ asset('feedback/storage/app/public/'.$msg->reciver->avatar) }}" alt=""
                                                    class="avatar brround avatar-md">
                                            </div>

                                            <div class="ml-2">
                                                <h5 class="mb-1 font-weight-semibold"><a href="#" class="#"> {{ $msg->reciver->fname }} {{ $msg->reciver->lname }}</a></h5>
                                                <p>To: {{ $msg->reciver->email }}</p>
                                                <br>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="clearfix"></div>
                                    <p class="fb-user-status">{{ $msg->title }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
