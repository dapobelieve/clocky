<?php
include "conn.php";



if(isset($_GET['name'])){
    $name = $_GET['name'];
    $item = $_GET['item'];

    $sql = mysqli_query($con, "INSERT INTO logs (`name`,`item`,`in`) 
        VALUES ('$name', '$item',now())")or die(mysqli_error($con));

    echo 1;
}
if(isset($_GET['dtaId'])){
    $id = $_GET['dtaId'];

    $sql = mysqli_query($con, "UPDATE logs SET `out` = now() WHERE id =  '$id' ")or die(mysqli_error($con));
}


if(isset($_GET['getEm'])){
    $res = array();

    $sql = mysqli_query($con, "SELECT * FROM logs WHERE `in` > CURDATE() ORDER BY `in` DESC")or die(mysqli_error($con));

    $i = 1;

    while($data = mysqli_fetch_object($sql)){
        $res[] = array(
            'id' => $i,
            'rid' => $data->id,
            'name' => ucwords($data->name),
            'item' => ucwords($data->item),
            'timeIn' => $data->in,
            'timeOut' => $data->out,
        );

        $i++;
    }

    echo json_encode($res);

}


?>