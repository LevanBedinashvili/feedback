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
            <div class="d-block mx-auto col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="item7-card-img">
                            <img src="{{ asset('feedback/storage/app/public/'.$openblog->image ) }}" alt="img" class="w-100">
                        </div>
                        <div class="item7-card-desc d-flex mb-2 mt-3">
                            <a><i class="fa fa-calendar-o text-muted mr-2"></i>{{ $openblog->date }}</a>
                            <a href="{{ route('profile', $openblog->user_id) }}"><i class="fa fa-user text-muted mr-2"></i>{{ $openblog->users->fname }} {{ $openblog->users->lname }}</a>
                        </div>
                        <a href="#" class="text-dark"><h2 class="font-weight-semibold">{{ $openblog->title }}</h2></a>
                        <p>{!! $openblog->text !!}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="media-heading">
                            <h3 class="card-title mb-3 font-weight-bold">Facebook კომენტარები:</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fb-comments" data-href="http://localhost/feeedback/openblog/{{ $openblog->id }}" data-width="100%" data-numposts="10"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--/Add listing-->
@endsection
