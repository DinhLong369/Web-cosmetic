<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into tbinhluan(NoiDung,MaKhachHang,MaChiTietSP,NgayBinhLuan) 
    values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro){
    $sql = "SELECT tbinhluan.*, tkhachhang.* FROM tbinhluan 
    INNER JOIN tkhachhang ON tbinhluan.MaKhachHang = tkhachhang.MaKhachHang 
    WHERE MaChiTietSP='".$idpro."' order by MaBinhLuan desc";
    $listbl=pdo_query($sql);
    return $listbl;
}
function list_binhluan() {
    $sql ="SELECT * FROM tbinhluan order by MaBinhLuan desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan ; 
}
function delete_binhluan($mabinhluan) {
    $sql ="DELETE  FROM tbinhluan where mabinhluan=".$mabinhluan;
    $listbinhluan = pdo_query($sql);
    } 
?>