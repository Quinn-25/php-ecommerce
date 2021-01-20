<?php require_once ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Caterory</title>
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
$query = "SELECT * FROM categories ORDER BY category_id ASC";
$result = mysqli_query($db, $query);?>
<center><br><a href="javascript:window.location.href='index.php';"><button class="btn" style="width: 10%">Back</button></a></center>
<div class="col-12 col-s-12">
    <table class="tbUpdate" style="margin: auto;">
        <tr>
            <th>Product Name</th>
            <th>Adjustment</th>
        </tr>
        <?php
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr style="text-align: center">
                    <td><? echo $row['category_name']?></td>
                    <td style="width: 70%;">
                        <form class="submit" action="editCategory.php" method="POST">
                            <input type="hidden" name="cate_id" value="<?= $row['category_id'] ?>">
                            <input class="btn" type="submit" value="Edit">
                        </form>
                        <br>
                        <form class="submit" action="deleteCategory.php" method="POST" onsubmit="return confirmDelete();">
                            <input type="hidden" name="cate_id" value="<?= $row['category_id'] ?>">
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
        var del = confirm("Do you want to delete this category ?");
        if (del)
            return true;
        else
            return false;
    }
</script>
