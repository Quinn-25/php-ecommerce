<?php
session_start();

// initializing variables
$productName = "";
$productPrice = "";
$productImage = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'greenwich', 3306);
//initial data
$id = $_POST['id'];
$qry = "SELECT * FROM products WHERE product_id = '$id'";
$result = $db->query($qry);
$row = $result->fetch_assoc();
$name = $row['product_name'];
$price = $row['product_price'];
$image = $row['product_image'];
$category = $row['product_category'];

$cate_id = $_POST['cate_id'];
$qry1 = "SELECT * FROM categories WHERE category_id = '$cate_id'";
$result1 = $db->query($qry1);
$row1 = $result1->fetch_assoc();
$cate_name = $row1['category_name'];
?>