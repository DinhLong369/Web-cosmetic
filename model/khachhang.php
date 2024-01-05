<?php
   function insert_khachang($username,  $tenkhachhang, $sodienthoai, $diachi) {
    $sql ="INSERT INTO tkhachhang(Username,TenKhachHang,SoDienThoai,DiaChi) values('$username', '$tenkhachhang','$sodienthoai', '$diachi')";  
    pdo_execute($sql);
   } 
   
   function delete_khachhang($makhachhang) {
    $sql ="DELETE  FROM tkhachhang where makhachhang=".$makhachhang;
    $listdanhmuc = pdo_query($sql);
    } 
    function list_khachhang() {
      $sql = "SELECT tuser.*, tkhachhang.* FROM tuser 
      INNER JOIN tkhachhang ON tuser.username = tkhachhang.username order by tkhachhang.makhachhang desc"; ; 
     
      $listkhachhang = pdo_query($sql);
      return $listkhachhang ; 
    }

    function sua_khachhang($makhachhang) {
        $sql ="SELECT * FROM tkhachhang where makhachhang=".$makhachhang;
        $khachhang_loaikh=pdo_query_one($sql) ;
        return  $khachhang_loaikh ;
     }
     function update_kh($makhachhang,$username, $tenkhachhang,$sodienthoai, $diachi) {
        $sql ="UPDATE  tkhachhang set username='".$username."' , TenKhachHang='".$tenkhachhang."' , SoDienThoai='".$sodienthoai."', DiaChi='".$diachi."'    where makhachhang=".$makhachhang;  
        pdo_execute($sql);
     }
?>