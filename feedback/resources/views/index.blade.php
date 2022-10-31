@extends('guestLayout.app')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('assets/plugins/fileuploads/css/dropify.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endpush
<!--Sliders Section-->
<section>
    <div class="banner-1 cover-image sptb-2 sptb-tab bg-background2"
        data-image-src="https://feedback.ge/background/svaneti.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white mb-7">
                    <h1 class="mb-1">FEEDBACK.GE</h1>
                    <p>დაარეგისტიტრე ნებისმიერი ბიზნეს საქმიანობა და მიიღე ჯანსაღი შეფასებები მომხმარებლების
                        მხრიდან.
                        ჩვენს საიტზე მომხმარებლების შეფასების გარდა მიიღებთ <strong>უფასო რეკლამას</strong> ჩვენს
                        სოციალურ გვერდებზე.</p>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="search-background bg-transparent">
                            <form action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="form row no-gutters ">
                                    <div class="form-group  col-xl-3 col-lg-3 col-md-12 mb-0 bg-white ">
                                        <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0"
                                            name="keyword" id="text4"
                                            placeholder="ტელეფონი, კომპანიის სახელი, სახელი გვარი">
                                    </div>
                                    <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                        <select class="test form-control border-bottom-0"
                                            name="city" data-placeholder="აირჩიეთ ქალაქი">
                                                <option  value="0">არიჩიეთ ქალაქი</option>
                                                @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}
                                                </option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                        <select class="form-control test  border-bottom-0"
                                            name="segment" id="segment" data-placeholder="აირჩიეთ სეგმენტი">
                                                <option value="0">აირჩიეთ სეგმენტი</option>
                                                @foreach ($segments as $segment)
                                                <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                        <select class="form-control test  border-bottom-0"
                                             data-placeholder="აირჩიეთ კატეგორია" id='category' name='category'>
                                                <option value="0">აირჩიეთ კატეგორია</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0" style="margin-left: auto;">
                                        <input type="submit" class="btn btn-lg btn-block btn-primary br-tl-md-0 br-bl-md-0" value="ძებნა">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</section>
<!--Sliders Section-->



<!--Latest Ads-->
<section class="sptb bg-white">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2>PREMIUM კომპანიები</h2>

        </div>
        <div id="myCarousel1" class="owl-carousel owl-carousel-icons2">

            <div class="item">
                <div class="card mb-0">
                    <div class="power-ribbon power-ribbon-top-left"><span class="bg-supervip"><i
                                class="fa fa-star"></i></span></div>
                    <div class="item-card2-img">
                        <a href="https://feedback.ge/open/21"></a>
                        <img data-src="https://feedback.ge/images/productmainphoto/5d8b227bd595e0.01006439.jpg"
                            style="height: 190px;object-fit: contain;" alt="img" class="cover-image">
                    </div>
                    <div class="card-body dcdcvip pb-0">
                        <div class="item-card2">
                            <div class="item-card2-desc">
                                <div class="item-card2-text">
                                    <a href="https://feedback.ge/open/21" class="text-dark">
                                        <h4 class="mb-0">ჭიამაია </h4>
                                    </a>
                                </div>
                                <div class="d-flex pb-0 pt-0">
                                    <a href="">
                                        <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                class="fa fa-map-marker text-danger mr-2"></i>გორი რუსთაველის ქ. 83
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="item-card2-footer ">
                            <div class="item-card2-footer-u">
                                <div class="row d-flex">
                                    <span class="review_score mr-2 badge badge-primary">5/5</span>
                                    <div class="rating-stars d-inline-flex">
                                        <div class="rating-stars-container">
                                            <!--შეფასებებიაქ -->
                                            <div class="rating-star sm"><i class="fa fa-star star-supervip"></i>
                                            </div>
                                            <div class="rating-star sm"><i class="fa fa-star star-supervip"></i>
                                            </div>
                                            <div class="rating-star sm"><i class="fa fa-star star-supervip"></i>
                                            </div>
                                            <div class="rating-star sm"><i class="fa fa-star star-supervip"></i>
                                            </div>
                                            <div class="rating-star sm"><i class="fa fa-star star-supervip"></i>
                                            </div>
                                        </div> (3 შეფასება)
                                        <!--შეფასებებიაქ -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--Latest Ads-->




<!--Latest Ads-->
<section class="sptb bg-white">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2>VIP კომპანიები</h2>
        </div>
        <div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
            <div class="item">
                <div class="card mb-0">
                    <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-pink"><i
                                class="fa fa-star"></i></span></div>
                    <div class="item-card2-img">
                        <a href="https://feedback.ge/open/12"></a>
                        <img data-src="https://feedback.ge/images/productmainphoto/5d7e5b21bda0f2.88294873.jpeg"
                            style="height: 190px;object-fit: contain;" alt="img" class="cover-image">
                    </div>
                    <div class="card-body dcdcsupervip pb-0">
                        <div class="item-card2">
                            <div class="item-card2-desc">
                                <div class="item-card2-text">
                                    <a href="https://feedback.ge/open/12" class="text-dark">
                                        <h4 class="mb-0">Peradze’s Ranch / ფერაძეების რანჩო </h4>
                                    </a>
                                </div>
                                <div class="d-flex pb-0 pt-0">
                                    <a href="">
                                        <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                class="fa fa-map-marker text-danger mr-2"></i>გორი სოფელი ხიდისთავი
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="item-card2-footer ">
                            <div class="item-card2-footer-u">
                                <div class="row d-flex">
                                    <span class="review_score mr-2 badge badge-primary">5/5</span>
                                    <div class="rating-stars d-inline-flex">
                                        <div class="rating-stars-container">
                                            <!--შეფასებებიაქ -->
                                            <div class="rating-star sm"><i class="fa fa-star star-pink"></i></div>
                                            <div class="rating-star sm"><i class="fa fa-star star-pink"></i></div>
                                            <div class="rating-star sm"><i class="fa fa-star star-pink"></i></div>
                                            <div class="rating-star sm"><i class="fa fa-star star-pink"></i></div>
                                            <div class="rating-star sm"><i class="fa fa-star star-pink"></i></div>
                                        </div> (2 შეფასება)
                                        <!--შეფასებებიაქ -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Latest Ads-->


