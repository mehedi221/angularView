<?php
    include("db.php");
    $query = $con->query("SELECT * FROM campus_setting");

    $result = [];

    while($rows = $query->fetch_assoc()):
    $result []= $rows;
    endwhile;


    $count =count($result);



    echo json_encode(['status'=>'success','message'=>'','data'=> $result, 'total'=>$count]);
?>