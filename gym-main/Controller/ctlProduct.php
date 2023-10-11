<?php
require_once("Model/clsProduct.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$tukhoa = isset($_REQUEST["tTukhoa"])? $_REQUEST["tTukhoa"]:"";
$cat_id = isset($_REQUEST["cat_id"])?$_REQUEST["cat_id"]:0;
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();
//gọi các view dựa trên biến act
if($act == "them"){
    require("ViewsAdmin/vAddProduct.php");
}
else if($act == "sua"){//hiển thị form sửa sản phẩm
    $ketqua = $sanpham->TimTheoIDSanpham($id);
    require("ViewsAdmin/vUpdateProduct.php");
}
else if($act == "xoa"){
    require("xulyXoaSP.php");
}
else if($act == "xulythem"){
    require("ctlAddProduct.php");
}
else if($act == "xulysua"){
    require("xulySuaSP.php");}
else{ //tìm kiếm sản phẩm sản phẩm
    $ketqua = $sanpham->LayDanhSachSanpham(0,$cat_id,$tukhoa);
    require("ViewsAdmin/vProduct.php");
}
?>