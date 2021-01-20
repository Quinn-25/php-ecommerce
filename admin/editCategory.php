<?php
require_once "server.php";

if (isset($_POST['updateCate'])) {
    $cate_name = $_POST['cate_name'];

    $query12 = "UPDATE categories SET category_name = '$cate_name'  WHERE category_id = '$cate_id'";
    $result12 = mysqli_query($db, $query12);
    if ($result12) { ?>
        <script>
            alert("Update successfully !");
            window.location.href = "manageCategory.php";
        </script>
    <?php } else { ?>
        <script>
            alert("Update failed !");
            window.location.href = "manageCategory.php";
        </script>
    <?php } }

include "/structure/header.php";
?>
<html>
<head>
    <title>Edit Category</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>
<center><br><a href="javascript:window.location.href='manageCategory.php';"><button class="btn" style="width: 10%">Back</button></a></center>
<div class="header">
    <h2>Edit Category</h2>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="input-group">
        <label>Category Name: </label>
        <input type="text" required maxlength="30" name="cate_name" value="<?= $name ?>">
    </div>
    <input type="hidden" name="cate_id" value="<?= $cate_id ?>">
    <div class="input-group">
        <input type="submit" value="Update" name="updateCate" class="btn" style="width:100%;">
    </div>
</form><br><br>
</body>
</html>