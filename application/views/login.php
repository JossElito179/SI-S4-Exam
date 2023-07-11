<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/loginCss.css'); ?>">
    <title>Log in</title>
</head>
<body>
    <div class="center">
        <h1>Log in</h1>
        
        <?php
        if(isset($message)){
            echo '<p style=color:red;>'.$message.'</p>';
        }
        ?>

        <form action="<?php echo site_url("Login/authenticate") ?>" method="post">
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email :</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password :</label>
            </div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Already have an account? <a href="#">Sign in here.</a>
            </div>
        </form>
    </div>
</body>
</html>