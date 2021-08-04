<?php


class model{
	public $username, $password, $usertype;
    private $pdo = null;

    public function __construct() {
        include '../template/database.php';
        $this->pdo = $pdo;
    }

    public function registerCustomer() {
        $sql = "INSERT INTO customer (username, cust_phone, cust_add1, cust_add2, cust_postal_code, cust_city, cust_state, cust_email) VALUES (:username, :cust_phone, :cust_add1, :cust_add2, :cust_postal_code, :cust_city, :cust_state, :cust_email )";
        $args= [
            ':username'=>$this->username,
            ':cust_phone'=> $this->cust_phone,
            ':cust_add1'=> $this->cust_add1,
            ':cust_add2'=>$this->cust_add2,
            ':cust_postal_code'=> $this->cust_postal_code,
            ':cust_city'=> $this->cust_city,
            ':cust_state'=> $this->cust_state,
            ':cust_email'=> $this->cust_email

        ];


        $stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
    }


    public function registerServiceProvider() {
        $sql = "INSERT INTO `service provider` (sp_type, sp_phone, sp_location, sp_ssmcode, sp_email, username) VALUES (:sp_type, :sp_phone, :sp_location, :sp_ssmcode, :sp_email, :username)";
        $args= [
            ':sp_type'=> $this->sp_type,
            ':sp_phone'=> $this->sp_phone,
            ':sp_location'=>$this->sp_location,
            ':sp_ssmcode'=>$this->sp_ssmcode,
            ':sp_email'=>$this->sp_email,
            ':username'=>$this->username

        ];


        $stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
    }

    public function registerRunner() {
        $sql = "INSERT INTO runner (username, runner_phone, runner_license_id, runner_vehicle_type, runner_email) VALUES (:username, :runner_phone, :runner_license_id, :runner_vehicle_type, :runner_email)";
        $args= [
            ':username'=>$this->username,
            ':runner_phone'=> $this->runner_phone,
            ':runner_license_id'=> $this->runner_license_id,
            ':runner_vehicle_type'=>$this->runner_vehicle_type,
            ':runner_email'=>$this->runner_email

        ];


        $stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
    }


	function addUser(){

		$sql = "INSERT INTO users (username, password, usertype) VALUES (:username, :password, :usertype)";
		$args= [
            ':username'=>$this->username, 
            ':password'=>password_hash($this->password, PASSWORD_DEFAULT), 
            ':usertype' => $this->usertype
        ];


		$stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
            //     // Redirect to login page
            //     header("location: ../view/login.php");
            // } else{
            //     echo "Something went wrong. Please try again later.";
            
	}

	function validateUser(){
		 $sql = "SELECT id FROM users WHERE username = :username";
                
                if($stmt = $pdo->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                    
                    // Set parameters
                    $param_username = trim($_POST["username"]);
                    
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

}