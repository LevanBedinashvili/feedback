@extends('guestLayout.app')

@section('content')
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="https://feedback.ge/background/batumi.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">რეგისტრაცია</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="https://feedback.ge">მთავარი</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">რეგისტრაცია</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Breadcrumb-->
<!--Register-section-->
<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page" >
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <form  class="card-body" method="POST" action="{{ route('register') }}">
                            <h3>რეგისტრაცია</h3>
                            @csrf
                            <div class="name">
                                <input type="text" name="fname" id="fname" required>
                                <label>სახელი</label>
                            </div>
                            <div class="name">
                                <input type="text" name="lname" id="lname" required>
                                <input type="hidden" name="refferal_code"  required>
                                <input type="hidden" name="myreffer"  required>
                                <label>გვარი</label>
                            </div>
                            <div class="name">
                                <input type="number" name="number" required>
                                <label>ტელეფონის ნომერი</label>
                            </div>
                            <div class="mail">
                                <input type="email" name="email" id="email" required autocomplete="off" data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail data-parsley-checkemail-message="ელ. ფოსტა უკვე ბაზაშია" required>
                                <label>ფოსტა</label>
                            </div>
                            <div class="passwd">
                                <input type="password" name="password" id="password" required>
                                <label>პაროლი</label>
                            </div>
                            <p class="text-dark mb-0"><input type="checkbox" name="checkbox" style="height:20px" value="1" required> <a href="faq">ვეთანხმები წესებს და პირობებს </a></p>
                            <br>
                            <span id="responseReg"></span>
                            <div class="submit">
                                <input type="submit" class="btn btn-primary btn-block" value="რეგისტრაცია">
                                <br>
                                <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=484792894236-fu8bfvll3p18pdmpj6s5qv7h0g8mrec9.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Ffeedback.ge%2Fgoogle-callback.php&state&scope=email%20profile&approval_prompt=auto" class="btn btn-primary btn-icon" style="background: #dd4b39;width:100%"><i class="fa fa-google"></i>&nbsp; Google - ით შესვლა</a>

                            </div>
                            <p class="text-dark mb-0">უკვე ხართ დარეგისტრირებული?<a href="#" data-toggle="modal" data-target="#LoginModal" class="text-primary ml-1">ავტორიზაცია</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@push('js')
<script>
    $('#fname').geokbd();
    $('#lname').geokbd();

</script>
<script type="text/javascript">

    function InvalidMsg(textbox) {

        if (textbox.value == '') {
            textbox.setCustomValidity('შეავსეთ მოცემული ველი');
        }else{
            textbox.setCustomValidity('');
        }

        return true;
    }
    </script>
@endpush
@endsection
