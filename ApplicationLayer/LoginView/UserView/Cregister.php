<?php
// Turn off all error reporting
error_reporting(0);
require_once "../../../BusinessServiceLayer/controller/RegisterController.php";

/// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$cust_phone = $cust_add1 = $cust_add2 = $cust_postal_code = $cust_city = $cust_state = $cust_email = "";

$user = new RegisterController();

list($username_err, $password_err, $confirm_password_err) = $user->Cregister();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>
        body {
    background: url('sm.jpg') no-repeat fixed center center;
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
        <li><a href="http://localhost/sdw/ApplicationLayer/LoginView/index.html"><span class="glyphicon glyphicon-share-alt"></span> Back</a></li>
      </ul>
    </div>
  </nav>    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="border:1px solid #ccc">
  <div class="login-block">
    <h1>Sign Up As Customer</h1>
    <div class="logo"></div>
    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label><br>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label><br>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label><br>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Address 1</label><br>
                <input type="text" name="add1" class="form-control" value="<?php echo $cust_add1; ?>">
            </div>
            <div class="form-group">
                <label>Address 2</label><br>
                <input type="text" name="add2" class="form-control" value="<?php echo $cust_add2; ?>">
            </div>
            <div class="form-group">
                <label>Poscode</label><br>
                <input type="text" name="poscode" class="form-control" value="<?php echo $cust_postal_code; ?>">
            </div>
            <div class="form-group">
                <label>State</label><br>
                <input type="text" name="state" class="form-control" value="<?php echo $cust_state; ?>">
            </div>
            <div class="form-group">
                <label>City</label><br>
                <input type="text" name="city" class="form-control" value="<?php echo $cust_city; ?>">
            </div>
             <div class="form-group">
                <label>Phone Number</label><br>
                <input type="text" name="PhoneNumber" class="form-control" value="<?php echo $cust_phone; ?>">
            </div>
            <div class="form-group">
                <label>Email</label><br>
                <input type="text" name="email" class="form-control" value="<?php echo $cust_email; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
    
  </div>
</form>
</body>
</html>