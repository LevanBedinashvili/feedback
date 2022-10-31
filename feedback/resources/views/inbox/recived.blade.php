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

                <div id="danger">

                </div>

                    <div class="card">
                    <div class="card-body">
                             							<div class="row">
								<div class="col-md-12 col-lg-3">
									<div class="card-body p-0 border">
										<div class="list-group list-group-transparent mb-0 mail-inbox">
											<div class="mt-4 mb-4 ml-4 mr-4 text-center">
												<a href="{{ route('compose') }}" class="btn btn-primary btn-lg btn-block">მიწერა</a>
											</div>
											<a href="#" class="list-group-item list-group-item-action d-flex align-items-center active text-white">
												<span class="icon mr-3"><i class="fe fe-inbox"></i></span>შემოსული <span class="ml-auto badge badge-success">{{ $providerCount }}</span>
											</a>
											<a href="{{ route('sent') }}" class="list-group-item list-group-item-action d-flex align-items-center">
												<span class="icon mr-3"><i class="fe fe-send"></i></span>გაგზავნილი
											</a>
										</div>
									</div>

								</div>
								<div class="col-md-12 col-lg-9">
									<div class="">
										<div class="card-body p-6 border">

                                                <div class="inbox-body">
                                                    <div class="mail-option">
                                                        <div class="chk-all">
                                                            <div class="btn-group">
                                                                <button name="delete_all" id="delete_all" data-href="{{URL::to('/delete')}}" class="btn mini all">წაშლა</button>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-inbox table-hover">
                                                            <tbody>
                                                                @foreach ($messages as $message)
                                                                <tr>
                                                                    <td class="inbox-small-cells">
                                                                        <input type="checkbox" class="mail-checkbox delete_checkbox" name="checkbox" value="{{ $message->id }}">
                                                                    </td>
                                                                    <td class="view-message  dont-show" ><a href="{{ route('openmessage', $message->id) }}"> {{ $message->user->fname }} {{ $message->user->lname }}</a></td>
                                                                    <td class="view-message"> <a href="{{ route('openmessage', $message->id) }}"> {{ $message->text }}</a></td>
                                                                    <td class="view-message  text-right" ><a href="{{ route('openmessage', $message->id) }}"> </a></td>
                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>

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
    </div></section>
@push('js')

<script>
  $(document).ready(function(){
    $('.delete_checkbox').click(function(){
    if($(this).is(':checked'))
        {
            $(this).closest('tr').addClass('removeRow');
        }
        else
        {
            $(this).closest('tr').removeClass('removeRow');
        }
        });

    $('#delete_all').click(function(){
    var checkbox = $('.delete_checkbox:checked');
    if(checkbox.length > 0)
    {
        var checkbox_value = [];
        $(checkbox).each(function(){
            checkbox_value.push($(this).val());
        });

        $.ajax({
            url: $(this).data('href'),
            method:"get",
            data:{checkbox_value:checkbox_value},
            success:function()
            {
                $('.removeRow').fadeOut(1500);
            }
        });
    }
    else
    {
        alert("აირჩიეთ წერილი");
    }
    });

    });
</script>

@endpush
@endsection
