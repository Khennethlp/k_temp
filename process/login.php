<?php
session_name("web_template");
session_start();

include 'conn.php';

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT fullname, role FROM m_accounts WHERE username = '$username' AND password = '$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchALL() as $x){
            $name = $x['full_name'];
            $section = $x['section'];
            $role = $x['role'];
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['section'] = $section;
            $_SESSION['role'] = $role;
            if ($role == 'admin') {
                header('location: pages/admin/index.php'); // admin/index.php
                exit;
            } elseif ($role == 'user') {
                header('location: pages/user/index.php');// user/index.php
                exit;
            }
        }
    } else {
        // echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
        $_SESSION['status'] = 'error';
        $_SESSION['msg'] = 'Sign In Failed. Please try again.';

    }
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header('location: /k_temp/index.php');
    exit;
}
?>