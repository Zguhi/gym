<?php
session_start();
?>
<a href="?module=sanpham">Bam vao day de mua hang</a>
<div id="content" class="clear_fix">
    <?php
    //hiển thị phần nội dung giữa của trang web
    $module = "";
    if(isset($_REQUEST["module"]))
        $module = $_REQUEST["module"];
    if($module=="tintuc")
    {
        require("ControllersHome/ctlTintuc.php");
    }
    else if($module=="sanpham")
    {
        require("Controller/ctlProductUser.php");
    }
    else if($module=="chitietsanpham")
    {
        require("Controller/ctlProductUser.php");
    }
    else if($module=="cart")
    {
        require("Controller/ctlCart.php");
    }
    else if($module=="checkout")
    {
        require("ControllersHome/ctlCheckout.php");
    }
    else
    {
        require("ControllersHome/ctlHome.php");
    }
    ?>
    <?php
    if($module!="cart" && $module!="chitietsanpham")
    {
        //include("ViewsHome/inc_Right.php");
    }
    ?>

</div>