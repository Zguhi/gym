<?php
require_once("Models/clsHoadon.php");
require_once("Models/clsSanpham.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=cart";
$thongbao ="";
//Lấy thông tin từ form và chèn hóa đơn mới
if(isset($_SESSION["cart"])==false)
    $thongbao ="Giỏ hàng rỗng";
else if(isset($_REQUEST["dathang"])==false)
    $thongbao ="lỗi submit form đặt hàng";
else
{
    $hoten = $_REQUEST["hoten"];
    $diachi = $_REQUEST["diachi"];
    $dienthoai = $_REQUEST["dienthoai"];
    $ngaynhan = $_REQUEST["ngaynhan"];
    $hoadon = new clsHoadon();

    $ketqua = $hoadon->ThemHoadon($hoten,$diachi,$dienthoai,$ngaynhan);
    if($ketqua==FALSE)
        $thongbao ="LỖI THÊM HÓA ĐƠN MỚI";
    else
    {
        //lấy mã hóa đơn tự động sinh từ lệnh insert trên
        $mahd = $hoadon->getLastId();
        $sanpham = new clsSanpham();
        //duyệt từng mặt hàng trong giỏ hàng (cart) lấy ra masp và soluong
        //lưu mã hóa đơn, mã sản phẩm, số lượng, giá sản phẩm vào chi tiết hóa đơn
        foreach($_SESSION["cart"] as $masp=>$soluong)
        {
            $ketqua = $sanpham->TimTheoIDSanpham($masp);
            $giasp = $sanpham->data["price"];//lấy giá sản phẩm
            $ketqua = $hoadon->ThemChitietHoadon($mahd,$masp,$soluong,$giasp);
            if($ketqua==FALSE)
                $thongbao ="LỖI THÊM CHI TIẾT HÓA ĐƠN";
            else
            {
                unset($_SESSION["cart"]);//xóa giỏ hàng
                $thongbao ="CẢM ƠN BẠN ĐÃ MUA HÀNG, CHÚNG TÔI SẼ LIÊN HỆ SỚM NHẤT";
                $thongbao .= "<br>Tài khoản: Trần Mạnh Trường";
                $thongbao .= "<br>STK: 0011223344";
                $thongbao .= "<br>Ngân hàng: BIDV";
            }
        }
    }
}
$sanpham = new clsSanpham();
$ketqua = $sanpham->LaySanphamMoiNhat(3);//lấy 3 sản phẩm mới nhất
require_once("ViewsHome/v_Home.php");
require("Views/vKetqua.php");
?>