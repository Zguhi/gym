<?php
require_once("Public/Tienich.php");
$id = $_REQUEST["id"];
$tensp = $_REQUEST["t1"];
$brand = $_REQUEST["t2"];
$price = $_REQUEST["t3"];

$image = UploadFile("f1", "image/Product");
if($image=="")//nếu không chọn ảnh mới thì lấy ảnh hiện taij
    $image = $_REQUEST["anhHientai"];

$description = $_REQUEST["t4"];
$content = $_REQUEST["t5"];
$status =1;
if(isset($_REQUEST["rTrangthai"]))
    $status = $_REQUEST["rTrangthai"];
$cat_id = $_REQUEST["s1"];

$ketqua = $sanpham->SuaSanpham($id,$tensp,$brand,$price, $image, $description,$content,$status,$cat_id);
if($ketqua==FALSE)
    $thongbao="Lỗi sửa dữ liệu";
else
    $thongbao ="Sửa dữ liệu thành công";

require("Views/vKetqua.php");
?>