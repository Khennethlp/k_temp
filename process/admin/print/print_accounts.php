<?php
require '../../conn.php';

// function printAll($table, $conn){
//     $query = "SELECT * FROM $table";
//     $stmt = $conn->prepare($query);
//     $stmt->execute();

//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

$search = isset($_GET['q']) ? $_GET['q'] : '';

$query = "";
$params = [];

if (!empty($search)) {
    $query = "SELECT * FROM user_accounts WHERE CONCAT(id_number, ' ', full_name, ' ', username, ' ', section, ' ', role) LIKE :search";
    $params[':search'] = '%' . $search . '%';
} else {
    $query = "SELECT * FROM user_accounts";
}

$stmt = $conn->prepare($query);
$stmt->execute($params);

$table = '<table class="table" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
<thead>
    <tr style="border: 1px solid black;">
        <th scope="col" style="font-size: 16px; border: 1px solid black;">#</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">ID Number</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">Full Name</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">Username</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">Section</th>
        <th scope="col" style="font-size: 16px; border: 1px solid black;">Role</th>
    </tr>
</thead>
<tbody>';

if ($stmt->rowCount() > 0) {
    $c = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $table .= '<tr style="border: 1px solid black;">';
        $table .= '<td style="border: 1px solid black; padding:13px;">' . $c++ . '</td>';
        $table .= '<td style="border: 1px solid black; padding:14px;">' . htmlspecialchars($row['id_number']) . '</td>';
        $table .= '<td style="border: 1px solid black; padding:16px;">' . htmlspecialchars($row['full_name']) . '</td>';
        $table .= '<td style="border: 1px solid black; padding:16px;">' . htmlspecialchars($row['username']) . '</td>';
        $table .= '<td style="border: 1px solid black; padding:16px;">' . htmlspecialchars($row['section']) . '</td>';
        $table .= '<td style="border: 1px solid black; padding:16px;">' . htmlspecialchars($row['role']) . '</td>';
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