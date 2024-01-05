<div class="col-xl-3">
                            <div class="product-sidebar-widget">
                                <div class="product-widget-search">
                                    <form action="index.php?act=sanpham" method="post">
                                        <input type="search" placeholder="Search Here" name="kyw">
                                        <button type="submit" name = "timkiem"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="product-widget">
                                    <h4 class="product-widget-title">Categoris</h4>
                                    <ul class="product-widget-category">
                                        <?php
                                        foreach ($dsdm as $dm) {
                                            extract($dm);
                                            $linkdm = "index.php?act=sanpham&iddm=".$MaLoai;
                                            echo '
                                            <li><a href="'.$linkdm.'">'.$Loai.'</a></li>
                                            ';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>