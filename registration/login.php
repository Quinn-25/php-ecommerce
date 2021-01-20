<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Minus Online Shopping Mall</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>
<!-- Logo -->
<div style="height: 100px; background-color: var(--theme-color); display: flex;">
    <a href="/" style="display: block; margin: auto;"><img src="../assets/images/icon/fulltext_logo.png" alt="logo" style="height: 100px;"/></a>
</div>
<!--Login Form-->
<div class="header">
    <P>MEMBER LOGIN</P>
</div>

<form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user" style="width: 100%">Login</button>
    </div>
    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
</form>
</body>
</html>