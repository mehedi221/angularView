<?php
    // database connection
    include("db.php");
    $obj = json_decode(file_get_contents('php://input'));
    if($obj->type === 'insert') {

        $insert = $con->query("INSERT INTO campus_setting VALUES(
        '',
        '$obj->campus',
        '$obj->address',
        '$obj->campus_code',
        '$obj->phone',
        '$obj->fax',
        '$obj->mobile',
        '$obj->email',
        '$obj->web'
        
        )");


        if ($insert) {
//         $obj->user_name = $obj->usrname;
//         $obj->pass = $obj->usrpass;
//         $obj->id = $con->insert_id;

            $obj->campus_name = $obj->campus;
            $obj->address = $obj->address;
            $obj->campus_code = $obj->campus_code;
            $obj->phone_no = $obj->phone;
            $obj->fax = $obj->fax;
            $obj->mobile = $obj->mobile;
            $obj->email = $obj->email;
            $obj->web_address = $obj->web;
            $obj->campus_id = $con->insert_id;


            echo json_encode(['status' => 'success', 'data' => $obj, 'message' => 'Data Have Sucessfully Inserted']);
        } else {
            echo json_encode(['status' => 'error', 'data' => $obj, 'message' => 'Data Have Sucessfully Not Inserted']);
        }
    }

    elseif($obj->type === 'delete') {
        $delete = $con->query("DELETE FROM  campus_setting  WHERE campus_id='$obj->did'");
        if($delete) {
            echo json_encode(['status' => 'success', 'message' => 'Data Have sucessfully Deleted', 'data' => NULL]);
        }
        else {
            echo json_encode(['status' => 'error', 'message' => 'Data Have sucessfully Not Deleted', 'data' => NULL]);
        }
    }

    elseif($obj->type === 'update') {

        $update = $con->query("UPDATE campus_setting SET 

          campus_name    = '$obj->campus',
          address        = '$obj->address',
          campus_code    = '$obj->campus_code',
          phone_no       = '$obj->phone',
          fax            = '$obj->fax',
          mobile         = '$obj->mobile',
          email          = '$obj->email',
          web_address    = '$obj->web'
          
          WHERE campus_id='$obj->upid'");

        if ($update) {
            echo json_encode(['status' => 'success', 'message' => 'Data Have sucessfully updated', 'data' => NULL]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data not updated', 'data' => NULL]);
        }
        
    }

    else {

        $query = $con->query("SELECT * FROM campus_setting");
        $result = [];
        while($rows = $query->fetch_assoc()):
            $result []= $rows;
        endwhile;
        $count =count($result);
        echo json_encode(['status'=>'success','message'=>'','data'=> $result, 'total'=>$count]);
    }
?>