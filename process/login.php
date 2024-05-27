<?php
<<<<<<< HEAD
session_name("tms");
=======
session_name("web_template");
>>>>>>> 4e4057db238dcd79ef1ca7b5e48570a32c01c4d2
session_start();

include 'conn.php';

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

<<<<<<< HEAD
    $sql = "SELECT * FROM m_accounts WHERE BINARY username = '$username' AND BINARY password = '$password'";
=======
    $sql = "SELECT full_name, section, role FROM user_accounts WHERE BINARY username = '$username' AND BINARY password = '$password'";
>>>>>>> 4e4057db238dcd79ef1ca7b5e48570a32c01c4d2
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchALL() as $x){
<<<<<<< HEAD
            $name = $x['fullname'];
=======
            $name = $x['full_name'];
>>>>>>> 4e4057db238dcd79ef1ca7b5e48570a32c01c4d2
            $section = $x['section'];
            $role = $x['role'];
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
<<<<<<< HEAD
=======
            $_SESSION['section'] = $section;
>>>>>>> 4e4057db238dcd79ef1ca7b5e48570a32c01c4d2
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