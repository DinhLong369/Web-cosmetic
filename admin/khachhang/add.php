<style>
    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
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
        <p>Thêm mới loại hàng</p>
    </div>
    <div class="row">
        <form action="index.php?act=addkh" method="post">
            <div class="row_mb20">
                Mã Khách Hàng <br>
                <input type="text" name="makhachhang" disabled>
            </div>
            <div class="row_mb20">
    Chọn Username: <br>
    <select name="username">
        <?php
        $listkhachhang = list_khachhang();
        foreach ($listkhachhang as $khachhang) {
            $username = $khachhang['username'];
            echo "<option value=\"$username\">$username</option>";
        }
        ?>
    </select>
</div>



            <div class="row_mb20">
                Tên Khách Hàng <br>
                <input type="text" name="tenkhachhang" placeholder="Tên Khách Hàng">
            </div>
            <div class="row_mb20">
                Số Điện Thoại <br>
                <input type="text" name="sodienthoai" placeholder="Số Điện Thoại">
            </div>
            <div class="row_mb20">
                Địa Chỉ <br>
                <input type="text" name="diachi" placeholder="Địa Chỉ">
            </div>
            <div>
                <input class="button-12" type="submit" name="themmoi" value="Thêm mới ">
                <input class="button-12" type="reset" value="Nhập lại">
                <a href="index.php?act=listkh"><input class="button-12" type="button" value="Danh sách"></a>
                <?php
                if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
                ?>
            </div>
        </form>
    </div>
</div>
