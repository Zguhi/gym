<div id="content_left">
</div>
<div id="content_right">
    <h1>SẢN PHẨM</h1>
                <?php
                require_once("Model/clsProduct.php");
                $sanpham = new clsProduct();
                //lấy nhóm SP tất cả trạng thái, sắp xếp theo thứu tự tăng dần
                $sanpham->LayDanhSachSanpham();
                ?>
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
                    <td>
                        <a href="?module=cart&act=add&masp=<?=$row["id"]?>" style="color: green"
                             onClick="return confirm('Add to Cart ?');"> Buy</a> </td>
                    </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>