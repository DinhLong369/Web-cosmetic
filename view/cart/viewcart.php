<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </div>
    </nav>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="shopping-cart-form table-responsive">
                <form action="index.php?act=updatecart" method="post">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tong = 0;
                            $i = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                                $hinh = $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                echo '                        <tr class="tbody-item">
                            <td class="product-remove">
                                <a class="remove" href="index.php?act=delcart&idcart=' . $i . '">×</a>
                            </td>
                            <td class="product-thumbnail">
                                <div class="thumb">
                                    <a href="single-product.html">
                                        <img src="' . $hinh . '" width="68" height="84" alt="Image-HasTech">
                                    </a>
                                </div>
                            </td>
                            <td class="product-name">
                                <a class="title" href="single-product.html">' . $cart[1] . '</a>
                            </td>
                            <td class="product-price">
                                <span class="price">$' . $cart[3] . '</span>
                            </td>
                            <input type="hidden" name="id" value="' . $cart[0] . '">
                            <td class="product-quantity">
                                <div class="pro-qty">
                                    <input type="number" class="quantity" title="Quantity" name="soluong[]" min="1" value="' . $cart[4] . '">
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="price">$' . $ttien . '</span>
                            </td>
                        </tr>';
                                $i += 1;
                            }
                            ?>

                            <tr class="tbody-item-actions">
                                <td colspan="6">
                                    <button type="submit" name="updatecart" value="Update giỏ hàng" class="btn-update-cart">Update cart</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-wrap">
                        <h2 class="title">Cart totals</h2>
                        <table>
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td>
                                        <span class="amount"><?= $tong ?>đ</span>
                                    </td>
                                </tr>
                                <tr class="shipping-totals">
                                    <th>Shipping</th>
                                    <td>
                                        <span class="amount">30000đ</span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <?php
                                        if ($i > 0) {
                                            echo '<span class="amount">' . ($tong + 30000) . '</span>';
                                        } else {
                                            echo '<span class="amount">0đ</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end">
                    

<a class="checkout-button" onclick="proceedToCheckout(<?php echo $i; ?>)">Proceed to checkout</a>

<script type="text/javascript">
    function proceedToCheckout(i) {
        if (i == 0) {
            window.alert("Bạn cần thêm sản phẩm vào giỏ hàng");
            window.location.href = "index.php?act=viewcart";
        } else {
            // Chuyển hướng đến trang index.php?act=bill
            window.location.href = "index.php?act=bill";
        }
    }
</script>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

</main>