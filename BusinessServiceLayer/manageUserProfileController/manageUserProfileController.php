<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/sdw/BusinessServiceLayer/manageUserProfileModel/manageUserProfileModel.php';

class manageUserProfileController{
    
    //To show the customer about his/her profile  information
    function viewCust(){
        $cust = new manageUserProfileModel();
        $cust->username = $_SESSION['username'];
        return $cust->viewCustProfile();
    }

    //To allow the customer to update his/her personal profile 
    function editCust(){
        $cust = new manageUserProfileModel();
        $cust->username = $_SESSION['username'];
        $cust->cust_phone = $_POST['cust_phone'];
        $cust->cust_add1 = $_POST['cust_add1'];
        $cust->cust_add2 = $_POST['cust_add2'];
        $cust->cust_postal_code = $_POST['cust_postal_code'];
        $cust->cust_city = $_POST['cust_city'];
        $cust->cust_state = $_POST['cust_state'];
        if($cust->editCustProfile()){
            echo "<script type='text/javascript'>alert('Your profile are success Update!!!');
            window.location = 'custProfile.php?username=".$_SESSION['username']."';</script>";     
        }
        else
            echo "<script type='text/javascript'>alert('Your profile are failed Update!!!');
            window.location = 'custProfile.php?username=".$_SESSION['username']."';</script>";
    }

    //To show the Service profider about their profile information
    function viewSP(){
        $sp = new manageUserProfileModel();
        $sp->username = $_SESSION['username'];
        return $sp->viewSPProfile();
    }

    //To allow the Service provider to update their personal profile 
    function editSP(){
        $sp = new manageUserProfileModel();
        $sp->username = $_SESSION['username'];
        $sp->sp_phone = $_POST['sp_phone'];
        $sp->sp_location = $_POST['sp_location'];
        if($sp->editSPProfile()){
            echo "<script type='text/javascript'>alert('Your profile are success Update!!!');
            window.location = 'spProfile.php?username=".$_SESSION['username']."';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your profile are failed Update!!!');
            window.location = 'spProfile.php?username=".$_SESSION['username']."';</script>";
    }

    //To show the runner about his/her information
    function viewRunner(){
        $rn = new manageUserProfileModel();
        $rn->username = $_SESSION['username'];
        return $rn->viewRunnerProfile();
    }

    //To allow the Runners to update his personal profile 
    function editRunner(){
        $rn = new manageUserProfileModel();
        $rn->username = $_SESSION['username'];
        $rn->runner_phone = $_POST['runner_phone'];
        $rn->runner_vehicle_type = $_POST['runner_vehicle_type'];
        if($rn->editRunnerProfile()){
            echo "<script type='text/javascript'>alert('Your profile are success Update!!!');
            window.location = 'runnerProfile.php?username=".$_SESSION['username']."';</script>";
        }
        else
            echo "<script type='text/javascript'>alert('Your profile are failed Update!!!');
            window.location = 'runnerProfile.php?username=".$_SESSION['username']."';</script>";
    }
}
?>
