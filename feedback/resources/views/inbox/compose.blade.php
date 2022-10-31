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
                    <div class="card-header">
                        <h3 class="card-title">წერილის გაგზავნა</h3>
                    </div>
                    <div class="card-body">
                        <span id="responseReg"></span>
                        <form id="myForm" method="POST" action="{{ route('send') }}">
                            @csrf
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-3">მიმღების ელ. ფოსტა</label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="reciver_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-3">სათაური</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-3">წერილი</label>
                                    <div class="col-sm-9">
                                        <textarea rows="9" name="text" name="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-list mt-4 text-right">
                                <input type="submit" id="submitButton" value="გაგზავნა" onclick="submitForm(this);" class="btn btn-primary btn-space">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
</script>
@endpush
@endsection
