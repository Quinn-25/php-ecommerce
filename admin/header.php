<!-- Header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Minus | Online Shopping for Electronics, Computers; more</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/lib.css">
    <link rel="stylesheet" href="../assets/css/styleMain.css">
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    --></head>
<body>

<!-- Logo -->
<div style="height: 100px; background-color: var(--theme-color); display: flex;">
    <a href="index.php" style="display: block; margin: auto;"><img src="/assets/images/icon/fulltext_logo.png" alt="logo" style="height: 100px;"/></a>
</div>
<!-- Header & Navigation -->
<div class="topnav" id="myTopnav">
    <div class="dropdown">
        <button class="dropbtn">
            Welcome <strong>Admin</strong>
        </button>
        <div class="dropdown-content">
            <a href="index.php?logout='1'">Log Out</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">
            Product Management
        </button>
        <div class="dropdown-content">
            <a href="addProduct.php">Add Product</a>
            <a href="manageProduct.php">Update Product</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">
            Category Management
        </button>
        <div class="dropdown-content">
            <a href="addCategory.php">Add Category</a>
            <a href="manageCategory.php">Update Category</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">
            Ordering Management
        </button>
        <div class="dropdown-content">
            <a href="#shoppingCart" onclick="alert('Opening Shopping Cart Detail!');">Shopping Cart Detail</a>
            <a href="#orderDetail" onclick="alert('Opening Order Detail!');">Order Detail</a>
        </div>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>