@extends('guestLayout.app')
@section('content')
<!--Breadcrumb-->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">{{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcrumb-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!--Add Lists-->
                <div class=" mb-0">
                    <div class="">
                        <div class="item2-gl ">

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-11">
                                    @foreach ($subjects as $subject)
                                    <div class="card overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="{{ route('opensubject' , $subject->id) }}"></a>
                                                    <img data-src="{{ asset('feedback/storage/app/public/'.$subject->image) }}"
                                                        style="object-fit:contain; height:234px;" alt="feedback კომპანია" class="cover-image"
                                                        src="{{ asset('feedback/storage/app/public/'.$subject->image) }}">
                                                </div>

                                            </div>
                                            <div class="card border-0 mb-0">
                                                <div class="card-body ">
                                                    <div class="item-card9">
                                                        <a href="{{ route('opensubject' , $subject->id) }}">{{ $subject->segment->name }} ( {{ $subject->category->name }} ) </a>
                                                        <a href="{{ route('opensubject' , $subject->id) }}" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">{{ $subject->fname }}</h4>
                                                        </a>
                                                        <div class="mb-0 item-user">
                                                            <h6><span class="font-weight-semibold"><i
                                                                        class="fa fa-phone mr-2  mb-2"></i></span><a
                                                                    href="tel:{{ $subject->userka->number }}"
                                                                    class="text-primary">{{ $subject->userka->number }}</a></h6>
                                                                    <h6><span class="font-weight-semibold"><i
                                                                        class="fa fa-calendar mr-2  mb-2"></i></span><a
                                                                    href="{{ route('opensubject' , $subject->id) }}"
                                                                    class="text-primary">{{ $subject->date }}</a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-4 pb-4">
                                                    <div class="item-card9-footer d-flex">
                                                        <div class="item-card9-cost">
                                                            <h4 class="text-dark font-weight-semibold mb-0 mt-0"><i
                                                                    class="icon icon-location-pin text-muted mr-1"></i>{{ $subject->address }}
                                                            </h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="center-block text-center">
                            {{ $subjects->links() }}
                        </div>
                    </div>
                </div>
                <!--/Add Lists-->
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
@endsection
