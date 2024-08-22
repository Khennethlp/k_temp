<?php
include '../conn.php';
include '../login.php';

$method = $_POST['method'];

if ($method == 'load_more') {
    
    $query = "SELECT a.*, b.* FROM user_details a INNER JOIN bank_details b ON a.tokens=b.tokens";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    $c = 0;
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['address'] . '</td>';
            echo '<td>' . $row['country'] . '</td>';
            echo '<td>' . $row['bank_acc'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . ($row['boolean'] == 0 ? 'Active':'Inactive') . '</td>';
           
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="4" style="text-align:center; color:red;">No Result !!!</td>';
        echo '</tr>';
    }
}