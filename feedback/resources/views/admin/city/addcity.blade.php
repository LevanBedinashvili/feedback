@extends('admin.layout.app')
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <br>
        <div class="page-header">
            <h1 class="page-title">ქალაქის დამატება</h1>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <!-- შეტყობინება -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">დაამატეთ ქალაქი</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.storecity') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">ქალაქის სახელი</label>
                                        <input type="text" class="form-control" id="cityname" name="cityname" placeholder="შეიყვანეთ ქალაქის სახელი">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="დამატება">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
