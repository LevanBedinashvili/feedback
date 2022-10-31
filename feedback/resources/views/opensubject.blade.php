@extends('guestLayout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Breadcrumb-->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">{{ $opensubject->category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcrumb-->



<!--Add listing-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">

                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="item-det mb-4">
                            <a href="#" class="text-dark">
                                <h3>{{ $opensubject->title }}</h3>
                            </a>
                            <div class=" d-flex">
                                <ul class="d-flex mb-0">
                                    <li class="mr-5"><a href="#" class="icons"><i
                                                class="icon icon-briefcase text-muted mr-1"></i>
                                            {{ $opensubject->category->name }}</a></li>
                                    <li class="mr-5"><a href="#" class="icons"><i
                                                class="icon icon-location-pin text-muted mr-1"></i>
                                            {{ $opensubject->address }}</a></li>
                                    <li class="mr-5"><a href="#" class="icons"><i
                                                class="icon icon-calendar text-muted mr-1"></i>{{ $timeago }}</a></li>
                                    @if($countedstar == 0)
                                    <span style="color:#ec296b;">შეფასება არაქვს</span>
                                    @elseif($countedstar >= 1 AND $countedstar < 2)
                                    <li class="">
                                        <!--შეფასებებიაქ -->
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star-o star-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <!--შეფასებებიაქ -->
                                        {{ $countedstar }}

                                    </li>
                                    @elseif($countedstar >= 2 AND $countedstar < 3)
                                    <li class="">
                                        <!--შეფასებებიაქ -->
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <!--შეფასებებიაქ -->
                                        {{ $countedstar }}
                                    </li>
                                    @elseif($countedstar >= 3 AND $countedstar < 4)
                                    <li class="">
                                        <!--შეფასებებიაქ -->
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <!--შეფასებებიაქ -->
                                        {{ $countedstar }}
                                    </li>
                                    @elseif($countedstar >= 4 AND $countedstar < 5)
                                    <li class="">
                                        <!--შეფასებებიაქ -->
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star-o star-warning"aria-hidden="true"></i>
                                        <!--შეფასებებიაქ -->
                                        {{ $countedstar }}
                                    </li>
                                    @elseif($countedstar == 5.0)
                                    <li class="">
                                        <!--შეფასებებიაქ -->
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <i class="fa fa-star star-warning"></i>
                                        <!--შეფასებებიაქ -->
                                        {{ $countedstar }}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active"> <img
                                            src="{{ asset('feedback/storage/app/public/'. $opensubject->image) }}"
                                            alt="img"> </div>
                                    @foreach ($images as $image)
                                    <div class="carousel-item"> <img
                                            src="{{ asset('feedback/storage/app/'. $image->image) }}" alt="img"> </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </a>
                                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="clearfix">
                                <div id="thumbcarousel" class="carousel slide" data-interval="false">

                                    <a class="carousel-control-prev" href="#thumbcarousel" role="button"
                                        data-slide="prev">
                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#thumbcarousel" role="button"
                                        data-slide="next">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @auth

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            თქვენი აზრი მნიშვნელოვანია! შეაფასეთ "{{ $opensubject->fname }}" !
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="rating-stars block" id="rating">
                            <div class="rating-stars-container">
                                <div id="star-1" class="rating-star btn-1">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div id="star-2" class="rating-star btn-2">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div id="star-3" class="rating-star btn-3">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div id="star-4" class="rating-star btn-4">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div id="star-5" class="rating-star btn-5">
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">აღწერა</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">

                            <p>{!! $opensubject->desc_ka !!}<p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="icons">
                            <div class="fb-share-button" data-href="https://feedback.ge/open/41"
                                data-layout="button_count" data-size="large"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=https://feedback.ge/open/41"
                                    class="fb-xfbml-parse-ignore">გაზიარება</a></div>
                        </div>
                    </div>
                </div>
                <!--/Add Description-->


                @if($opensubject->youtube != NULL)
                <!-- Youtube ვიდეოო -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Youtube ვიდეო</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <iframe src="https://www.youtube.com/embed/{{ $opensubject->youtube }}" allowfullscreen=""
                                height="400" style="width:100%"></iframe>
                        </div>

                    </div>
                </div>
                @endif


                <div class="card">
                    <div class="card-header">
                        <div class="media-heading">
                            <h3 class="card-title mb-3 font-weight-bold">Facebook კომენტარები:</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fb-comments" data-href="http://localhost/feeedback/opnesubject/{{ $opensubject->id }}" data-width="100%" data-numposts="10"></div>
                    </div>
                </div>
            </div>

            <!--Right Side Content-->
            <div class="col-xl-4 col-lg-4 col-md-12 RightSidebar">

                <div class="card order-last">
                    <div class="card-header">
                        <h3 class="card-title">პასუხისმგებელი</h3>
                    </div>
                    <div class="card-body  item-user">
                        <div class="profile-pic mb-0">
                            <img data-src="{{ asset('feedback/storage/app/public/'. $opensubject->userka->avatar) }}"
                                src="{{ asset('feedback/storage/app/public/'. $opensubject->userka->avatar) }}"
                                class="brround avatar-xxl" style="object-fit:cover;" alt="user">
                            <div class="">
                                <a href="{{ route('profile' , $opensubject->userka->id) }}" target="_blank">
                                    <h4 class="mt-3 mb-1 font-weight-semibold">{{  $opensubject->userka->fname }}
                                        {{  $opensubject->userka->lname }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body item-user">
                        <h4 class="mb-4">კონტაქტი</h4>
                        <div>
                            <h6><span class="font-weight-semibold"><i class="fa fa-envelope mr-2 mb-2"></i></span><a
                                    class="text-body">{{ $opensubject->userka->email }}</a></h6>
                            <h6><span class="font-weight-semibold"><i class="fa fa-phone mr-2  mb-2"></i></span><a
                                    class="text-body">{{ $opensubject->userka->number }}</a></h6>
                                    @if($opensubject->company_web != NULL)
                            <h6><span class="font-weight-semibold"><i class="fa fa-link mr-2 "></i></span><a
                                    href="{{ $opensubject->company_web }}" target="_blank"
                                    class="text-body">{{ $opensubject->company_web }}</a></h6>
                                    @endif
                        </div>
                        @if ($opensubject != Null)
                        <div class=" item-user-icons mt-4">
                            <a href="{{ $opensubject->facebook }}" target="_blank" class="facebook-bg mt-0"><i
                                    class="fa fa-facebook"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="text-left">
                            <a href="#" data-toggle="modal" data-target="#LoginModal" class="btn  btn-info"><i
                                    class="fa fa-envelope"></i> მომწერე</a>

                        </div>
                    </div>
                </div>



            </div>
            <!--Right Side Content-->
        </div>
    </div>
</section>

<a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>





@push('js')
<script type='text/javascript'>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.rating-star').click(function () {
            var stars = $(this).attr('id');
            stars = stars.replace('star-', '');
            var user_id = '{{  $opensubject->userka->id }}';
            var subject_id = '{{  $opensubject->id }}';
            var url = "{{ route('subject.rateSys') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    user_id: user_id,
                    subject_id: subject_id,
                    stars: stars
                },
                success: function (data) {

                }
            });
        });
    });

</script>
@endpush
@endsection
