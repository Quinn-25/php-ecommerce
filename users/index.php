<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}

elseif ($_SESSION['username']=='admin'){
    header('location: ../admin/index.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../index.php");
}
?>

<!--Header-->
<?php
include "../structure/header.php";
?>

<!--Navbar-->
<?php  if (isset($_SESSION['username'])) { ?>
    <div class="topnav" id="myTopnav">
        <div class="dropdown">
            <button class="dropbtn">
                Welcome <strong><?php echo $_SESSION['username']; ?></strong>
            </button>
            <div class="dropdown-content">
                <a href="index.php?logout='1'">Log Out </a>
            </div>
        </div>
        <a href="#home" class="active">Home</a>
        <a href="#news">Category</a>
        <a href="#contact">Contact</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
<?php } ?>
</div>
<!-- Slide Show -->
<?php
include "../structure/slide.php"
?>
<!-- Description - temporary not used  -->
<!--<section class="content">
    <div class="col-12 col-s-12">
    </div>
</section>-->

<!--Product-->
<?php
require "../structure/product_info.php";
?>

<!-- Footer -->
<?php
include "../structure/footer.php"
?>
