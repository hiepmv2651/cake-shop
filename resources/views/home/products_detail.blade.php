<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    @include('home.cssdetail')
</head>

<body>
    @include('sweetalert::alert')

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <!-- end header section -->
        <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
        <br>
        <div class="pd-wrap">
            <div class="container">
                <div class="heading-section">

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="slider" class="owl-carousel product-slider">
                            <div class="item">
                                <img src="{{ asset('storage/' . $value->image) }}"
                                    style="margin-left: auto;
								margin-right: auto;width: 50%;display: block;"
                                    alt="">
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="product-dtl">
                            <div class="product-info">
                                <div class="product-name">{{ $value->title }}</div>
                                <div class="reviews-counter">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" checked />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <span></span>
                                </div>
                                <div class="product-price-discount"><span>

                                        {{ $value->price }} VNĐ
                                    </span><span class="line-through"></span></div>
                            </div>

                            <p>
                                Danh mục: {{ $value->category }}
                            </p>

                            <div class="product-count">

                                <form action="{{ url('add_cart', $value->id) }}" method="POST">
                                    @csrf
                                    <label for="size">Số Lượng</label>
                                    <input type="number" name="quantity" min="1" max="20" value="1">
                                    <input type="submit" class="round-black-btn" value="Thêm Vào Giỏ">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">Miêu Tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">Bình Luận</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            {{ $value->description }}
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="review-heading">Bình Luận</div>
                            <p class="mb-20">Chưa có bình luận.</p>
                            <form class="review-form">
                                <div class="form-group">
                                    <label>Đánh giá của bạn</label>
                                    <div class="reviews-counter">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tin nhắn</label>
                                    <textarea class="form-control" rows="10"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control"
                                                placeholder="Họ Và Tên*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control"
                                                placeholder="Email*">
                                        </div>
                                    </div>
                                </div>
                                <button class="round-black-btn">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
    </div>


    <!-- jQery -->
    @include('home.js')

</body>

</html>
