<?php 

function displayInfo($data){
    echo("<table>");
    echo("<tr>");
    echo("<th>Book Title</th>");
    echo("<th>Author</th>");
    echo("<th>Date Read</th>");
    echo("<th>Rating</th>");
    echo("<tr>");
    while($row = mysqli_fetch_array($data)){
        $name = $row['Name'];
        $author = $row['Author'];
        $dateRead = $row['dateRead'];
        $rating = $row['Rating'];
        echo("<tr>");
        echo("<td>$name</td>");
        echo("<td>$author</td>");
        echo("<td>$dateRead</td>");
        echo("<td>");
        for($i=0; $i<$rating; $i++){
            echo("&#9733");
        }
        echo("</td>");
        echo("<tr>");
    }
}

?>
