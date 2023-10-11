<?php
require_once("clsDatabase.php");
class clsAdmin
{
    public $db;
    public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
    function __construct()
    {
        $this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
        $this->data = array();
    }
    function KiemTraTaiKhoan($user,$pass)
    {
        $sql = "SELECT * FROM user WHERE account=? and password=?";

        $data[] = $user;
        $data[] = $pass;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        //LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data=NULL;
        if($ketqua==TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }

    function LayDanhSachUser(){
        $sql = "SELECT * FROM user where quyen = 0";
        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
}
?>