<section class="sptb bg-white">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2>ახალი დამატებული</h2>
        </div>
        <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2101px, 0px, 0px); transition: all 0.25s ease 0s; width: 4804px;">
                    @foreach ($newsubjects as $new)
                    <div class="owl-item" style="width: 275.25px; margin-right: 25px;">
                        <div class="item">
                            <div class="card mb-0">
                                <div class="item-card2-img">
                                    <a href="{{ route('opensubject', $new->id) }}"></a>
                                    <img src="{{ asset('feedback/storage/app/public/'. $new->image) }}"  style="height: 190px;object-fit: contain;" alt="img"
                                        class="cover-image">
                                </div>

                                <div class="card-body pb-0">
                                    <div class="item-card2">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="classified.html" class="text-dark">
                                                    <h5 style="font-size: 17px;"class="mb-0">{{ $new->title }}</h5>
                                                </a>
                                            </div>
                                            <div class="d-flex pb-0 pt-0">
                                                <a href="{{ route('opensubject', $new->id) }}">
                                                    <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                            class="fa fa-calendar text-danger mr-2"></i>{{ $new->date }}
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="d-flex pb-0 pt-0">
                                                <a href="{{ route('opensubject', $new->id) }}">
                                                    <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                            class="fa fa-home text-danger mr-2"></i>{{ $new->address }}
                                                    </p>
                                                </a>
                                            </div>
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
        <br>
    </div>
</section>
<!--Latest Ads-->

<!--Latest Ads-->
<section class="sptb bg-white">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2>შემთხვევითი</h2>
        </div>
        <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2101px, 0px, 0px); transition: all 0.25s ease 0s; width: 4804px;">
                    @foreach ($randsubjects as $rand)
                    <div class="owl-item" style="width: 275.25px; margin-right: 25px;">
                        <div class="item">
                            <div class="card mb-0">
                                <div class="item-card2-img">
                                    <a href="{{ route('opensubject', $rand->id) }}"></a>
                                    <img src="{{ asset('feedback/storage/app/public/'. $rand->image) }}"  style="height: 190px;object-fit: contain;" alt="img"
                                        class="cover-image">
                                </div>

                                <div class="card-body pb-0">
                                    <div class="item-card2">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="classified.html" class="text-dark">
                                                    <h5 style="font-size: 17px;"class="mb-0">{{ $rand->title }}</h5>
                                                </a>
                                            </div>
                                            <div class="d-flex pb-0 pt-0">
                                                <a href="{{ route('opensubject', $rand->id) }}">
                                                    <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                            class="fa fa-calendar text-danger mr-2"></i>{{ $rand->date }}
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="d-flex pb-0 pt-0">
                                                <a href="{{ route('opensubject', $rand->id) }}">
                                                    <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                            class="fa fa-home text-danger mr-2"></i>{{ $rand->address }}
                                                    </p>
                                                </a>
                                            </div>
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
        <br>
    </div>
</section>

<section class="sptb bg-white">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2>ფიზიკური პირები</h2>
        </div>
        <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2101px, 0px, 0px); transition: all 0.25s ease 0s; width: 4804px;">
                    @foreach ($users as $user)
                    <div class="owl-item" style="width: 275.25px; margin-right: 25px;">
                        <div class="item">
                            <div class="card mb-0">
                                <div class="item-card2-img">
                                    <a href="{{ route('profile', $user->id) }}"></a>
                                    <img src="{{ asset('feedback/storage/app/public/'. $user->avatar) }}"  style="height: 190px;object-fit: contain;" alt="img"
                                        class="cover-image">
                                </div>

                                <div class="card-body pb-0">
                                    <div class="item-card2">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="classified.html" class="text-dark">
                                                    <h5 style="font-size: 17px;"class="mb-0">{{ $user->fname }} {{ $user->lname }}</h5>
                                                </a>
                                            </div>
                                            <div class="d-flex pb-0 pt-0">
                                                <a href="{{ route('profile', $user->id) }}">
                                                    <p class="pb-0 pt-0 mb-2 mt-2"><i
                                                            class="fa fa-birthday-cake text-danger mr-2"></i>{{ $user->age }}
                                                    </p>
                                                </a>
                                            </div>
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
        <br>
    </div>
</section>
@push('js')
<script type='text/javascript'>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
   $('#segment').change(function(){

      var id = $(this).val();

      $('#category').find('option').not(':first').remove();

      $.ajax({
        url: 'getProffesion/'+id,
        type: 'get',
        dataType: 'json',
        success: function(response){

          var len = 0;
          if(response['data'] != null){
             len = response['data'].length;
          }

          if(len > 0){
             // Read data and create <option >
             for(var i=0; i<len; i++){

                var id = response['data'][i].id;
                var name = response['data'][i].name;

                var option = "<option value='"+id+"'>"+name+"</option>";

                $("#category").append(option);
             }

          }

        }
      });
   });
});
</script>
<script>
    $(document).ready(function(){
     // Initialize select2
     $(".test").select2();

     // Read selected option
     $('#but_read').click(function(){
       var selectedoption = $('.test option:selected').text();
       var id = $('.test').val();

       $('#result').html("id : " + id + ", name : " + selectedoption);

     });
    });
</script>
<!--- select js ----->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endpush
@endsection
