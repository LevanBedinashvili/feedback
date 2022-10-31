@extends('guestLayout.app')
@section('content')
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../../assets/images/banners/banner2.jpg" style="background: url(&quot;../../assets/images/banners/banner2.jpg&quot;) center center;">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">ბლოგები</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                <!--Add Lists-->
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="row no-gutters blog-list-1">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="item7-card-img ">
                                        <a href="{{ route('openblog', $blog->id) }}"></a>
                                        <img src="{{ asset('feedback/storage/app/public/'.$blog->image ) }}" alt="img" class="cover-image">
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-12">
                                    <div class="card-body">
                                        <div class="item7-card-desc d-flex mb-1">
                                            <a><i class="fa fa-calendar-o text-muted mr-2"></i>{{ $blog->date }}</a>
                                            <a><i class="fa fa-user text-muted mr-2"></i>{{ $blog->users->fname }} {{ $blog->users->lname }}</a>
                                        </div>
                                        <a href="{{ route('openblog', $blog->id) }}" class="text-dark"><h4 class="font-weight-semibold mb-4">{{ $blog->title }}</h4></a>
                                        <p class="mb-1">{!! Str::limit($blog->text, 50, '...') !!}
                                        </p>
                                        <a href="{{ route('openblog', $blog->id) }}" class="btn btn-primary btn-sm mt-4">სრულად</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--/Add Lists-->
        </div>
    </div>
</section>
<br>
@endsection
