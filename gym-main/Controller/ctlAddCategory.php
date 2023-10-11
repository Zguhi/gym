<?php
$tennhomsp = $_REQUEST["t1"];
$trangthai =1;
if(isset($_REQUEST["rTrangthai"]))
    $trangthai = $_REQUEST["rTrangthai"];
$ketqua = $Nhomsanpham->ThemNhomSanpham($tennhomsp, $trangthai);
if($ketqua==FALSE)
    $thongbao="Lỗi thêm dữ liệu";
else
    $thongbao ="Thêm dữ liệu thành công";

?>