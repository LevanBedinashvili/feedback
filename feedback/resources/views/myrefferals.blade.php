@extends('guestLayout.app')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
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

                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">ჩემი რეფერალები</h3>
                    </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">ჩემი რეფერალური კოდი</label>
                                        <input id="toBeCopied" type="text" class="form-control"  value="{{ Request::root() }}/register?id={{ Auth::user()->refferal_code }}" readonly>
                                        <br>
                                        <button class="btn btn-primary" id="copyIt" onclick="copyToClipboard()" enabled>კოპირება</button>


                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                            </div>
                        </div>
                        <br>
                        <div class="tab-pane userprof-tab" id="tab-7">
                            <div class="table-responsive border-top">
                                <table class="table table-bordered table-hover mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>სურათი</th>
                                            <th>სახელი</th>
                                        </tr>
                                    </thead>
                                    <tbody class="delete">
                                            @if($refferals->isEmpty())
                                            <tr>
                                            <td colspan='5' style="text-align:center;background-color:#f5f5ba">
                                                რეფერალი არ მოიძებნა</td>
                                            </tr>
                                            @else
                                            @foreach ($refferals as $refferal)
                                            <tr>
                                                <td>{{ $refferal->id }}</td>
                                                @if (empty($refferal->avatar))
                                                <td><img src="{{ asset('assets/images/faces/male/profile.png') }}" style="object-fit:cover; width: 80px; height: 80px" alt="img"></td>
                                                @else
                                                <td><img src="{{ asset('feedback/storage/app/public/'. $refferal->avatar) }}" style="object-fit:cover; width: 80px; height: 80px" alt="img"></td>
                                                @endif
                                                <td>{{ $refferal->fname }} {{ $refferal->lname }}</td>
                                            @endforeach
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        {!! $refferals->links() !!}
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/User Dashboard-->
@push('js')
<script>

function copyToClipboard(){
    var $temp = $("<input />");
    $("body").append($temp);
    $temp.val($("#toBeCopied").val()).select();
    var result = false;
    try {
        result = document.execCommand("copy");
    } catch (err) {
        console.log("Copy error: " + err);
    }
    $temp.remove();
  }
</script>
@endpush
@endsection
