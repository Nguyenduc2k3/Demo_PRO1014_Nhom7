<?php
    require 'connect.php';
    $sql = "SELECT * FROM `product`";
    $query = $connect -> prepare($sql);
    $query -> execute();
    $list_prd = array();
    while($prd = $query -> fetch(PDO::FETCH_ASSOC)){
        array_push($list_prd,$prd);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Demo_PRO1014_Nhom7/public/admin/css/style.css">
</head>
<body>
    <div class="container">
    <header>
        <div class="logo"> <img src="http://localhost/Demo_PRO1014_Nhom7/public/admin/image/logo.png" alt=""></div>
    </header>
    <main>
        <div class="nav">
            <ul>
                <li><a href="/views/admin/manage/users.php">Quản lí người dùng</a></li>
                <li><a href="">Quản lí lịch đặt hàng</a></li>
                <li><a href="">Danh sách sản phẩm</a></li>
                <li><a href="">Thêm sản phẩm</a></li>
                <li><a href="">Bình luận</a></li>
                <li><a href="">Thống kê</a></li>
                <li><a href="login.php">Thoát</a></li>
            </ul>
        </div>
        <div class="section">
            <!-- // Hiển thị sản phẩm -->
            <h1>DANH SÁCH SẢN PHẨM</h1>
             <div class="show">
                 <table border='1px' cellspacing="0" cellpadding="5px">
                <tr>
                    <td>STT</td>
                    <td>ID</td>
                    <td>Danh mục</td>
                    <td>Tên sản phẩm</td>
                    <td>Giá</td>
                    <td>Hình ảnh</td>
                    <td>Thông tin</td>
                    <td>Thao tác</td>
                </tr>
                    <?php
                    $stt = 0 ;
                    foreach($list_prd as $item){
                        $stt++
                    ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $item['id_product'] ?></td>
                    <td><?php echo $item['id_categori'] ?></td>
                    <td><?php echo $item['name_prd'] ?></td>
                    <td><?php echo $item['price_prd'] ?></td>
                    <td><?php echo $item['image'] ?></td>
                    <td><?php echo $item['content_prd'] ?></td>
                    <td>
                    <a href="">Sửa</a> 
                    </td>
                </tr>
                <?php
                    }
                ?>

            </table>
        </div>
        </div>
    </main>
    <footer></footer>
    </div>
</body>
</html>

