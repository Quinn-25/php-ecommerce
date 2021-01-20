<?php
require_once "server.php";

if (isset($_POST['updatePro'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

//đoạn code dùng để upload & xử lý ảnh
//kiểm tra người dùng đã chọn file ảnh có dung lượng khác 0
if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
   //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
    $temp_name = $_FILES['image']['tmp_name'];
    //khai báo biến dùng để lưu tên của ảnh
    $img_name = $_FILES['image']['name'];
    //tách tên file ảnh dựa vào dấu chấm
    $parts = explode(".", $img_name);
    //tìm index cuối cùng
    $lastIndex = count($parts) - 1;
    //lấy ra extension (đuôi) file ảnh
    $extension = $parts[$lastIndex];
    //thiết lập tên mới cho ảnh
    $image = "pro" . $id  . "." . $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $image_folder = "../assets/images/";
    $destination = $image_folder . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
}
else { //người dùng không update ảnh => lấy lại ảnh cũ
    $image =  $row['product_image'];
}
$query12 = "UPDATE products SET product_name = '$name', product_price = '$price', product_image = '$image', product_category = '$category' WHERE product_id = '$id'";
$result12 = mysqli_query($db, $query12);
if ($result12) { ?>
  <script>
      alert("Update successfully !");
      window.location.href = "manageProduct.php";
  </script>
<?php } else { ?>
    <script>
      alert("Update failed !");
      window.location.href = "manageProduct.php";
  </script>
<?php } }

include "../structure/header.php";
?>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>
    <center><br><a href="javascript:window.location.href='manageProduct.php';"><button class="btn" style="width: 10%">Back</button></a></center>
    <div class="header">
        <h2>Edit Product</h2>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <label>Product Name: </label>
            <input type="text" required maxlength="30" name="name" value="<?= $name ?>">
        </div>
        <div class="input-group">
            <label>Price: </label>
            <input type="text" required name="price" value="<?= $price ?>">
        </div>
        <label>Category:</label>
        <?php
                $sql = "SELECT * FROM categories";
                $run = mysqli_query($db, $sql);
                ?>
        <select name="category">
        <?php
                while ($row1 = mysqli_fetch_array($run)) {
                    if ($row1['category_id'] == $category) { ?>
                <option value='<?= $category ?>' selected> <?= $row1['category_name'] ?> </option>
            <?php } else { ?>
                <option value='<?= $row1['category_id'] ?>'> <?= $row1['category_name'] ?> </option>
            <?php } } ?>
        </select><br>
        <img src='/assets/images/<?= $row['product_image'] ?>'  width="150" height="150" style="display: block; margin:auto" ><br>
        <label class="input-group">Image: </label>
        <input type="file" name="image" accept="images/*">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="input-group">
            <input type="submit" value="Update" name="updatePro" class="btn" style="width:100%;">
        </div>
    </form><br><br>
</body>
</html>