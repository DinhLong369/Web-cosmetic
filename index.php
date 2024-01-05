<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";
include "global.php";
require('mail/sendmail.php');

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$spnew = loadall_sanpham_home();
$dsdm =  loadall_danhmuc();
$dstopsale = loadall_sanpham_topsale();

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] != null)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] != null)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanphamcungloai($id, $MaLoai);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'quenmk':
            if (isset($_POST['mk']) && ($_POST['mk'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                extract($checkemail);
                $tieude = "Quên mật khẩu";
                $noidung = "<p>Mật khẩu của bạn là $passwords</p>";
                $maildathang = $email;
                $mail = new Mailer();
                $mail->dathangmail($tieude, $noidung, $maildathang);
                echo '<script>alert("Đã gửi mật khẩu về gmail.");</script>';
            }
            include 'view/taikhoan/quenmk.php';
            break;
        case 'dangkydangnhap':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $checkemail = checkemail($email);
                $token = rand(0000, 9999);
                $date_created = date('h:i:sa d/m/Y');

                // Password validation rules
                $pass_length = strlen($pass);
                if ($pass_length < 8 || $pass_length > 20) {
                    $thongbao = "Mật khẩu phải có ít nhất 8 ký tự và không quá 20 ký tự!";
                } else {
                    if (is_array($checkemail)) {
                        $thongbao = "Email đã tồn tại. Vui lòng chọn một email khác!";
                    } else {
                        insert_taikhoan($email, $pass, $token, $date_created);
                        $thongbao = "Đã đăng ký thành công!";
                        $tieude = "Đăng ký website bán mỹ phẩm thành công";
                        $fulurl = 'http://localhost/duanmau/index.php?act=xacthucdangky&token=' . $token . '&email=' . $email;
                        $noidung = "Click vào đường link để kích hoạt tài khoản:" . $fulurl;
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $email);
                    }
                }
            }

            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($email, $pass);
                $checkemail = checkemail($email);

                if (is_array($checkuser)) {
                    // Password validation rules
                    $pass_length = strlen($pass);
                    if ($pass_length < 8 || $pass_length > 20) {
                        $thongbao = "Mật khẩu không hợp lệ!";
                    } else {
                        if ($checkuser['status'] == 1) {
                            $_SESSION['user'] = $checkuser;
                            extract($_SESSION['user']);
                            if ($checkuser['LoaiUser'] == 0) {
                                echo '<script>window.location.href = "index.php";</script>';
                            } else if ($checkuser['LoaiUser'] == 1) {
                                echo '<script>window.location.href = "admin/index.php";</script>';
                            }
                        } else {
                            $thongbao = "Đã gửi lại mã xác thực gmail!";
                            $tieude = "Đăng ký website bán mỹ phẩm thành công";
                            $fulurl = 'http://localhost/duanmau/index.php?act=xacthucdangky&token=' . $token . '&email=' . $email;
                            $noidung = "Click vào đường link để kích hoạt tài khoản:" . $fulurl;
                            $mail = new Mailer();
                            $mail->dathangmail($tieude, $noidung, $email);
                        }
                    }
                } else if (is_array($checkemail)) {
                    $thongbao = "Sai mật khẩu!";
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký!";
                }
            }
            include "view/taikhoan/dangkydangnhap.php";
            break;
        case 'xacthucdangky':
            if (isset($_GET['email']) && ($_GET['token'])) {
                $tokenget = $_GET['token'];
                $email = $_GET['email'];
            }
            $check = checkemail($email);
            $now = date('h:i:sa d/m/Y');
            $timestamp = strtotime($now);

            // Cộng thêm 5 phút
            $newTimestamp = $timestamp + (5 * 60);

            // Chuyển đổi lại thành định dạng thời gian mong muốn
            $newTime = date('h:i:sa d/m/Y', $newTimestamp);
            $token_rand = rand(0000, 9999);
            foreach ($check as &$item) {
                $newstatus = 1;
                extract(checkemail($email));
                if ($tokenget != $token) {
                    echo '<script>alert("Xác thực thất bại.");</script>';
                    echo '<script>window.location.href = "index.php?act=dangkydangnhap";</script>';
                }
                if ($date_created) {
                    $xacthuc = update_stt_taikhoan($email, $newstatus, $token_rand);
                    echo '<script>alert("Xác thực thành công.");</script>';
                    echo '<script>window.location.href = "index.php?act=dangkydangnhap";</script>';
                } else {
                    echo '<script>alert("Xác thực thất bại.");</script>';
                    echo '<script>window.location.href = "index.php?act=dangkydangnhap";</script>';
                }
            }
            break;
        case 'my-account':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pass = $_POST['pass'];
                $id = $_POST['id'];

                update_taikhoan($id, $name, $address, $tel, $pass);
                $_SESSION['user'] = checkuser($email, $pass);
                echo '<script>window.location.href = "index.php?act=my-account";</script>';
            }
            $listbill = loadall_bill($_SESSION['user']['MaKhachHang']);
            include "view/taikhoan/my-account.php";
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                if (isset($_POST['soluong'])) {
                    $soluong = $_POST['soluong'];
                } else {
                    $soluong = 1;
                }
                if ($soluong > $SoLuongTon) {
                    echo '<script>alert("Xin lỗi, số lượng vượt quá số sản phẩm trong kho.");</script>';
                    echo '<script>window.location.href = "index.php?act=danhmucsp";</script>';
                    break;
                }
                $ttien = $soluong * $price;
                $product_exists = false;
                foreach ($_SESSION['mycart'] as &$item) {
                    if ($item[0] == $id) { // So sánh với ID của sản phẩm
                        // Kiểm tra nếu thêm vào giỏ hàng vượt quá số lượng có sẵn trong cơ sở dữ liệu
                        if (($item[4] + $soluong) > $SoLuongTon) {
                            echo '<script>alert("Xin lỗi, số lượng vượt quá số sản phẩm trong kho.");</script>';
                            echo '<script>window.location.href = "index.php?act=viewcart";</script>';
                            return; // Dừng thực hiện, không cập nhật giỏ hàng
                        }

                        $item[4]++; // Tăng số lượng sản phẩm thêm 1
                        $item[5] = $item[4] * $item[3]; // Cập nhật tổng tiền
                        $product_exists = true;
                        break;
                    }
                }
                // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới
                if (!$product_exists) {
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    array_push($_SESSION['mycart'], $spadd);
                }
                echo '<script>alert("Thêm sản phẩm thành công.");</script>';
                echo '<script>window.location.href = "index.php?act=viewcart";</script>';
            }
            include 'view/cart/viewcart.php';
            break;
        case 'updatecart':
            $soluong = $_POST['soluong'];
            foreach ($_SESSION['mycart'] as $i => &$item) {
                if (isset($soluong[$i])) {
                    $onesp = loadone_sanpham($item[0]);
                    extract($onesp);
                    if (($soluong[$i]) > $SoLuongTon) {
                        echo '<script>alert("Xin lỗi, số lượng của sản phẩm ' . $item[1] . ' vượt quá số sản phẩm trong kho.");</script>';
                        // Dừng thực hiện, không cập nhật giỏ hàng
                    } else {
                        $item[4] = $soluong[$i];
                    }
                }
            }
            echo '<script>window.location.href = "index.php?act=viewcart";</script>';
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            echo '<script>window.location.href = "index.php?act=viewcart";</script>';
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
        case 'billconfirm':
            //tao bill
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['MaKhachHang'];
                } else {
                    $iduser = 0;
                }
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $note = $_POST['note'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();

                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $note);
                $tieude = "Đặt hàng website bán mỹ phẩm thành công!";
                $noidung = "<p>Cảm ơn quý khách $name đã đặt hàng của chúng tôi</p>";
                $noidung .= "<h4>Đơn hàng bao gồm:</h4>";
                foreach ($_SESSION['mycart'] as $cart) {
                    $noidung .= "<ul style='border:1px solid blue;margin:10px;'>
                            <li>Mã sản phẩm: $cart[0]</li>
                            <li>Tên sản phẩm: $cart[1]</li>
                            <li>Giá: $cart[3]</li>
                            <li>Số lượng: $cart[4]</li>
                            </ul>";
                }
                $maildathang = $email;
                $mail = new Mailer();
                $mail->dathangmail($tieude, $noidung, $maildathang);
                //insert into cart: $session['mycart']&idbill
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($cart[0], $cart[3], $cart[4], $idbill);
                    update_soluong($cart[0], $cart[4]);
                }
                //xoa session cart
                $_SESSION['mycart'] = [];
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "view/cart/billconfirm.php";
            break;
        case 'mybill':
            if (isset($_GET['mahd']) && ($_GET['mahd'] != null)) {
                $idhd = $_GET['mahd'];
                $listcart = loadall_cart_bill($_SESSION['user']['MaKhachHang'], $idhd);
            }
            include "view/cart/mybill.php";
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case 'thoat':
            session_unset();
            echo '<script>window.location.href = "index.php";</script>';
            break;
        case 'about-us':
            include "view/about-us.php";
            break;
        case 'danhmucsp';
            include "view/danhmucsp.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
