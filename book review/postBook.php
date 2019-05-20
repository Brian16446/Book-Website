<?php 


    $title = $_GET["title"];
    $author = $_GET["author"];
    $rating = $_GET["rating"];
    $dateRead = $_GET["date"];

    
    $conn = mysqli_connect("localhost", "root", "root", "books");
    $sql = "INSERT into Book(
        name, author, dateRead, rating)
        VALUES('$title', '$author', '$dateRead', $rating
        );";
    $data = mysqli_query($conn, $sql) or die($conn);
    
    echo("<p>Book Submitted</p>");
?>