<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/lib.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>
<!--Header-->
<?php
include "header.php";
?>
<!--Update table-->
<?php
$query = "SELECT * FROM products ORDER BY product_id ASC";
$result = mysqli_query($db, $query);?>
    <center><br><a href="javascript:window.location.href='index.php';"><button class="btn" style="width: 10%">Back</button></a></center>
    <div class="col-12 col-s-12">
        <table class="tbUpdate" style="margin: auto;">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Adjustment</th>
            </tr>
            <?php
            if (mysqli_num_rows($result)>0) {
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr style="text-align: center">
                        <td><? echo $row['product_name']?></td>
                        <td><? echo "$ " . $row['product_price']?></td>
                        <td style="width: fit-content">
                            <img src="../assets/images/<? echo $row['product_image']?>" alt="" style="width:100%;display: block; margin-right: 10%; padding: 5% 10% 5% 5%">
                        </td>
                        <td style="width: 45%;">
                            <form class="submit" action="editProduct.php" method="POST">
                                <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                <input class="btn" type="submit" value="Edit">
                            </form>
                            <br>
                            <form class="submit" action="deleteProduct.php" method="POST" onsubmit="return confirmDelete();">
                                <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                <input class="btn" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php }
            } ?>
        </table>
    </div>
</body>
</html>
<script>
    function confirmDelete() {
        var del = confirm("Do you want to delete this product ?");
        if (del)
            return true;
        else
            return false;
    }
</script>
