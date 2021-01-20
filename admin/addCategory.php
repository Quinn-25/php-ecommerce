<?php
require_once 'server.php';

if (isset($_POST['addCategory'])) {
    // receive all input values from the form
    $name = $_POST['name'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) {
        array_push($errors, "Please input all information");
    }
    $category_check_query = "SELECT * FROM categories WHERE category_name='$name'";
    $result = mysqli_query($db, $category_check_query);
    $category = mysqli_fetch_assoc($result);

    if ($category) { // if user exists
        if ($category['username'] === $name) {
            array_push($errors, "Category already exists");
        }
    }
    function filterName ($name, $filter = "[^a-zA-Z0-9\-\_\.]"){
        return preg_match("~" . $filter . "~iU", $name) ? false : true;
    }

    if ( !filterName ($name) ){
        array_push($errors, "Not a valid name");
    }

    $sql1 = "INSERT INTO categories (category_name) VALUES('$name')";
    echo $sql1;
    $run1 = mysqli_query($db,$sql1); ?>
    <script>
        alert("Add category successfully !");
    </script>
    <?php      header('location: index.php');
} else { ?>
    <head>
        <title>Add Category</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/styleLogin.css">
    </head>
    <body>

    <!--Header-->
    <?php
    include "header.php";
    ?>
    <!--Add Product Form-->
    <center><br><a href="javascript:window.location.href='index.php';"><button class="btn" style="width: 10%">Back</button></a></center>
    <div class="header">
        <h2>Add New Category</h2>
    </div>
    <?php require_once '../registration/errors.php';?>
    <form method="post" action="addCategory.php">
        <?php include('../registration/errors.php'); ?>
        <div class="input-group">
            <label>Category Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <input type="hidden" name="cate_id" value="<?= $cate_id ?>">
        <div class="input-group">
            <button type="submit" class="btn" name="addCategory" style="width: 100%">Add</button>
        </div>
    </form><br><br>
    </body>
<?php } ?>