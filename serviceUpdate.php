<?php
// database connection
include("db.php");
$obj = json_decode(file_get_contents('php://input'));
// echo json_encode(['confirmation'=>'Data Save Successfully','user'=>$obj->usrname,'pass'=>$obj->usrpass]);
// exit;
$insert = $con->query("UPDATE user_login SET user_name='$obj->usrname',pass='$obj->usrpass' WHERE id='$obj->upid'");

if ($insert) {
    echo json_encode(['status' => 'success', 'message' => 'Data Have sucessfully updated', 'data' => NULL]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Data not updated', 'data' => NULL]);
}
?>