<?php 
session_start();
require 'db/conn.php';

// $redirect = 'pages/admin/index.php';

if(isset($_POST['submit_btn'])){

    $username = addslashes($_POST['loginUsername']);
    $pssword = addslashes($_POST['loginPassword']);

    $errors = [];
    if(empty($username)){
        $errors[] = 'Username must not be empty';
    }

    if(empty($pssword)){
        $errors[] = 'Password must not be empty';
    }

    if(!empty($username) && !empty($password)){
        $_SESSION['status'] = 'success';
        $_SESSION['msg'] = 'Successfully Login';
    }else{
        $_SESSION['status'] = 'error';
        $_SESSION['msg'] = 'Something went wrong. Please try again.';
    }

    return $errors;

}
?>