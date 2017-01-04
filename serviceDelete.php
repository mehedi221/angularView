<?php
// database connection
include("db.php");
$obj = json_decode(file_get_contents('php://input'));

$delete = $con->query("DELETE FROM  user_login  WHERE id='$obj->did'");

if($delete) {
    echo json_encode(['status' => 'success', 'message' => 'Data Have sucessfully Deleted', 'data' => NULL]);
}
else {
    echo json_encode(['status' => 'error', 'message' => 'Data Have sucessfully Not Deleted', 'data' => NULL]);
}
?>