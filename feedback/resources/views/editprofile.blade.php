@extends('guestLayout.app')
@section('content')
@push('css')
<link href="{{ asset('assets/plugins/fileuploads/css/dropify.css') }}">
@endpush
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
                <!-- შეტყობინება -->
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">პროფილის რედაქტირება</h3>
                    </div>
                    <form action="{{ route('updateprofile', Auth::user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">სახელი</label>
                                        <input type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}"
                                            placeholder="შეიყვანეთ სახელი">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">გვარი</label>
                                        <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}"
                                            placeholder="შეიყვანეთ გვარი">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">ელ. ფოსტა</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}" placeholder="შეიყვანეთ ელ. ფოსტა">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">ტელეფონის ნომერი</label>
                                        <input type="number" class="form-control" name="number" value="{{ Auth::user()->number }}"
                                            placeholder="შეიყვანეთ ნომერი">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">პირადი ნომერი</label>
                                        <input type="text" class="form-control" name="p_nomeri" value="{{ Auth::user()->p_nomeri }}"
                                            placeholder="შეიყვანეთ პირადი ნომერი">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">დაბადების თარიღი</label>
                                        <input type="date" class="form-control" name="age" value="{{ Auth::user()->age }}"
                                            placeholder="შეიყვანეთ ნომერი">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">ჩემს შესახებ</label>
                                        <textarea rows="5" class="form-control content" placeholder="ჩემს შესახებ"
                                            name="about">{{ Auth::user()->about }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">პროფილის ფოტო</h3>
                                    </div>
                                    <div class=" card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            name="image" accept="image/x-png,image/jpeg">
                                                        <label class="custom-file-label">აირჩიეთ ფოტო</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="პროფილის რედაქტირება" class="btn btn-primary">
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/User Dashboard-->


@push('js')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script src="{{ asset('assets/plugins/fileuploads/js/dropify.js') }}"></script>
<script>
    CKEDITOR.replace('about');

</script>
@endpush
@endsection
