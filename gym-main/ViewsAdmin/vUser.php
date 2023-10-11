<div id="content_left">
    <div class="left1">
        <h3>CHỨC NĂNG</h3>
        <p><a href="?module=<?=$module?>&act=them">Thêm Nhóm SP</a></p>
        <p><a href="?module=<?=$module?>">Danh sách Nhóm SP</a></p>
        <p><a href="?module=<?=$module?>">Thống kê</a></p>
    </div>

</div>
<div id="content_right">
    <h1> QUẢN LÝ NHÓM SẢN PHẨM</h1>
    <h2> DANH SÁCH NHÓM SẢN PHẨM</h2>
    <div id="right_detail">
        <table width="100%" border="1" class="Content_Table" cellpadding="0" cellspacing="0">
            <tr>
                <td> id </td>
                <td> Tên </td>
                <td> quyen </td>
                <td> Thao tác </td>
            </tr>
            <?php
            $rows = $nhomNguoiDung->data;
            foreach($rows as $row)
            {
                $trangthai="";
                if($row["quyen"]==0)
                    $trangthai = "user";
                else if($row["quyen"]==1)
                    $trangthai = "Có hiển thị";
                ?>
                <tr>
                    <td> <?=$row["id"]?> </td>
                    <td> <?=$row["account"]?> </td>
                    <td> <?=$trangthai?></td>
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