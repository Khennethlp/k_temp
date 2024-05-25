<?php
require '../../conn.php';

$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';
$search_index = isset($_GET['search_by']) ? $_GET['search_by'] : '';

$query = "";
$params = [];

if (!empty($search_index)) {
    $query = "SELECT * FROM t_exercise WHERE name LIKE :search_index";
    $params[':search_index'] = $search_index . '%';
} elseif (!empty($date_from) && !empty($date_to)) {
    $query = "SELECT * FROM t_exercise WHERE date_updated BETWEEN :date_from AND :date_to";
    $params[':date_from'] = $date_from;
    $params[':date_to'] = $date_to;
} else if(!empty($date_from) && !empty($date_to) && !empty($search_index)){
    $query = "SELECT * FROM t_exercise WHERE name LIKE :search_index AND date_updated BETWEEN :date_from AND :date_to";
    $params[':search_index'] = $search_index . '%';
    $params[':date_from'] = $date_from;
    $params[':date_to'] = $date_to;
} else {
    $query = "SELECT * FROM t_exercise";
}

$stmt = $conn->prepare($query);
$stmt->execute($params);

$table = '<table class="table" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
<thead>
    <tr style="border: 1px solid black;">
        <th scope="col" style="font-size: 16px; border: 1px solid black;">#</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">Name</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">Details</th>
    </tr>
</thead>
<tbody>';

if ($stmt->rowCount() > 0) {
    $c = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $table .= '<tr style="border: 1px solid black;">';
        $table .= '<td style="border: 1px solid black; padding:13px;">' . $c++ . '</td>';
        $table .= '<td style="border: 1px solid black; padding:14px;">' . htmlspecialchars($row['name']) . '</td>';
        $table .= '<td style="border: 1px solid black; padding:16px;">' . htmlspecialchars($row['details']) . '</td>';
        $table .= '</tr>';
    }
} else {
    $table .= '<tr><td colspan="3" style="border: 1px solid black;">No results found</td></tr>';
}

$table .= '</tbody></table>';

echo $table;

?>
<script>
    window.print();
</script>