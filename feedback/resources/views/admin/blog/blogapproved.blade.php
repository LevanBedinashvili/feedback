@extends('admin.layout.app')
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <br>
        <div class="page-header">
            <h1 class="page-title">დადასტურებული სუბიექტები</h1>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active " id="tab1">
                                <div class="mail-option">
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
                                    <ul class="dropdown-menu">
                                        <li class="liclicked" data-clicked="1"><a>წაშლა</a></li>
                                        <li class="liclicked" data-clicked="2"><a>აქტივაცია</a></li>
                                        <li class="liclicked" data-clicked="3"><a>დეაქტივაცია</a></li>
                                    </ul>
                                </div>
                                <br>
                                <div class="user-tabel table-responsive border-top">
                                     <table style="width:100%!important;" class="table card-table table-bordered table-hover table-vcenter text-nowrap"  id="order_dataaa">

                                        <thead>
                                             <tr>
                                                <th class="w-1">ფოტო</th>
                                                <th>სათაური</th>

                                                <th>გამომქვეყნებელი</th>
                                                <th>ქმედება</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogapproved as $blogapprove)
                                            <tr>
                                                <td><img src="{{ asset('feedback/storage/app/public/'.$blogapprove->image) }}" style="object-fit:cover; width: 50px; height:50px" alt="img"></td>
                                                <td>{{ $blogapprove->title }}</td>
                                                <td>{{ $blogapprove->users->fname }} {{ $blogapprove->users->lname }}</td>
                                                <td>
                                                    <form  class="btn btn-primary btn-sm text-white" method="POST" action="{{ route('admin.blogdelete', $blogapprove->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                            <button  class="btn btn-primary btn-sm  text-white"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        {!! $blogapproved->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
