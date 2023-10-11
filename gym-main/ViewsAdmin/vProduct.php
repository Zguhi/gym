<div id="content_left">
    <div class="left1">
        <h3>CHỨC NĂNG</h3>
        <p><a href="?module=<?=$module?>&act=them">Thêm Sản phẩm</a></p>
        <p><a href="?module=<?=$module?>">Danh sách Sản phẩm</a></p>
        <p><a href="?module=<?=$module?>">Thống kê</a></p>
    </div>

</div>
<div id="content_right">
    <h1> QUẢN LÝ SẢN PHẨM</h1>
    <div id="Right_Search">
        <?php
        $tukhoa = isset($_REQUEST["tTukhoa"])? $_REQUEST["tTukhoa"]:"";
        $cat_id = isset($_REQUEST["cat_id"])?$_REQUEST["cat_id"]:0;
        ?>
        <form name="fTimkiem" id="fTiemkiem" action="">
            <input type="hidden" name="module" value="sanpham">
            <input type="hidden" name="act" value="timkiem">
            <span>Từ khóa:</span><input type="text" name="tTukhoa" id="tTukhoa" value="<?=$tukhoa?>">
            <span>Nhóm sản phẩm:</span>
            <select name="cat_id" id="cat_id">
                <option value="0">Tất tả nhóm SP</option>
                <?php
                require_once("Model/clsCategory.php");
                require_once("Public/Tienich.php");
                $nps = new clsCategory();
                //lấy nhóm SP tất cả trạng thái, sắp xếp theo thứu tự tăng dần
                $nps->LayDanhSachNhomSanpham(2);
                ShowOptions($nps->data,"id","cat_name",$cat_id);
                ?>
            </select>
            <input type="submit" name="bSearch" id="bSearch" value="Tìm kiếm">
        </form>
    </div>
    <div id="right_detail">
        <table width="100%" border="1" class="Content_Table" cellpadding="0" cellspacing="0">
            <tr>
                <td> id </td>
                <td> Product name </td>
                <td> Brand </td>
                <td> Price </td>
                <td> Image </td>
                <td> Description </td>
                <td> Content </td>
                <td> Status </td>
                <td> Control </td>
            </tr>
            <?php
            $rows = $sanpham->data;
            foreach($rows as $row)
            {
                $hinhanh = $row["images"];
                if($hinhanh=="")
                    $hinhanh = "no-Image.png";
                $trangthai="";
                if($row["status"]==1)
                    $trangthai = "có";
                else
                    $trangthai = "không";
                ?>
                <tr>
                    <td> <?=$row["id"]?> </td>
                    <td> <?=$row["title"]?> </td>
                    <td> <?=$row["brand"]?> </td>
                    <td> <?=$row["price"]?> VNĐ </td>
                    <td align="center"> <img width="80" src="image/Product/<?=$hinhanh?>"> </td>
                    <td> <?=$row["description"]?>  </td>
                    <td> <?=$row["content"]?>  </td>
                    <td> <?=$trangthai?> </td>
                    <td> <a href="?module=<?=$module?>&act=sua&id=<?=$row["id"]?>"> Sửa </a>
                        - <a href="?module=<?=$module?>&act=xoa&id=<?=$row["id"]?>"
                             onClick="return confirm('Chắc chắn xóa?');"> Xóa </a> </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>