<?php
    require 'connect.php';
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM `categories`";
    $query = $connect -> prepare($sql);
    $query -> execute();
    $list_cate = array();
    
    while($cat = $query -> fetch(PDO::FETCH_ASSOC)){
        array_push($list_cate,$cat);
    }
    $sql = "SELECT * FROM `product`";
    $query = $connect -> prepare($sql);
    $query -> execute();
    $list_prd = array();
    while($prd = $query -> fetch(PDO::FETCH_ASSOC)){
        array_push($list_prd,$prd);
    } 
    foreach($list_prd as $prd){
        if($prd['id_product'] == $id){
            $prd_update = $prd ;
        }
    }
    if(isset($_POST['btn_submit'])){
        $name = $_POST['product-name'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $category = $_POST['categorys'];
        $image = $_POST['file'];
        $sql = "UPDATE `product` SET `name_prd` = '{$name}' , `price_prd` = '{$price}', `content_prd` = '{$content_prd}' WHERE `product`.`id_product` = {$id}";
        $connect  -> exec($sql);

        
        if($connect){
            header('Location:product.php');
        }
        
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
            <h1>SUA SAN PHAM</h1>
            <div class="addprd">
            <form action="" class="form" method="POST">
					<div class="form-group">
						<label for="product-name">Product Name</label>
						<input type="text" name="product-name" id="product-name"  >
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
                                foreach($list_cate as $cat){
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
