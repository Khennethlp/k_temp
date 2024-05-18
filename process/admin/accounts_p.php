<?php
include '../conn.php';
include '../login.php';

$method = $_POST['method'];

if ($method == 'sample_accounts') {
    $search_account = $_POST['search_account'];

    $query = "SELECT * FROM user_accounts WHERE id_number LIKE '$search_account%' LIMIT 20";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $c = 0;
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['id_number'] . '</td>';
            echo '<td>' . $row['full_name'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['section'] . '</td>';
            echo '<td>' . $row['role'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="6" style="text-align:center; color:red;">No Result !!!</td>';
        echo '</tr>';
    }
}

// if ($method == 'sample_search_accounts') {
//     $search_account = $_POST['search_account'];

//     $query = "SELECT * FROM user_accounts WHERE id_number LIKE '$search_account%'";
//     $stmt = $conn->prepare($query);
//     $stmt->execute();

//     $c = 0;
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchAll() as $row) {
//             $c++;
//             echo '<tr>';
//             echo '<td>' . $c . '</td>';
//             echo '<td>' . $row['id_number'] . '</td>';
//             echo '<td>' . $row['full_name'] . '</td>';
//             echo '<td>' . $row['username'] . '</td>';
//             echo '<td>' . $row['section'] . '</td>';
//             echo '<td>' . $row['role'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="6" style="text-align:center; color:red;">No Result !!!</td>';
//         echo '</tr>';
//     }
// }
