<?php
    require 'connect.php';
   
    $sql = " SELECT * FROM `categories`";
    $query = $connect -> prepare($sql);
    $query -> execute();
    $list_cat = array();
    while($name_cat = $query -> fetch(PDO::FETCH_ASSOC)){
        array_push($list_cat,$name_cat);
    }
    if(isset($_POST['btn_submit'])){
        $name = $_POST['product-name'];
        $desc = $_POST['description'];
        $price = $_POST['price'];
        $cat_id = $_POST['categorys'];
        $image = $_POST['file'];
        $sql = "INSERT INTO `product` (`name_prd`, `price_prd`, `content_prd`, `id_categori`,`image`) VALUES ('{$name}', '{$price}', '{$desc}', '{$cat_id}','{$image}')";
        $connect -> exec($sql);
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
    <!-- <link rel="stylesheet" href="style.css"> -->
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
            <div class="addprd">
            <form action="" class="form" method="POST">
					<div class="form-group">
						<label for="product-name">Product Name</label>
						<input type="text" name="product-name" id="product-name" />
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<input type="text" name="description" id="description" />
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" name="price" id="price" />
					</div>
					<div class="form-group">
						<label for="categorys">Category</label>
						<select name="categorys" class="form-select" id="categorys">
                        <option value="">--Chọn--</option>
                            <?php
                                foreach($list_cat as $cat){
                            ?>
                                <option value="<?php echo $cat['id_categori'] ?>"><?php echo $cat['name_categori'] ?></option>
                            <?php
                                }
                            ?>
						</select>
					</div>
					<div class="form-group">
						<label for="file">Room Image</label>
						<input type="file" name="file" id="file" />
					</div>
					<div class="form-footer">
						<input class="btn btn-submit" name="btn_submit" type="submit" value="Save" />
					</div>
				</form>
            </div>

        </div>
    </main>
    <footer></footer>
    </div>
</body>
</html>

