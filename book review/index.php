<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
    crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    <h1>Book Tracker</h1>
    
    <div class="container">
        <div class="outerAddBar">
            <p id="addBook">Click to add a book</p>
            <div class="addBar">
                <form name="submitBook" onsubmit="return postBook();">
                    <input type="text" placeholder="Book Title" id="title" name="title">
                    <input type="text" placeholder="Author" id="Author" name="author">
                    <select name="rating" id="rating">
                        <option value="5">5 &#9733</option>
                        <option value="4">4 &#9733</option>
                        <option value="3">3 &#9733</option>
                        <option value="2">2 &#9733</option>
                        <option value="1">1 &#9733</option>
                    </select>
                    <input type="date" name="date">
                    <button id="submit">Submit</button>
                    
                </form>
                <button id="closeAddBook">x</button>
            </div>
    </div>
    <div id="result"></div>
        <br>
        <section id="search">
            <p>Sort by year: </p>
            <select name="years" id="years">
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="any">All Years</option>
                <option value="toRead">To-Read</option>
            </select>
            <p>Additional Search Options:</p>
            <button onclick="toggleSearchOptions()">+</button>
            <div id="searchOptions">
                <input type="text" placeholder="Title" id="titleSearch" onkeyup="updateSearch(this.value, this.id)">
                <input type="text" placeholder="Author" id="authorSearch" onkeyup="updateSearch(this.value, this.id)">
            </div>
        </section>
        <br><br>
        
        <div id="content">
            <table>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Date Read</th>
                    <th>Rating</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "root", "books");
                    $sql = "SELECT * FROM book WHERE extract(YEAR FROM dateRead) = 2019 ORDER BY dateRead";
                    $data = mysqli_query($conn, $sql) or die($conn);
                    if(mysqli_num_rows($data) > 0){
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
                            echo("</tr>");
                        }
                    }
                ?>


            </table>
        </div>

    </div>
    <script src="scripts.js"></script>
</body>
</html>