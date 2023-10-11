<?php
require_once("clsDatabase.php");
class clsProduct
{
    public $db;
    public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu

    function __construct()
    {
        $this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
        $this->data = array();
    }
    //các hàm truy vấn, thêm, sửa, xóa
    //Hàm LayDanhSachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
    function LayDanhSachSanpham($trangthai = 1, $cat_id = 0, $tukhoa = "")
    {
        $sql = "select * from sanpham ";
//        if ($cat_id != 0)
//            $sql = $sql . " AND Sp.cat_id = " . $cat_id;
//        //nếu khác 2 thì thêm mệnh đề WHERE để lọc,
//        //còn nếu =2 thì không có có WHERE => sẽ hiển thị mọi sản phẩm
//        if ($trangthai != 2) {
//            $sql = $sql . " AND status = " . $trangthai;
//            $sql = $sql . " AND cat_status = " . $trangthai;
//        }
//        //bổ sung tìm theo từ khóa
//        if ($tukhoa != "")
//            $sql = $sql . " AND Sp.title LIKE '%" . $tukhoa . "%'";

        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    //Hàm thêm dữ liệu
    function ThemSanpham($tensp,$brand, $price, $image,$description,$content,$status,$cat_id)
    {
        $sql = "INSERT INTO sanpham VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        $data[] = $tensp;
        $data[] = $brand;
        $data[] = $price;
        $data[] = $image;
        $data[] = $description;
        $data[] = $content;
        $data[] = $status;
        $data[] = $cat_id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        return $ketqua;
    }
    //Hàm sửa dữ liệu
    function SuaSanpham($id,$title,$brand,$price, $image, $description,$content,$status,$cat_id)
    {
        $sql = "UPDATE sanpham SET title = ?, brand = ?, price = ?, 
				image = ?,description = ?,content = ?, status=?, cat_id=? WHERE id=?";
        $data[] = $title;
        $data[] = $brand;
        $data[] = $price;
        $data[] = $image;
        $data[] = $description;
        $data[] = $content;
        $data[] = $status;
        $data[] = $cat_id;
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        return $ketqua;
    }
    //Hàm TimTheoIDSanpham($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
    function TimTheoIDSanpham($id, $trangthai=2)
    {
        $sql = "SELECT * FROM sanpham WHERE id=?";
        if($trangthai!=2)
            $sql = $sql . " AND status = " . $trangthai;

        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        //LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data=NULL;
        if($ketqua==TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    function TimTheo_DS_IDSanpham($list, $trangthai=2)
    {
        $sql = "SELECT * FROM sanpham WHERE id in ($list)";
        if($trangthai!=2)
            $sql = $sql . " AND status = " . $trangthai;

        $data = NULL;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        //LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data=NULL;
        if($ketqua==TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
}
?>