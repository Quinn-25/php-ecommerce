<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome new member</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styleLogin.css">
</head>
<body>
<!-- Logo -->
<div style="height: 100px; background-color: var(--theme-color); display: flex;">
    <a href="/" style="display: block; margin: auto;"><img src="../assets/images/icon/fulltext_logo.png" alt="logo" style="height: 100px;"/></a>
</div>
<!--Signup Form-->
<div class="header">
    <p>CREATE A NEW ACCOUNT</p>
</div>

<form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="login.php" style="width: 100%">Sign in</a>
    </p>
</form>
</body>
</html>