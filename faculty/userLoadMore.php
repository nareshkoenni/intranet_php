<?php
include '../dbcon.php';

$offset = intval($_POST['offset']);
$limit = 10;
$search = trim($_POST['search']);

$sql = "SELECT * FROM LogDetails f 
        JOIN role r ON f.role_id=r.role_id";

if ($search != "") {
    $search = mysqli_real_escape_string($conn, $search);
    $sql .= " WHERE 
              f.email LIKE '%$search%' OR
              f.branch LIKE '%$search%' OR
              f.section LIKE '%$search%' OR
              r.role_name LIKE '%$search%'";
}

$sql .= " ORDER BY f.sno DESC LIMIT $offset, $limit";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
        <td>{$row['sno']}</td>
        <td>{$row['email']}</td>
        <td>{$row['branch']}</td>
        <td>{$row['section']}</td>
        <td>{$row['role_name']}</td>
    </tr>";
}

mysqli_close($conn);
?>
