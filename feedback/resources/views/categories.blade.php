@extends('guestLayout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--Breadcrumb-->
<div>
    <div class="bannerimg cover-image bg-background3" data-image-src="../../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1 class="">კატეგორიები</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Breadcrumb-->

<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">კატეგორიები</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-body border mb-5">
                                    <div class="cat-title">
                                        <a href="#" class="text-dark">
                                            <h3 class="card-title mb-3"><i class="fa fa-building"></i> კომპანიები</h3>
                                        </a>
                                    </div>
                                    <ul class="list-unstyled widget-spec  p-1">

                                        @foreach ($kompaniebi as $company)
                                        <li class="">
                                            <a href="{{ route('opencategory', $company->id) }}" class="text-dark"><i
                                                    class="fa fa-arrow-right text-primary"></i>{{ $company->name }}</a>
                                        </li>
                                        @endforeach


                                        </span>


                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card-body border mb-5">
                                    <div class="cat-title">
                                        <a href="#" class="text-dark">
                                            <h3 class="card-title mb-3"><i class="fa fa-briefcase"></i> მეწარმე</h3>
                                        </a>
                                    </div>
                                    <ul class="list-unstyled widget-spec  p-1">

                                        @foreach ($medicina as $med)
                                        <li class="">
                                            <a href="{{ route('opencategory', $med->id) }}" class="text-dark"><i
                                                    class="fa fa-arrow-right text-primary"></i>{{ $med->name }}</a>
                                        </li>
                                        @endforeach

                                        </span>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card-body border mb-5">
                                    <div class="cat-title">
                                        <a href="#" class="text-dark">
                                            <h3 class="card-title mb-3"><i class="fa fa-user-md"></i> მედიცინა</h3>
                                        </a>
                                    </div>
                                    <ul class="list-unstyled widget-spec  p-1">


                                        @foreach ($mewarme as $mew)
                                        <li class="">
                                            <a href="{{ route('opencategory', $mew->id) }}" class="text-dark"><i
                                                    class="fa fa-arrow-right text-primary"></i>{{ $mew->name }}</a>
                                        </li>
                                        @endforeach

                                        </span>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>

@endsection
