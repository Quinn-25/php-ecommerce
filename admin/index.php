<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../index.php");
}
?>
<!--Header & Navigation-->
<?php
include "header.php";
?>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/lib.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>
    <div class="col-4 col-s-6">
        <div class="header" style="width: 80%">
            <h2>Product Management</h2>
        </div>
        <form style="width: 80%">
            <a class="icon" href="addProduct.php"><img src="../assets/images/icon/addProduct.png"></a><br>
            <h3 style="text-align: center">Add Product</h3><br>
            <a class="icon" href="manageProduct.php"><img src="../assets/images/icon/updateProduct.png"></a><br>
            <h3 style="text-align: center">Update Product</h3><br>
        </form>
    </div>
    <div class="col-4 col-s-6">
        <div class="header" style="width: 80%">
            <h2>Category Management</h2>
        </div>
        <form style="width: 80%">
            <a class="icon" href="addCategory.php"><img src="../assets/images/icon/addCate.png"></a><br>
            <h3 style="text-align: center">Add Category</h3><br>
            <a class="icon" href="manageCategory.php"><img src="../assets/images/icon/updateCate.png"></a><br>
            <h3 style="text-align: center">Update Category</h3><br>
        </form>
    </div>
    <div class="col-4 col-s-6">
        <div class="header" style="width: 80%">
            <h2>Order Management</h2>
        </div>
        <form style="width: 80%">
            <a class="icon" href="#shoppingCart" onclick="alert('Opening Shopping Cart Detail!');"><img src="../assets/images/icon/shoppingCart.png"></a><br>
            <h3 style="text-align: center">Shopping Cart Detail</h3><br>
            <a class="icon" href="#orderDetail" onclick="alert('Opening Order Detail!');"><img src="../assets/images/icon/orderDetail.png"></a><br>
            <h3 style="text-align: center">Order Detail</h3><br>
        </form>
    </div>
<!--Product-->
<?php
require "structure/product_info.php";
?>

<!-- Footer -->
<?php
include "../structure/footer.php"
?>
</body>
