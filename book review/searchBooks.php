<?php

    require_once('displayInfo.php');

    $conn = mysqli_connect("localhost", "root", "root", "books");

    if(isset($_REQUEST["q"])){
        $q = $_REQUEST["q"];
    }

    if($_GET["id"]){
        $id = $_GET["id"];
        if($id == "authorSearch"){
            $search = "author";
        }else{
            $search = "name";
        }
    }

    if($_GET["year"] == 'any'){
        $sql = "SELECT * FROM book WHERE $search like '$q%'";
    }else{
        $year = $_GET["year"];
        $sql = "SELECT * FROM book WHERE $search like '$q%' AND extract(YEAR FROM dateRead) = $year;";
    }

    $data = mysqli_query($conn, $sql) or die($conn);
    displayInfo($data);


?>