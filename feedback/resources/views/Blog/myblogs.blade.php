@extends('guestLayout.app')
@section('content')

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


                <!-- შეტყობინება -->
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">ჩემი სტატიები</h3>
                    </div>
                    <div class="card-body">
                        <div class="manged-ad table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>სტატია</th>
                                        <th>ქმედება</th>
                                    </tr>
                                </thead>
                                <tbody class="delete">
                                    @if (!empty($myblogs))
                                    @foreach ($myblogs as $myblog)
                                    <tr id="{{ $myblog->id }}">

                                        <td>
                                            <div class="media mt-0 mb-0">
                                                <div class="card-aside-img">
                                                    <a href="#"></a>
                                                    <img src="{{ asset('feedback/storage/app/public/'. $myblog->image) }}" style="object-fit:cover" alt="img">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-item-desc ml-4 p-0 mt-2">
                                                        <h4 class="font-weight-semibold">{{ $myblog->title }}</h4>
                                                        <i class="fa fa-clock-o mr-1"></i> {{ $myblog->date }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form  class="btn btn-success btn-sm  text-white" method="POST" action="{{ route('blog.edit', $myblog->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('GET') }}
                                                    <button  class="btn btn-success btn-sm  text-white"><i class="fa fa-pencil"></i></button>
                                            </form>
                                            <!---<a class="btn btn-primary text-white" href="#" target="_blank" data-toggle="tooltip" data-original-title="ნახვა"><i class="fa fa-eye"></i></a> -->
                                            <form  class="btn btn-primary btn-sm text-white" method="POST" action="{{ route('blog.destroy', $myblog->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                    <button  class="btn btn-primary btn-sm  text-white"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan='5' style="text-align:center;background-color:#f5f5ba">სტატია არ მოიძებნა</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <ul class="pagination mt-3">
                            </ul>
                        </div>
                        <br>
                        {!! $myblogs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/User Dashboard-->

@endsection
