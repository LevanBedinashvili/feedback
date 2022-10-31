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
                        <h3 class="card-title">პაროლის შეცვლა</h3>
                    </div>
                        <form action="{{ route('updatesettings') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">ძველი პაროლი</label>
                                        <input type="password" class="form-control" name="old_password" placeholder="ძველი პაროლი">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">ახალი პაროლი</label>
                                        <input type="password" class="form-control" name="new_password" placeholder="ახალი პაროლი">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">გაიმეორე ახალი პაროლი</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="გაიმეორე ახალი პაროლი">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="change_password" class="btn btn-primary">პაროლის შეცვლა</button>
                        </div>

                    </form>
                </div>

                <br>

                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">პარამეტრები</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">ტელეფონის ნომერი:</label>

                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select class="form-control test" name="HideOrShow" id="HideOrShow">
                                                    @if (Auth::user()->number_status == 1)
                                                    <option value="1" selected>გამოჩნდეს</option>
                                                    <option value="2">დაიმალოს</option>
                                                    @endif
                                                    @if (Auth::user()->number_status == 2)
                                                    <option value="1" selected>გამოჩნდეს</option>
                                                    <option value="2" selected>დაიმალოს</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
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
<!--/User Dashboard-->


@push('js')


<script type='text/javascript'>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#HideOrShow').change(function(){
            var url = '/feeedback/HideNumber';
            var id = $(this).val();
            if(id != 0) {
            jQuery.ajax({
                    url: url,
                    data: {value:id} ,
                    type: "POST",
                    success:function(data)
                    {

                    }
                });
            }
        } );
    });
</script>
@endpush
@endsection
