<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once "../../../BusinessServiceLayer/controller/RegisterController.php";

/// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$sp_type = $sp_phone = $sp_location = $sp_ssmcode = $sp_email = "";

$user = new RegisterController();

list($username_err, $password_err, $confirm_password_err) = $user->SPregister();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        body {
    background: url('blue.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
    }

.logo {
    width: 213px;
    height: 20px;
    background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 650px;
    padding: 50px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}


.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #ff7b81;
}

    </style>
</head>
<body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Turbo Runner Delivery System</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.html"><span class="glyphicon glyphicon-share-alt"></span> Back</a></li>
      </ul>
    </div>
  </nav>   
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="login-block">
        <h1>Sign Up As Service Provider</h1>
         <div class="logo"></div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Service Type</label>
                <select class="form-control" name="sp_type">
                  <option value="" disabled selected> --- Service Type --- </option>
                  <option value="Food">Food</option>
                  <option value="Goods">Goods</option>
                  <option value="Pet Assist">Pet Assist</option>
                  <option value="Medical">Medical</option>
                </select>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $sp_location; ?>">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="sphone" class="form-control" value="<?php echo $sp_phone; ?>">
            </div>
            <div class="form-group">
                <label>SSM Code</label>
                <input type="text" name="ssmcode" class="form-control" value="<?php echo $sp_ssmcode; ?>">
            </div>   
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="semail" class="form-control" value="<?php echo $sp_email; ?>">
            </div>          
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>