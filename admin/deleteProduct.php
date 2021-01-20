<?php
require_once 'server.php';

$id = $_POST['id'];
$query = "DELETE FROM products WHERE product_id = '$id'";
$result = mysqli_query($db, $query);
if ($result) { ?>
    <script>
        alert ("Delete product successfully !");
        window.location.href = "manageProduct.php";
    </script>
<?php } else { ?>
    <script>
        alert ("Delete product failed !");
        window.location.href = "manageProduct.php";
    </script>
<?php } ?>