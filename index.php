<?php
include "structure/header.php";
?>
<!-- Navigation -->
<div class="topnav" id="myTopnav">
    <div class="dropdown">
        <button class="dropbtn">
                Welcome to Minus
        </button>
        <div class="dropdown-content">
            <a href="registration/login.php">Log In</a>
            <a href="registration/register.php">Sign Up</a>
        </div>
    </div>
<?php   if (isset($_SESSION['username'])) { ?>
            <a href="users/index.php" class="active">Home</a>
<?php   } else { ?>
            <a href="index.php" class="active">Home</a>
<?php   }?>
        <a href="#contact">Contact</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!-- Slide Show -->
<?php
    include "structure/slide.php"
?>
<!--Product-->
<?php
    require "structure/product_info.php";
?>

<!-- Footer -->
<?php
include "structure/footer.php"
?>


