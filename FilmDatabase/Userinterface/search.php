<?php
@include 'dbconnection.php';

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM Film WHERE Titel LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<h2>Title: " . $row['Titel'] . "</h2>";
            echo "<p>Releasedate: " . $row['Releasedate'] . "</p>";
            echo "<p>Description: " . $row['Beschrijving'] . "</p>";
            echo "<p>Beoordeling: " . $row['Beoordeling'] . "</p>";
            echo "<img src='" . $row['Poster'] . "' alt='Movie Poster' width='200'><br>";
            
            echo "<hr>";
        }
    } else {
        echo "No results found.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>

<div class="search-container">
    <h2>Search for a Movie</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Enter movie title...">
        <button type="submit">Search</button>
    </form>
    <form action="UI.html">
    <button type="submit" >Go back</button>
    </form>
</div>



</body>
</html>


