<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./danhmuc.css">
  <title>Document</title>
</head>
<body>
<style>
td,
th {
  border: 1px solid rgb(190, 190, 190);
  padding: 10px;
}

td {
  text-align: center;
}

tr:nth-child(even) {
  background-color: #eee;
}

th[scope='col'] {
  background-color: #696969;
  color: #fff;
}

th[scope='row'] {
  background-color: #d7d9f2;
}

caption {
  padding: 10px;
  caption-side: bottom;
}

table {
  border-collapse: collapse;
  border: 2px solid rgb(200, 200, 200);
  letter-spacing: 1px;
  font-family: sans-serif;
  font-size: 0.8rem;
}

.sua {
  background-color:#8B4513;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.sua:hover,
.sua:focus {
  background-color: #F082AC;
}
.xoa {
  margin-top:10px;
  background-color:#D2691E;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;

  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;

}

.xoa:hover,
.xoa:focus {
  background-color: #F082AC;
}


.button-12 {
   margin-top: 12px;

  padding: 6px 14px;
  font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
  border-radius: 6px;
  border: none;

  background: #6E6D70;
  box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.1), inset 0px 0.5px 0.5px rgba(255, 255, 255, 0.5), 0px 0px 0px 0.5px rgba(0, 0, 0, 0.12);
  color: #DFDEDF;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-12:focus {
  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1px rgba(0, 0, 0, 0.1), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
  outline: 0;
}



</style>


<div class="row"> 
      <div class="row_header">
        <p>Danh Sách loại hàng</p>
      </div>
      <div class="row">
        <div class="row_nb10 fomdsloai">
          <table>
            <tr>
              <th></th>
              <th>Mã Khách Hàng</th>
              <th>User Name</th>
              <th>Passwords</th>
              <th>Tên Khách Hàng</th>
              <th>Số Điện Thoại</th>
              <th>Địa Chỉ</th>
              <th></th>
            </tr>
            <?php
            foreach ($listkhachhang as $khachhang) {
             extract($khachhang) ; // lấy dữ liệu ra 
             $suakh = "index.php?act=suakh&makhachhang=".$MaKhachHang;
             $xoakh = "index.php?act=xoakh&makhachhang=".$MaKhachHang;
             echo'
             <tr>
             <td><input type="checkbox"></td>
             <td>'.$MaKhachHang.'</td>
             <td>'.$username.'</td>
             <td>'.$passwords.'</td>
             <td>'.$TenKhachHang.'</td>
             <td>'.$SoDienThoai.'</td>
             <td>'.$DiaChi.'</td>
             <td><a href="'.$suakh.'"><input  class="sua" type="button" value="Sửa"></a><a  href="'.$xoakh.'"><input class="xoa" type="button" value="Xóa"></a> </td>
           </tr>';
          }
            ?>
          </table>
        </div>
        <div >
          <input class='button-12' type="button" value="Chọn tất cả">
          <input class='button-12' type="button" value="Bỏ chọn tất cả">
          <input class='button-12' type="button" name="" id="" value="Xóa các mục đã chọn">
          <a href="index.php?act=addkh"><input class='button-12' type="button" value="Nhập thêm"></a>
          
        </div>
      </div>
    </div>
    