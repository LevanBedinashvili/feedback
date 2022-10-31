@extends('admin.layout.app')
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <br>
        <div class="page-header">
            <h1 class="page-title">მომხმარებლების სია</h1>
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
                                                <th>ქალაქის სახელი</th>
                                                <th>ქმედება</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cities as $city)
                                            <tr>
                                                <td>{{ $city->name }}</td>
                                                <td>
                                                    <form  class="btn btn-success btn-sm text-white" method="get" action="{{ route('admin.editcity', $city->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('get') }}
                                                        <button  class="btn btn-success btn-sm  text-white"><i class="fa fa-pencil"></i></button>
                                                    </form>
                                                    <form  class="btn btn-primary btn-sm text-white" method="POST" action="{{ route('admin.deletecity', $city->id ) }}">
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
                        {!! $cities->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
