<?php

    require_once('displayInfo.php');

    $year = $_GET['year'];
    $conn = mysqli_connect("localhost", "root", "root", "books");

    if($_GET["year"] == 'any'){
        $sql = "SELECT * FROM book ORDER BY dateRead DESC";
    }else{
        $sql = "SELECT * FROM book WHERE extract(YEAR FROM dateRead) = $year ORDER BY dateRead DESC";
    }
    $data = mysqli_query($conn, $sql) or die($conn);
    if(mysqli_num_rows($data) > 0){
        displayInfo($data);
    }

    if(isset($_REQUEST["q"])){
        $q = $_REQUEST["q"];
        print_r($q);
    }

    $sql = "SELECT author FROM book;";
    $data = mysqli_query($conn, $sql) or die($conn);


?>