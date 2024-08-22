<?php
include '../conn.php';
include '../login.php';

$method = $_POST['method'];

if ($method == 'load_dashboard') {
    
    $query = "SELECT * FROM m_accounts";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    $c = 0;
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['fullname'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['role'] . '</td>';
            echo '<td>' . date('Y/M/d H:i:s', strtotime($row['created_at'])) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="4" style="text-align:center; color:red;">No Result !!!</td>';
        echo '</tr>';
    }
}

if ($method == 'search') {
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $date_f = isset($_POST['dFrom']) ? $_POST['dFrom'] : '';
    $date_t = isset($_POST['dTo']) ? $_POST['dTo'] : '';

    $query = "SELECT * FROM m_accounts";
    // $params = [];

    if ($search !== '') {
        $query .= " WHERE fullname LIKE '$search%' OR username LIKE '$search%'";
        // $params[] = $search . '%';
    } elseif ($date_f !== '' && $date_t !== '') {
        $query .= " WHERE DATE(created_at) BETWEEN '$date_f' AND '$date_t'";
        // $params[] = $date_f;
        // $params[] = $date_t;
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $c = 0;
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['fullname'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['role'] . '</td>';
            echo '<td>' . date('Y/M/d H:i:s', strtotime($row['created_at'])) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="4" style="text-align:center; color:red;">No Result !!!</td>';
        echo '</tr>';
    }
}
