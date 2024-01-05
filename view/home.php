
<main class="main-content">
            <!--== Start Hero Area Wrapper ==-->
            <!--== End Hero Area Wrapper ==-->

            <!--== Start Product Banner Area Wrapper ==-->
            <section class="section-space">
            </section>
            <!--== End Product Banner Area Wrapper ==-->

            <!--== Start Product Area Wrapper ==-->
            <section class="section-space pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title">Best Product</h2>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                        <?php 
                            foreach ($spnew as $sp) {
                                extract($sp);
                                $linksp = "index.php?act=sanphamct&idsp=".$MaChiTietSP;
                                $hinh = $img_path.$AnhDaiDien;
                                echo '
                                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                                    <!--== Start Product Item ==-->
                                    <div class="product-item product-st2-item">
                                        <div class="product-thumb">
                                            <a class="d-block" href="'.$linksp.'">
                                                <img src="'.$hinh.'" width="370" height="450" alt="Image-HasTech">
                                            </a>
                                            <span class="flag-new">new</span>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="title"><a href="'.$linksp.'">'.$TenSP.'</a></h4>
                                            <div class="prices">
                                                <span class="price">$'.$GiaSP.'</span>
                                            </div>
                                            <div class="product-action">
                                            <form action="index.php?act=addtocart" method="post">
                                            <input type="hidden" name="id" value="'.$MaChiTietSP.'">
                                            <input type="hidden" name="name" value="'.$TenSP.'">
                                            <input type="hidden" name="img" value="'.$hinh.'">
                                            <input type="hidden" name="price" value="'.$GiaSP.'">
                                                <button type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                    <span>Add to cart</span>
                                                </button>
                                            </form>
                                            </div>
                                            <div class="product-action-bottom">
                                                <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                    <i class="fa fa-expand"></i>
                                                </button>
                                                <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                    <i class="fa fa-heart-o"></i>
                                                </button>
                                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                    <span>Add to cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--== End prPduct Item ==-->
                                </div>';
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!--== End Product Area Wrapper ==-->

            <!--== Start Product Banner Area Wrapper ==-->
            <section class="section-space pt-0">
                <div class="container">
                    <!--== Start Product Category Item ==-->
                    <a href="product.html" class="product-banner-item">
                        <img src="upload/7.webp" width="1170" height="240" alt="Image-HasTech">
                    </a>
                    <!--== End Product Category Item ==-->
                </div>
            </section>
            <!--== End Product Banner Area Wrapper ==-->

            <!--== Start Product Area Wrapper ==-->
            <section class="section-space pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title">Top Sale Products</h2>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                        <?php
                            foreach ($dstopsale as $sp) {
                                extract($sp);
                                $linksp = "index.php?act=sanphamct&idsp=".$MaChiTietSP;
                                $img=$img_path.$AnhDaiDien;
                                echo '
                                <div class="col-6 col-lg-4 mb-4 mb-sm-10">
                                    <!--== Start Product Item ==-->
                                    <div class="product-item product-st2-item">
                                        <div class="product-thumb">
                                            <a class="d-block" href="'.$linksp.'">
                                                <img src="'.$img.'" width="370" height="450" alt="Image-HasTech">
                                            </a>
                                            <span class="flag-new">new</span>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="title"><a href="'.$linksp.'">'.$TenSP.'</a></h4>
                                            <div class="prices">
                                                <span class="price">$'.$GiaSP.'</span>
                                            </div>
                                            <div class="product-action">
                                            <form action="index.php?act=addtocart" method="post">
                                            <input type="hidden" name="id" value="'.$MaChiTietSP.'">
                                            <input type="hidden" name="name" value="'.$TenSP.'">
                                            <input type="hidden" name="img" value="'.$hinh.'">
                                            <input type="hidden" name="price" value="'.$GiaSP.'">
                                                <button type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                    <span>Add to cart</span>
                                                </button>
                                            </form>
                                            </div>
                                            <div class="product-action-bottom">
                                                <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                    <i class="fa fa-expand"></i>
                                                </button>
                                                <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                    <i class="fa fa-heart-o"></i>
                                                </button>
                                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                    <span>Add to cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--== End prPduct Item ==-->
                                </div>';
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!--== End Product Area Wrapper ==-->

            <!--== Start Brand Logo Area Wrapper ==-->
            <!--== End Brand Logo Area Wrapper ==-->

            <!--== Start News Letter Area Wrapper ==-->
            <section class="section-space pt-0">
                <div class="container">
                    <div class="newsletter-content-wrap" data-bg-img="view/assets/images/photos/bg1.webp">
                        <div class="newsletter-content">
                            <div class="section-title mb-0">
                                <h2 class="title">Join with us</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam.</p>
                            </div>
                        </div>
                        <div class="newsletter-form">
                            <form>
                                <input type="email" class="form-control" placeholder="enter your email">
                                <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End News Letter Area Wrapper ==-->

        </main>