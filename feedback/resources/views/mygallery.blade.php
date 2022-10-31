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
                <!-- შეტყობინება -->
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif

                <!-- შეტყობინება -->
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">ფოტოს დამატება</h3>
                    </div>
                    <form action="{{ route('mygallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">ფოტო</h3>

                                    </div>
                                    <div class=" card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image[]"  multiple>
                                                        <label class="custom-file-label">აირჩიეთ ფოტო(ები)</label>
                                                    </div>
                                                </div>
                                                <input type="submit" value="დამატება" class="btn btn-primary">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
            </div>

                <br>
                    @if($images->isEmpty())
                    <div class="demo-gallery galerea">
                        <div style="width:100%" class="alert alert-danger" role="alert">
                            <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>ფოტოები არ მოიძებნა
                        </div>
                    </div>
                @else
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">ჩემი გალერია</h3>
                    </div>
                    <div class="card-body">
                        <div class="manged-ad table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>სურათი</th>
                                        <th>ქმედება</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                    <tr>
                                        <td>
                                            <div class="media mt-0 mb-0">
                                                <div class="card-aside-img">
                                                    <img src="{{ asset('feedback/storage/app/'.$image->image) }}" alt="img">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('imagedelete', $image->id) }}"class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                            <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                @endif


            </div>
            <br>
        </div>
    </div>
</section>
<!--/User Dashboard-->


@push('js')
<script src="{{ asset('assets/plugins/fileuploads/js/dropify.js') }}"></script>
<script>
    CKEDITOR.replace('text');

</script>
@endpush
@endsection
