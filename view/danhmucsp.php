<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="page-header-st3-content text-center text-md-start">
                        <ol class="breadcrumb justify-content-center justify-content-md-start">
                            <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Products</li>
                        </ol>
                        <h2 class="page-header-title">All Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row justify-content-between flex-xl-row-reverse">
                <div class="col-xl-9">
                    <div class="row g-3 g-sm-6">
                        <?php
                        foreach ($spnew as $sp) {
                            extract($sp);
                            $linksp = "index.php?act=sanphamct&idsp=" . $MaChiTietSP;
                            $hinh = $img_path . $AnhDaiDien;
                            echo '<div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">
                                                                <!--== Start Product Item ==-->
                                                                <div class="product-item product-st3-item">
                                                                    <div class="product-thumb">
                                                                        <a class="d-block" href="'.$linksp.'">
                                                                            <img src="'.$hinh.'" width="370" height="450" alt="Image-HasTech">
                                                                        </a>
                                                                        <span class="flag-new">new</span>
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
                                                                    </div>
                                                                    <div class="product-info">
                                                                        <h4 class="title"><a href="'.$hinh.'">'.$TenSP.'</a></h4>
                                                                        <div class="prices">
                                                                            <span class="price">$'.$GiaSP.'</span>
                                                                        </div>
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
                                                                <!--== End prPduct Item ==-->
                                                            </div>';
                        }
                        ?>

                    </div>
                </div>
                <?php
                include "boxleft.php";
                ?>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <section>
        <div class="container">
            <!--== Start Product Category Item ==-->
            <a href="product.html" class="product-banner-item">
                <img src="view/assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
            </a>
            <!--== End Product Category Item ==-->
        </div>
    </section>
    <!--== End Product Banner Area Wrapper ==-->

</main>