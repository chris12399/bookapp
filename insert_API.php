<?php
    require_once 'connect_db.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    
    if($conn->connect_error) die('Fatal Error'. $conn->connect_error);

    if (
        isset($_POST['author']) &&
        isset($_POST['title']) &&
        isset($_POST['category']) &&
        isset($_POST['year']) &&
        isset($_POST['isbn']) 
    ) {
        $author = get_post($conn, 'author');
        $title = get_post($conn, 'title');
        $category = get_post($conn, 'category');
        $year = get_post($conn, 'year');
        $isbn = get_post($conn, 'isbn');
        
        $query   = "INSERT INTO `classics` VALUES ('$author', '$title', '$category', '$year', '$isbn')";


        // if($conn->query($query) === TRUE){
        //     echo "new record success";
        // } else {
        //     echo "Error: " . $query . "<br>" . $conn->error;
        // }
        $result = $conn->query($query);
        if($result) echo "Successful insetion of a new book (author: $author).";
        else echo "INSERT failed";
    }

    $conn -> close();

    function get_post ($conn, $var) 
    {
        return $conn->real_escape_string($_POST[$var]);
    }

?>