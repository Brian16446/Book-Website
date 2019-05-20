var years = document.getElementById('years');
var addBook = document.getElementById('addBook');

years.addEventListener('change', function(){
    var xhttp = new XMLHttpRequest();
    var year = years.value;

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            document.getElementById('content').innerHTML = result;
        }
    }

    xhttp.open('GET', 'getBooks.php?year=' + year, true);
    xhttp.send();
})

$("#addBook").click(function(){
    $("#addBook").hide();
    $(".addBar").show();
    
})

$("#closeAddBook").click(function(){
    $("#addBook").show();
    $(".addBar").hide();

})

function toggleSearchOptions(){
    if(document.getElementById('searchOptions').style.display != 'block'){
        $("#searchOptions").show();
    }else{
        $("#searchOptions").hide();
    }
}

function updateSearch(str, id){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    }
    var year = document.getElementById('years').value;
    xhttp.open("GET", "searchBooks.php?id=" + id + "&year=" + year + "&q=" + str, true);
    xhttp.send();
    
}
function postBook(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var result = xhttp.responseText;
            console.log(result);
            document.getElementById('result').innerHTML = result;
        }
    }

    var title = document.forms["submitBook"]["title"].value;
    var author = document.forms["submitBook"]["Author"].value;
    var rating = document.forms["submitBook"]["rating"].value;
    var date = document.forms["submitBook"]["date"].value;

    
    xhttp.open('GET', 'postBook.php?title=' + title + "&author=" + author + "&rating=" + rating + "&date=" + date, true);
    xhttp.send();
    return false;
}