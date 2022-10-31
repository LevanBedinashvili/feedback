<div class="col-xl-3 col-lg-12 col-md-12 leftSidebar">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ჩემი სივრცე</h3>
        </div>
        <div class="card-body text-center item-user border-bottom">
            @if(Auth::user()->avatar == NULL)
            <div class="profile-pic">
                <div class="profile-pic-img file-uploader">
                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top"
                        title="online"></span>
                    <img src="{{ asset('assets/images/faces/male/profile.png') }}"
                        style="width:80px;height:80px;object-fit:cover" class="brround preview-1"
                        alt="">
            @else
            <div class="profile-pic">
                <div class="profile-pic-img file-uploader">
                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top"
                        title="online"></span>
                    <img src="{{ asset('feedback/storage/app/public/'. Auth::user()->avatar) }}"
                        style="width:80px;height:80px;object-fit:cover" class="brround preview-1"
                        alt="">

            @endif
                </div>
                <a href="{{ route('profile', Auth::user()->id) }}">
                    <h4 class="mt-3 mb-0 font-weight-semibold">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h4>
                </a>
            </div>
        </div>
        <div class="item1-links  mb-0 hidden-md d-none d-lg-block">
            <a href="{{ route('editprofile', Auth::user()->id) }}" class="d-flex border-bottom">
                <span class="icon1 mr-3"><i class="icon icon-user"></i></span> პროფილის რედაქტირება
            </a>
            <a href="{{ route('recived') }}" class=" d-flex  border-bottom">
                <span class="icon1 mr-3"><i class="icon icon-speech"></i></span> წერილები <span
                    class="ml-auto badge badge-success">{{ $providerCount }}</span>
            </a>
            <a href="{{ route('subject.add') }}" class="d-flex  border-bottom">
                <span class="icon1 mr-3"><i class="fa fa-plus"></i></span> სუბიექტის დამატება
            </a>
            <a href="{{ route('subject.index') }}" class="d-flex  border-bottom">
                <span class="icon1 mr-3"><i class="icon icon-folder-alt"></i></span> ჩემი სუბიექტები
            </a>
            <a href="{{ route('blog.create') }}" class="d-flex  border-bottom">
                <span class="icon1 mr-3"><i class="fa fa-edit"></i></span> სტატიის დამატება
            </a>
            <a href="{{ route('blog.index') }}" class="d-flex  border-bottom">
                <span class="icon1 mr-3"><i class="fa fa-folder-open"></i></span> ჩემი სტატიები
            </a>
            <a href="{{ route('myrefferals') }}" class="d-flex  border-bottom">
                <span class="icon1 mr-3"><i class="mdi mdi-account-multiple-plus"></i></span> ჩემი
                რეფერალები
            </a>
            <a href="{{ route('settings') }}" class="d-flex border-bottom">
                <span class="icon1 mr-3"><i class="icon icon-settings"></i></span> პარამეტრები
            </a>
            <a href="{{ route('logout') }}" class="d-flex">
                <span class="icon1 mr-3"><i class="icon icon-power"></i></span> გასვლა
            </a>
        </div>
    </div>

</div>
