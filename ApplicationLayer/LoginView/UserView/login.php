<?php
// Initialize the session
session_start();
 
require_once "../../../BusinessServiceLayer/controller/LoginController.php";

/// Define variables and initialize with empty values
$username = "";

$user = new LoginController();

list($username_err, $password_err) = $user->Login();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .header {
                padding: 20px;
                text-align: center;
                background: #157fd6;
                font-size: 30px;
                }
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; padding: 20px; margin-left: auto; margin-right: auto}
    </style>
</head>
<body>
    <div class="header">
        
    </div>
    <div class="wrapper">
        <center><h2>SIGN IN</h2></center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Login">
                <input type="reset" class="btn btn-dark" value="Reset">
            </div>
            <p>Don't have an account?</p>
            <a href="Cregister.php">Sign up as customer</a><br>
            <a href="SPregister.php">Sign up as service provider</a><br>
            <a href="Rregister.php">Sign up as runner</a>
            <br>
        </form>
    </div>
</body>
</html>