<?php
require_once("Model/clsAdmin.php");
$act = "";
$id = "";
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
    $act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
    $id = $_REQUEST["id"];
//tạo đối tượng clsCategory
$nhomNguoiDung = new clsAdmin();
//gọi các view dựa trên biến act
if($act == "them"){
    require("ViewsAdmin/vAddCategory.php");
}
else if($act == "sua"){//hiển thị form sửa nhóm sản phẩm
//    $ketqua = $nhomNguoiDung->TimTheoIDNhomSanpham($id);
//    require("ViewsAdmin/vUpdateCategory.php");
}
else if($act == "xoa"){
    require("ctlDeleteCategory.php");
}
else if($act == "xulythem"){
    require("ctlAddCategory.php");
}
else if($act == "xulysua"){
    require("ctlUpdateCategory.php");}
else{ //hiển thị tất cả nhóm sản phẩm
    $ketqua = $nhomNguoiDung->LayDanhSachUser();
    require("ViewsAdmin/vUser.php");
}
?>