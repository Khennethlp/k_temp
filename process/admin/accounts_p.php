<?php
include '../conn.php';
include '../login.php';

$method = $_POST['method'];

function count_sample_t1_data($conn)
{
    $query = "SELECT count(id) AS total FROM m_accounts";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $total = $row['total'];
        }
    } else {
        $total = 0;
    }
    return $total;
}

if ($method == 'load_sample_t1_data_last_page') {
    $results_per_page = 10;

    $number_of_result = intval(count_sample_t1_data($conn));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

// if ($method == 'sample_accounts') {
//     // $search_account = $_POST['search_account'];

// 	$current_page = intval($_POST['current_page']);
//     $c = 0;

//     $results_per_page = 10;

//     //determine the sql LIMIT starting number for the results on the displaying page
//     $page_first_result = ($current_page - 1) * $results_per_page;

//     $c = $page_first_result;

//     $query = "SELECT * FROM user_accounts LIMIT " . $page_first_result . ", " . $results_per_page;
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

if ($method == 'count_sample_t1_data') {
    echo count_sample_t1_data($conn);
}

if ($method == 'load_sample_t1_data') {
    $current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
    $c = 0;

    $results_per_page = 10;

    // Determine the SQL LIMIT starting number for the results on the displaying page
    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM m_accounts LIMIT " . $page_first_result . ", " . $results_per_page;
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            // echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="load_sample_table_2(&quot;' . $row['id'] . '~!~' . $row['sample_id'] . '&quot;)">';
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $row['emp_id'] . '</td>';
            echo '<td>' . $row['fullname'] . '</td>';
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

if ($method == 'add_account') {
	$emp_id = $_POST['emp_id'];
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$section = $_POST['section'];
	$role = $_POST['role'];

	$check_duplicate = "SELECT COUNT(*) FROM user_accounts WHERE emp_id = :emp_id ";
	$stmt_duplicate = $conn->prepare($check_duplicate, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt_duplicate->bindParam(':emp_id', $emp_id);
	$stmt_duplicate->execute();
	$count = $stmt_duplicate->fetchColumn();

	if ($count > 0) {
		echo 'duplicate';
	} else {
		try {
			$insert = "INSERT INTO m_accounts (id_number, full_name, username, password, section,role) VALUES (:emp_id, :fullname, :username, :password, :section, :role)";
			$stmt = $conn->prepare($insert, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$stmt->bindParam(':emp_id', $emp_id);
			$stmt->bindParam(':fullname', $fullname);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':section', $section);
			$stmt->bindParam(':role', $role);
			$stmt->execute();

			echo 'success';
		} catch (Exception $e) {
			echo 'fail';
		}
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




?>