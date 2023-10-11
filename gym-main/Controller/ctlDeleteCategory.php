<?php
//require_once("Model/clsSanpham.php");
if($cat_id!="" && is_numeric($cat_id)){
    $sp = new clsSanpham();
    $sp->TimTheoNhomSanpham($id);//tìm các sản phẩm của nhóm có id này
    if($sp->data==NULL){ //nếu chưa có sản phẩm nào liên quan thì xóa
        $ketqua = $Nhomsanpham->XoaNhomSanpham($id);
        if($ketqua==FALSE)
            $thongbao="Lỗi xóa dữ liệu";
        else
            $thongbao ="Xóa dữ liệu thành công";
    }
//    else{//có sản phẩm thuộc nhóm thì sửa trang thái về 0
//        $ketqua = $Nhomsanpham->SuaTrangThaiSanpham($id,0);
//        if($ketqua==FALSE)
//            $thongbao="Lỗi xóa dữ liệu";
//        else
//            $thongbao ="Nhóm SP đã có sản phẩm liên quan
//					<br>Đã cập nhật sang trạng thái không hiển thị ";
//    }
}
else
    $thongbao ="Xóa dữ liệu lỗi id sản phẩm";
?>