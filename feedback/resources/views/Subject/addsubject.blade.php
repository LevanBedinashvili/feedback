@extends('guestLayout.app')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('assets/plugins/fileuploads/css/dropify.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
                        <h3 class="card-title">სუბიექტის დამატება</h3>
                    </div>
                    <form action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">აირჩიეთ სეგმენტი</label>
                                        <select class="form-control test" id='segment'  name='segment'>
                                            <option selected=""><b>აირჩიეთ სეგმენტი</b></option>
                                            @foreach ($segment['data'] as $seg)
                                            <option value="{{ $seg->id }}">{{ $seg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">აირჩიეთ კატეგორია</label>
                                        <select class="form-control test" id='category' name='category'>
                                            <option value="0"><b>აირჩიეთ კატეგორია</b></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">აირჩიეთ ქალაქი</label>
                                        <select class="form-control test" name="city">
                                            <option value="0"><b>აირჩიეთ ქალაქი</b></option>
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12" id="InputReturner">

                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">მისამართი</label>
                                        <input type="text" class="form-control" name="address" placeholder="შეიყვანეთ მისამართი">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">სათაური</label>
                                        <input type="text" class="form-control" name="title" placeholder="შეიყვანეთ სათაური">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">YOUTUBE</label>
                                        <input type="text" class="form-control" name="yt" placeholder="შეიყვანეთ იუთუბის მისამართი">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">FACEBOOK</label>
                                        <input type="text" class="form-control" name="fb" placeholder="შეიყვანეთ ფეისბუქის მისამართი">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">ტექსტი</label>
                                        <textarea rows="5" class="form-control content" placeholder="ტექსტი" name="text">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">ფოტო</h3>
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
                                <input type="submit" value="დამატება" class="btn btn-primary">
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
    CKEDITOR.replace('text');

</script>

<script type='text/javascript'>
    $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
   $('#segment').change(function(){

      var url = '/feeedback/subject/InputReturner';

      var id = $(this).val();

      if(id != 0) {
        jQuery.ajax({
                url: url,

                data: {value:id} ,
                type: "POST",
                success:function(data)
                {
                    $("#InputReturner").html(data.html);

                }
            });
        }

      $('#category').find('option').not(':first').remove();

      $.ajax({
        url: 'getProffesion/'+id,
        type: 'get',
        dataType: 'json',
        success: function(response){

          var len = 0;
          if(response['data'] != null){
             len = response['data'].length;
          }

          if(len > 0){
             // Read data and create <option >
             for(var i=0; i<len; i++){

                var id = response['data'][i].id;
                var name = response['data'][i].name;

                var option = "<option value='"+id+"'>"+name+"</option>";

                $("#category").append(option);
             }

          }

        }
      });
   });
});
</script>
<script>
    $(document).ready(function(){
     // Initialize select2
     $(".test").select2();

     // Read selected option
     $('#but_read').click(function(){
       var selectedoption = $('.test option:selected').text();
       var id = $('.test').val();

       $('#result').html("id : " + id + ", name : " + selectedoption);

     });
    });
</script>
<!--- select js ----->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endpush
@endsection
