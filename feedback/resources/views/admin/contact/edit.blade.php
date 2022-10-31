@extends('admin.layout.app')
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <br>
        <div class="page-header">
            <h1 class="page-title">კონტაქტის რედეაქტირება</h1>
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
                        <h3 class="card-title">კონტაქტის რედეაქტირება</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.Contact.update' , 1) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">ტელეფონის ნომერი</label>
                                        <input type="text" class="form-control" value="{{ $contactInfo->tel_nomeri }}"  name="number" placeholder="შეიყვანეთ ტელეფონის ნომერი">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">მისამართი</label>
                                        <input type="text" class="form-control" value="{{ $contactInfo->address }}" name="address" placeholder="შეიყვანეთ მისამართი">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">ელ.ფოსტა</label>
                                        <input type="text" class="form-control" value="{{ $contactInfo->email }}" name="email" placeholder="შეიყვანეთ ელ.ფოსტა">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">FACEBOOK-ლინკი</label>
                                        <input type="text" class="form-control" value="{{ $contactInfo->facebook }}" name="facebook" placeholder="შეიყვანეთ FACEBOOK-ლინკი">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="რედაქტირება">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
