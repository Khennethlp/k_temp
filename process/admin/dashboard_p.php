<?php
include '../conn.php';
include '../login.php';

$method = $_POST['method'];

if ($method == 'load_dashboard') {
    
    $query = "SELECT * FROM t_exercise";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    $c = 0;
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['details'] . '</td>';
            echo '<td>' . date('Y/M/d H:i:s', strtotime($row['date_updated'])) . '</td>';
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

    $query = "SELECT * FROM t_exercise";
    $params = [];

    if ($search !== '') {
        $query .= " WHERE name LIKE ?";
        $params[] = $search . '%';
    } elseif ($date_f !== '' && $date_t !== '') {
        $query .= " WHERE date_updated BETWEEN ? AND ?";
        $params[] = $date_f;
        $params[] = $date_t;
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $c = 0;
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['details'] . '</td>';
            echo '<td>' . date('Y/M/d H:i:s', strtotime($row['date_updated'])) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="4" style="text-align:center; color:red;">No Result !!!</td>';
        echo '</tr>';
    }
}
