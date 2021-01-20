<?php
require_once 'server.php';

$cate_id = $_POST['cate_id'];
$query1 = "DELETE FROM categories WHERE category_id = '$cate_id'";
$result1 = mysqli_query($db, $query1);
if ($result1) { ?>
    <script>
        alert ("Delete category successfully !");
        window.location.href = "manageCategory.php";
    </script>
<?php } else { ?>
    <script>
        alert ("Delete category failed !");
        window.location.href = "manageCategory.php";
    </script>
<?php } ?>