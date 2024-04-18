<?php
  include('dbconnection.php');
  if(isset($_POST['Submit'])){
    $FilmID = $_POST['FilmID'];
    $GenreID = $_POST ['GenreID'];
    

    $query= mysqli_query($conn, "Insert into filmgenre (FilmID, GenreID) Values('$FilmID', '$GenreID')");
    if($query) {
        echo "Data inserted succesfully";
    }
    else {
        echo "There is an error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add film in genre</title>
    <link rel="stylesheet" href="FilmGenre.css">
</head>
<body>
<div class="navbar">
            <ul>
            <li><a href="../addFilm/uploadMovie.php">Add Film</a></li>
                <li><a href="../addRegisseur/uploadRegisseur.php">Add Regisseur</a></li>
                <li><a href="../AddFilmInGenre/AddFilmInGenre.php">Add Film in Genre</a></li>
                <li><a href="../addFilm/DeleteFilm.php">Delete Film</a></li>
                <li><a href="../RegisterNlogin/Logout.php">Logout</a></li>
            </ul>
        </div>
    <div class="filmgenre">
    <h1>ADD FILM IN GENRE</h1>
        <form method="POST">
            <label>Film ID</label>
            <input type="number" name="FilmID" placeholder="Enter Film ID">
            <br> </br>
            <label>Genre ID</label>
            <input type="number" name="GenreID" placeholder="Enter Genre ID"/>
            <br> <br/>
            <button type="submit" name="Submit">Submit</button>
        </form>
    </div>
</body>
</html>