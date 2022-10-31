@extends('guestLayout.app')
@section('content')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lg-fb-comment-box.min.css" integrity="sha512-JeQRe3W6dq6H+AAnkomgU8XWGCTM53GmkoYb/R8nmHNOk8xWLwt8bzQmT2cr1Ra0I/WaSTiBOmQOkj7iHXi//w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lg-transitions.min.css" integrity="sha512-/kdQdrZJ0rc181QhzXU6oIknhyr5NIuZlv4VzvhdDsiEzEbW9mckFGTqat8CM8FlGDCHMMUYity1gXIgjHJ58A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!--Breadcrumb-->
<div class="hidden-md d-none d-lg-block">
    <section>
        <div class="bannerimg cover-image bg-background3"
            data-image-src="{{ asset('feedback/assets/images/products/products/img04.jpg') }}">
        </div>
    </section>
</div>
<!--/Breadcrumb-->

<!--User Profile-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pattern-1">
                        <div class="wideget-user">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="wideget-user-desc text-center">
                                        <div class="wideget-user-img" id="changeImage">
                                            @if (!empty($user->avatar))
                                            <img class="brround" src="{{ asset('feedback/storage/app/public/'. $user->avatar) }}" style="width:150px;height:150px;object-fit:cover" alt="img">
                                            @else

                                            <img class="brround" src="{{ asset('assets/images/faces/male/profile.png') }}" style="width:150px;height:150px;object-fit:cover" alt="img">
                                            @endif

                                        </div>
                                        <div class="user-wrap wideget-user-info">
                                            <a href="#" class="text-white">
                                                <h4 class="font-weight-semibold">{{ $user->fname}} {{  $user->lname }}</h4>
                                            </a>
                                            <div class="wideget-user-rating">

                                                <!--შეფასებებიაქ -->


                                                <!--შეფასებებიაქ -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="wideget-user-tab">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    <ul class="nav">
                                        <li class=""><a href="#tab-5" onclick="goToDiv();" class="active"
                                                data-toggle="tab">პროფილი</a></li>
                                        <li><a href="#tab-9" data-toggle="tab"
                                                class="">გალერეა</a></li>
                                        <li><a href="#tab-7" onclick="goToDiv();" data-toggle="tab" class="">სუბიექტები
                                                <span class="badge badge-primary badge-pill"></span></a></li>
                                        <li><a href="#" data-toggle="modal" @if (Auth::check()) data-target="#contact" @else data-target="#LoginModal" @endif><i class="fa fa-envelope"></i> მომწერე</a>
                                        @if (Auth::check())
                                            @if ($user->id == Auth::user()->id)
                                                <li><a href="{{ route('editprofile', Auth::user()->id) }}" style="color: red;">პროფილის რედაქტირება</a></li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="card mb-0" id="scrollhere">
                    <div class="card-body">
                        <div class="border-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-5">
                                    <div class="profile-log-switch">
                                        <div class="media-heading">
                                            <h3 class="card-title mb-3 font-weight-bold">პერსონალური ინფორმაცია</h3>
                                        </div>
                                        <ul class="usertab-list mb-0">
                                            <li><a href="#" class="text-dark"><i class="fa fa-address-card"></i><span
                                                        class="font-weight-semibold"> სახელი :</span> {{ $user->fname }} {{ $user->lname }}</a></li>
                                            <li><a href="#" class="text-dark"><i class="fa fa-envelope"></i><span
                                                        class="font-weight-semibold"> ელ. ფოსტა :</span> {{ $user->email }}</a></li>

                                            @if($user->number_status == 1)
                                                <li><a href="#" class="text-dark"><i class="fa fa-phone"></i><span
                                                        class="font-weight-semibold"> ტელეფონი :</span> {{ $user->number }}</a>
                                            @else
                                                <li><a href="#" class="text-dark"><i class="fa fa-phone"></i><span
                                                    class="font-weight-semibold"> ტელეფონი :</span> დაფარულია</a>
                                            @endif
                                            </li>
                                            <li><a href="#" class="text-dark"><i class="fa fa-birthday-cake"></i><span
                                                        class="font-weight-semibold"> ასაკი :</span> {{ $age }}</a></li>


                                        </ul>
                                        <div class="row profie-img">

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane userprof-tab" id="tab-7">
                                    <div class="table-responsive border-top">
                                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>სურათი</th>
                                                    <th>სუბიექტი</th>
                                                    <th>კატეგორია</th>
                                                </tr>
                                            </thead>
                                            <tbody class="delete">
                                                    @if($subjects->isEmpty())
                                                    <tr>
                                                    <td colspan='5' style="text-align:center;background-color:#f5f5ba">
                                                        სუბიექტები არ მოიძებნა</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($subjects as $subject)
                                                    <tr>
                                                        <td><img src="{{ asset('feedback/storage/app/public/'. $subject->image) }}" style="object-fit:cover; width: 100px; height: 100px" alt="img"></td>
                                                        <td>{{ $subject->title }}</td>
                                                        <td>{{ $subject->category->name }}</td>
                                                    @endforeach
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane userprof-tab" id="tab-9">

                                    @if ($images->isEmpty())
                                        @if (Auth::check())
                                            @if ($user->id == Auth::user()->id)
                                                <a href="{{ route('mygallery') }}" class="btn btn-primary" style="color:white"><i class="fe fe-plus mr-2"></i>დამატება</a>
                                            @endif
                                        @endif
                                            <div class="demo-gallery galerea">
                                                <div style="width:100%" class="alert alert-danger" role="alert">
                                                    <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>ფოტოები არ მოიძებნა
                                                </div>
                                            </div>
                                    @else
                                                <div class="tab-pane userprof-tab active" id="tab-9">
                                                    <div class="col-sm-12">
                                                        @if (Auth::check())
                                                        @if ($user->id == Auth::user()->id)
                                                            <a href="{{ route('mygallery') }}" class="btn btn-primary" style="color:white"><i class="fe fe-plus mr-2"></i>დამატება</a>
                                                        @endif
                                                    @endif
                                                        <div class="demo-gallery galerea">
                                                            <ul  id="lightgallery2" class="list-unstyled row">
                                                                @foreach ($images as $image)
                                                                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('feedback/storage/app/'.$image->image) }}"data-src="{{ asset('feedback/storage/app/'.$image->image) }}">
                                                                    <a href="">
                                                                        <img class="img-responsive"
                                                                            src="{{ asset('feedback/storage/app/'.$image->image) }}"
                                                                            style="height:180px;object-fit: cover;" alt="FeedBack">
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card mb-0" id="scrollhere">
                    <div class="card-body">
                        <div class="border-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-5">
                                    <div class="profile-log-switch">
                                        <div class="media-heading">
                                            <h3 class="card-title mb-3 font-weight-bold">ჩემს შესახებ:</h3>
                                        </div>
                                        @if($user->about == NULL)
                                            <div class="demo-gallery galerea">
                                                <div style="width:100%" class="alert alert-danger" role="alert">
                                                    <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>ინფორმაცია არ მოიძებნა
                                                </div>
                                            </div>
                                        @else
                                        <p>
                                            {!! $user->about !!}
                                        </p>
                                        @endif
                                        <div class="row profie-img">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane userprof-tab" id="tab-7">
                                    <div class="table-responsive border-top">
                                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>სურათი</th>
                                                    <th>სუბიექტი</th>
                                                    <th>კატეგორია</th>
                                                </tr>
                                            </thead>
                                            <tbody class="delete">
                                                    @if($subjects->isEmpty())
                                                    <tr>
                                                    <td colspan='5' style="text-align:center;background-color:#f5f5ba">
                                                        სუბიექტები არ მოიძებნა</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($subjects as $subject)
                                                    <tr>
                                                        <td><img src="{{ asset('feedback/storage/app/public/'. $subject->image) }}" style="object-fit:cover; width: 100px; height: 100px" alt="img"></td>
                                                        <td>{{ $subject->title }}</td>
                                                        <td>{{ $subject->category->name }}</td>
                                                    @endforeach
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <div class="media-heading">
                            <h3 class="card-title mb-3 font-weight-bold">Facebook კომენტარები:</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fb-comments" data-href="http://localhost/feeedback/profile/{{ $user->id }}" data-width="100%" data-numposts="10"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Message Modal -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">მიწერე წერილი <b>{{ $user->fname }} {{ $user->lname }}</b> - ს</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <span id="responseReg"></span>
            <form action="{{ route('send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" class="form-control"  value="{{ $user->email }}" name="reciver_email" placeholder="მიმღების ელ. ფოსტა">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  name="title" placeholder="სათაური">
                </div>
                <div class="form-group mb-0">
                    <textarea class="form-control"  name="text" rows="6" placeholder="წერილი"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">გაუქმება</button>
                <button type="submit"  class="btn btn-success">წერილის გაგზავნა</button>
            </div>
            </form>

        </div>
    </div>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js" integrity="sha512-b4rL1m5b76KrUhDkj2Vf14Y0l1NtbiNXwV+SzOzLGv6Tz1roJHa70yr8RmTUswrauu2Wgb/xBJPR8v80pQYKtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    lightGallery(document.querySelector('#lightgallery2'));
</script>
@endpush

@endsection
