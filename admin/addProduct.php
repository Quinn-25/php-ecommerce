<?php
require_once 'server.php';

if (isset($_POST['addProduct'])) {
    // receive all input values from the form
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category = $_POST['category'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error
    foreach ([$name, $price, $image,$category] as $field) {
        if (empty($field)) {
            array_push($errors, "Please input all information");
        }
    }
    function filterName ($name, $filter = "[^a-zA-Z0-9\-\_\.]"){
        return preg_match("~" . $filter . "~iU", $name) ? false : true;
    }
    if ( !filterName ($name) ){
        array_push($errors, "Not a valid name");
    }


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

    // Finally, register user if there are no errors in the form
        $sql1 = "INSERT INTO products (product_name, product_image, product_price, product_category) VALUES('$name', '$image', '$price','$category')";
        echo $sql1;
        $run1 = mysqli_query($db,$sql1); ?>
        <script>
            alert("Add student successfully !");
        </script>
    <?php      header('location: index.php');
        } else { ?>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>

<!--Header-->
<?php
    include "header.php";
?>
<!--Add Product Form-->
    <center><br><a href="javascript:window.location.href='index.php';"><button class="btn" style="width: 10%">Back</button></a></center>
    <div class="header">
        <h2>Add New Product</h2>
    </div>
    <form method="post" action="addProduct.php">
        <?php include('../registration/errors.php'); ?>
        <div class="input-group">
            <label>Product Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="input-group">
            <label>Product Price</label>
            <input type="text" name="price" value="<?php echo $price; ?>" required>
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
        </select><br><br>
        <label>Image: </label>
        <input type="file" name="image" accept="images/*" required>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="input-group">
            <button type="submit" class="btn" name="addProduct" style="width: 100%">Add</button>
        </div>
    </form><br><br>
</body>
<?php } ?>