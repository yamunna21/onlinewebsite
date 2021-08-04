<?php

class RegisterController{

    private $model_class = null;
    private $pdo = null;

    public function __construct() {
        // Include config file
        include "../template/database.php";
        require_once "../../../BusinessServiceLayer/model/model.php";

        $this->model_class = new model();
        $this->pdo = $pdo;
    }

    function Cregister(){
        // declare variable
        $username_err = ""; 
        $password_err = ""; 
        $confirm_password_err = "";


        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = '$username'";
                
                if($stmt = $this->pdo->prepare($sql)){
                   
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                            $username_err = "This username is already taken.";
                        } else{
                            $username = trim($_POST["username"]);
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    unset($stmt);
                }
            }
            
            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                
            

                // set model variable
                $cust_add1 = trim($_POST["add1"]);
                $cust_add2 = trim($_POST["add2"]);
                $cust_phone = trim($_POST["PhoneNumber"]);
                $cust_postal_code = trim($_POST["poscode"]);
                $cust_city = trim($_POST["city"]);
                $cust_state = trim($_POST["state"]);
                $cust_email = trim($_POST["email"]);
                $this->model_class->username = $username;
                $this->model_class->password = $password;
                $this->model_class->usertype = "Customer";
                $this->model_class->cust_add1 = $cust_add1;
                $this->model_class->cust_add2 = $cust_add2;
                $this->model_class->cust_phone = $cust_phone;
                $this->model_class->cust_postal_code = $cust_postal_code;
                $this->model_class->cust_city = $cust_city;
                $this->model_class->cust_state = $cust_state;
                $this->model_class->cust_email = $cust_email;

                try{
                    $this->pdo->beginTransaction();
                    // add user
                    $this->model_class->addUser();
                    // register customer
                    $this->model_class->registerCustomer();

                    $this->pdo->commit();
                    header("location: http://localhost/sdw/ApplicationLayer//LoginView/UserView/login.php");
                }catch(PDOException $e) {
                    $this->pdo->rollBack();
                    header("http://localhost/sdw/ApplicationLayer//LoginView/UserView/login.php");
                }
            }
            
            // Close connection
            unset($pdo);
        }

        return [$username_err, $password_err, $confirm_password_err];
    }

   function SPregister(){
        // declare variable
        $username_err = ""; 
        $password_err = ""; 
        $confirm_password_err = "";


        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = '$username'";
                
                if($stmt = $this->pdo->prepare($sql)){
                    
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                            $username_err = "This username is already taken.";
                        } else{
                            $username = trim($_POST["username"]);
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    unset($stmt);
                }
            }
            
            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                

                // set model variable
                $sp_type = trim($_POST["sp_type"]);
                $sp_phone = trim($_POST["sphone"]);
                $sp_location = trim($_POST["location"]);
                $sp_ssmcode = trim($_POST["ssmcode"]);
                $sp_email = trim($_POST["semail"]);
                $this->model_class->username = $username;
                $this->model_class->password = $password;
                $this->model_class->usertype = "Service Provider";
                $this->model_class->sp_type = $sp_type;
                $this->model_class->sp_phone = $sp_phone;
                $this->model_class->sp_location = $sp_location;
                $this->model_class->sp_ssmcode = $sp_ssmcode;
                $this->model_class->sp_email = $sp_email;
               

                try{
                    $this->pdo->beginTransaction();
                    // add user
                    $this->model_class->addUser();
                    // register service Provider
                    $this->model_class->registerServiceProvider();

                    $this->pdo->commit();
                    header("location: http://localhost/sdw/ApplicationLayer/LoginView/UserView/login.php");
                }catch(PDOException $e) {
                    $this->pdo->rollBack();
                    header("location: http://localhost/sdw/ApplicationLayer/LoginView/UserView/login.php");
                }

            }
            
            // Close connection
            unset($pdo);
        }

        return [$username_err, $password_err, $confirm_password_err];
    }

    function Rregister(){
        // declare variable
        $username_err = ""; 
        $password_err = ""; 
        $confirm_password_err = "";


        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = '$username'";
                
                if($stmt = $this->pdo->prepare($sql)){
                   
                    
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                            $username_err = "This username is already taken.";
                        } else{
                            $username = trim($_POST["username"]);
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    unset($stmt);
                }
            }
            
            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                

                // set model variable
                $runner_license_id = trim($_POST["license"]);
                $runner_vehicle_type = trim($_POST["vehicletype"]);
                $runner_email = trim($_POST["remail"]);
                $runner_phone = trim($_POST["rphone"]);
                $this->model_class->username = $username;
                $this->model_class->password = $password;
                $this->model_class->usertype = "Runner";
                $this->model_class->runner_license_id = $runner_license_id;
                $this->model_class->runner_vehicle_type = $runner_vehicle_type;
                $this->model_class->runner_email = $runner_email;
                $this->model_class->runner_phone = $runner_phone;
              

                try{
                    $this->pdo->beginTransaction();
                    // add user
                    $this->model_class->addUser();
                    // register service Provider
                    $this->model_class->registerRunner();

                    $this->pdo->commit();
                    header("location: http://localhost/sdw/ApplicationLayer/LoginView/UserView/login.php");
                }catch(PDOException $e) {
                    $this->pdo->rollBack();
                    header("location: http://localhost/sdw/ApplicationLayer/LoginView/UserView/login.php");
                }

            }
            
            // Close connection
            unset($pdo);
        }

        return [$username_err, $password_err, $confirm_password_err];
    }

}

?>