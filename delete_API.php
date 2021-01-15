<?php
    require_once 'connect_db.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    
    if($conn->connect_error) die('Fatal Error'. $conn->connect_error);

    $bookIsbn = isset($_POST['isbn']);
    
    // if(isset($_POST['isbn'])){
    //     $isbn = get_post($conn, 'isbn');
    // }


    $sql = "DELETE FROM `classics` WHERE isbn = '9'";

    $result = $conn->query($sql);


    if($result) echo "delete book successful (isbn: ).";
    else echo "Error: " . $sql . "<br>" . $conn->error;

    $conn -> close();

    // function get_post ($conn, $var) 
    // {
    //     return $conn->real_escape_string($_POST[$var]);
    // }

    // header("location:/bookapp/book-viewer.html");  //回index.php

?>