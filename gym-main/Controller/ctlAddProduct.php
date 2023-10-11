<?php
require_once("Public/Tienich.php");
$tensp = $_REQUEST["t1"];
$brand = $_REQUEST["t2"];
$price = $_REQUEST["t3"];

$image = UploadFile("f1", "image/Product");
$description = $_REQUEST["t4"];
$content = $_REQUEST["t5"];
$status =1;
if(isset($_REQUEST["rTrangthai"]))
    $trangthai = $_REQUEST["rTrangthai"];
$nhomsp = $_REQUEST["s1"];

$ketqua = $sanpham->ThemSanpham($tensp,$brand, $price, $image,$description,$content,$status,$nhomsp);
if($ketqua==FALSE)
    $thongbao="Lỗi thêm dữ liệu";
else
    $thongbao ="Thêm dữ liệu thành công";

?>