<?php
include '../conn.php';
include '../login.php';

$method = $_POST['method'];

function count_sample_tbl($search_arr, $conn)
{
	$query = "SELECT COUNT(id) as total FROM t_exercise WHERE name LIKE '". $search_arr['sample_search']."%' ";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach ($stmt->fetchALL() as $row) {
			$total = $row['total'];
		}
	} else {
		$total = 0;
	}
	return $total;
}

if ($method == 'count_sample_tbl') {
	$sample_search = $_POST['sample_search'];

	$search_arr = array(
		"sample_search" => $sample_search,
	);
	echo count_sample_tbl($search_arr, $conn);
}

if($method == 'load_pagination'){
	$current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
    $c = 0;

    $results_per_page = 10;
	$page_first_result = ($current_page - 1) * $results_per_page;
	$c = $page_first_result;

    $query = "SELECT * FROM t_exercise LIMIT " . $page_first_result . ", " . $results_per_page;
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();

    if($stmt->rowCount() > 0){
        foreach($stmt->fetchAll() as $row){
            $c++;

            echo '<tr>';
            echo '<td>'. $c .'</td>';
            echo '<td>'. $row['name'] .'</td>';
            echo '<td>'. $row['details'] .'</td>';
            echo '<td>'. date('Y/M/D h:i:s', strtotime($row['date_updated'])) .'</td>';
            echo '</tr>';
        }
    }else{
        echo '<tr>';
		echo '<td colspan="8" style="text-align:center; color:red;">No Result !!!</td>';
		echo '</tr>';
    }
}

if ($method == 'sample_pagination') {
	$sample_search = $_POST['sample_search'];

	$search_arr = array(
		"sample_search" => $sample_search,
	);

	$results_per_page = 10;
	$number_of_result = intval(count_sample_tbl($search_arr, $conn));
	$number_of_page = ceil($number_of_result / $results_per_page);

	for ($page = 1; $page <= $number_of_page; $page++) {
		echo '<option value="' . $page . '">' . $page . '</option>';
	}
}

if ($method == 'sample_search') {
    $sample_search = $_POST['sample_search'];
	$current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
	$c = 0;

    $results_per_page = 10;
	$page_first_result = ($current_page - 1) * $results_per_page;
	$c = $page_first_result;

    $query = "SELECT * FROM t_exercise WHERE name LIKE '$sample_search%' OR details LIKE '$sample_search%' ";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt->execute();

    if($stmt->rowCount() > 0){
        foreach($stmt->fetchAll() as $row){
            $c++;
            echo '<tr>';
            echo '<td>'. $c .'</td>';
            echo '<td>'. $row['name'] .'</td>';
            echo '<td>'. $row['details'] .'</td>';
            echo '<td>'. date('Y/M/d H:i:s', strtotime($row['date_updated'])) .'</td>';
            echo '</tr>';
        }
    }else{
        echo '<tr>';
		echo '<td colspan="4" style="text-align:center; color:red;">No Result !!!</td>';
		echo '</tr>';
    }

}


?>