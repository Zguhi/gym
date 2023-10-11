<?php
//kiểm tra nếu chưa tồn tại biến $_SESSION["logined"] => chưa đăng nhập
//biến $_SESSION["logined"] chỉ được tạo ra tại trang XulyLogin.php khi đăng
//nhập thành công
if(isset($_SESSION["logined"])==false || $_SESSION["logined"]=="")
{
    //echo "<h3 style=\"color:red\">BẠN CHƯA ĐĂNG NHẬP</h3>\n";
    //echo "<a href=\"Login.php\"> Mời đăng nhập </a>\n";
    $thongbao = "Not logged in";
    $link_tieptuc = "index.php";
    require("ViewsAdmin/vKetqua.php");
    die();//dừng toàn phần còn lại (những trang mà include trang này)
}
?>