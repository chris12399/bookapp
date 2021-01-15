<?php
    require_once 'connect_db.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    //$conn = mysqli_connect($hn, $un, $pw, $db);
    //if($conn -> $connect_error) die('Fatal Error'. $conn->connect_error);
    
    $query = "SELECT * FROM  classics";
    $result = $conn -> query($query);
    if(!$result) die ("Fatal Error");

    $rows = $result ->num_rows;

    $arr = array();

    for($j = 0; $j < $rows; ++$j){
        $result -> data_seek($j);
        $row = $result -> fetch_assoc();
        array_push($arr, $row);
    }

    //set encoding
    header("content-Type: application/json; charset=utf-8");

    //convert to json
    $arr = json_encode($arr, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);
    echo $arr;



    $result -> close();
    $conn -> close();

?>
