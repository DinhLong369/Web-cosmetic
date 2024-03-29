        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">My Account</li>
                                </ol>
                                <h2 class="page-header-title">My Account</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start My Account Area Wrapper ==-->
            <section class="my-account-area section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab" data-bs-target="#dashboad" type="button" role="tab" aria-controls="dashboad" aria-selected="true">Dashboard</button>
                                <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false"> Orders</button>
                                <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="false">Account Details</button>
                                <button class="nav-link" onclick="window.location.href='index.php?act=thoat'" type="button">Logout</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <?php
                                        if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                                            extract($_SESSION['user']);
                                        }
                                        ?>
                                        <div class="welcome">
                                            <p>Hello, <strong><?=$username?></strong> (If Not <strong><?=$username?></strong><a href="account-login.html" class="logout"> Logout</a>)</p>
                                        </div>
                                        <p>From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Mã đơn</th>
                                                        <th>Ngày đặt</th>
                                                        <th>Số lượng mặt hàng</th>
                                                        <th>Tình trạng đơn hàng</th>
                                                        <th>Tổng giá trị</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                    if(is_array($listbill)){
                                                        foreach($listbill as $bill){
                                                            extract($bill);
                                                            $ttdh=get_ttdh($bill['TrangThaiDH']);
                                                            $countsp=loadall_cart_count($bill['MaHoaDon']);
                                                            echo '
                                                            <tr>
                                                                <td>'.$bill['MaHoaDon'].'</td>
                                                                <td>'.$bill['NgayHoaDon'].'</td>
                                                                <td>'.$countsp.'</td>
                                                                <td>'.$ttdh.'</td>
                                                                <td>'.$bill['TongTienHD'].'</td>
                                                                <td><a href="index.php?act=mybill&mahd='.$bill['MaHoaDon'].'" class="check-btn sqr-btn ">View</a></td>
                                                    </tr>';
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="index.php?act=my-account" method="post">
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Display Name</label>
                                                    <input type="text" id="display-name" name="name" value="<?=$TenKhachHang?>"/>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input type="email" id="email" name="email" value="<?=$username?>" readonly />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="address" class="required">Address</label>
                                                    <input type="text" id="address" name="address" value="<?=$DiaChi?>"/>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="tel" class="required">Phone Number</label>
                                                    <input type="text" id="tel" name="tel" value="<?=$SoDienThoai?>"/>
                                                </div>
                                                <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current Password</label>
                                                        <input type="password" id="pass" name="pass" value="<?=$passwords?>" />
                                                    </div>
                                                <div class="single-input-item">
                                                    <input type="hidden" name="id" value="<?=$MaKhachHang?>">
                                                    <button class="check-btn sqr-btn" type="submit" name="capnhat" value="capnhat">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End My Account Area Wrapper ==-->

        </main>
