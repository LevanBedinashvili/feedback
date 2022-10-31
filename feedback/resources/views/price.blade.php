@extends('guestLayout.app')
@section('content')
<!--Breadcrumb-->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">ფასები</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcrumb-->

<section class="sptb bg-white">
    <div class="container">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4 col-sm-12">
                    <div class="pricingTable">
                        <div class="price-value">50.00 ₾
                            <span class="month">1 წელი</span>
                        </div>
                        <h3 class="title">ფიზიკური პირი</h3>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 col-xl-4 col-sm-12">
                    <div class="pricingTable">
                        <div class="price-value">200.00 ₾
                            <span class="month">1 წელი</span>
                        </div>
                        <h3 class="title">იურიდიული პირი</h3>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 col-xl-4 col-sm-12">
                    <div class="pricingTable">
                        <div class="price-value">ფასი ₾
                            <span class="month">შეთანხმებით</span>
                        </div>
                        <h3 class="title">პრეიმიუმ პაკეტი</h3>
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>
<div class="sptb">
    <div class="container">
        <div class="row">

        <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
            <div class="pricingTable2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col"></th>

                        <th scope="col" class="star-pink">უფასო</th>
                        <th scope="col" class="star-supervip">პრემიუმი</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="nms">Facebook სუბიექტის გაზიარება</td>

                            <td><i class="fa fa-plus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">Feedback ბანერი</td>

                            <td><i class="fa fa-plus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">Feedback სტატისტიკა</td>

                            <td><i class="fa fa-minus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">სიახლეების გაზიარება FACEBOOK ზე</td>

                            <td><i class="fa fa-plus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">QR კოდი</td>

                            <td><i class="fa fa-plus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">პრიორიტეტული განთავსება მთავარ გვერძე</td>

                            <td><i class="fa fa-minus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>

                        <tr>
                            <td class="nms">დამატებითი მოდერატორების დანიშვნა</td>

                            <td><i class="fa fa-minus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">პასუხისმგებელი პირის შეცვლა</td>

                            <td><i class="fa fa-minus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">წაშლილი კომპანიის აღდგენა</td>

                            <td><i class="fa fa-minus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td class="nms">რუქაზე აღნიშვნა</td>

                            <td><i class="fa fa-minus star-pink" aria-hidden="true"></i></td>
                            <td><i class="fa fa-plus star-supervip" aria-hidden="true"></i></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>
</div>
<div class="sptb">
    <div class="container">
        <div class="row">

        <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
            <div class="pricingTable2">
                <table class="table table-striped">

                    <tbody>
                        <tr>
                            <td class="nms">გიორგი ვეფხვაძე აიტი სტუდია</td>
                            <td>ს/კ. 59001106096</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="nms">სს საქართველოს ბანკი</td>
                            <td>ანგ. N GE45BG0000000855016200</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>
</div>
<br>
@endsection
