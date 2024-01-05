<?php
function insert_taikhoan($email, $pass,$token,$date_created)
{
    $sql = "insert into tuser(username,passwords,token,date_created) values('$email','$pass','$token','$date_created')";
    pdo_execute($sql);
    $sql = "insert into tkhachhang(username) values('$email')";
    pdo_execute($sql);
}
function checkuser($email,$pass)
{
    $sql = "SELECT tuser.*, tkhachhang.* FROM tuser 
    INNER JOIN tkhachhang ON tuser.username = tkhachhang.username 
    WHERE tuser.username='".$email."' AND passwords='".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail($email)
{
    $sql = "select * from tuser where username='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id, $name, $address, $tel, $pass)
{
    $sql = "UPDATE tkhachhang
        INNER JOIN tuser ON tkhachhang.username = tuser.username
        SET tkhachhang.TenKhachHang = '".$name."',
            tkhachhang.DiaChi = '".$address."',
            tkhachhang.SoDienThoai = '".$tel."',
            tuser.passwords = '".$pass."'
        WHERE tkhachhang.MaKhachHang = '".$id."'";
    pdo_execute($sql);
}
function update_stt_taikhoan($email, $status,$token)
{
    $sql = "UPDATE tuser SET status = '".$status."', token = '".$token."'
        WHERE username = '".$email."'";
    pdo_execute($sql);
}
function send_mail(){
    $config = array();

}
?>
