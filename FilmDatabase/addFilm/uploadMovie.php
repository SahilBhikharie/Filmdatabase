<?php
  include('dbconnection.php');
  if(isset($_POST['Submit'])){
    $FilmID = $_POST['FilmID'];
    $RegisseurID = $_POST['RegisseurID'];
    $Titel = $_POST ['Titel'];
    $Releasedate = $_POST ['Releasedate'];
    $Beschrijving = $_POST ['Beschrijving'];
    $Poster = $_POST ['Poster'];
    $Beoordeling = $_POST['Beoordeling'];

    $query= mysqli_query($conn, "Insert into film (FilmID, RegisseurID, Titel, Releasedate, Beschrijving, Poster, Beoordeling) Values('$FilmID', '$RegisseurID', '$Titel', '$Releasedate', '$Beschrijving', '$Poster', '$Beoordeling')");
    if($query) {
        echo "<script>alert('Movie added successfully');</script>";
    }
    else {
        echo "<script>alert('Error, Movie couldn't be added');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Film.css">
    <title>Add Movies</title>

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
    <div class="addFilm">
    <h1>ADD MOVIE</h1>
        <form method="POST">
            <label>FilmID</label>
            <input type="number" name="FilmID" placeholder="Enter FilmID">
            <br></br>
            <label>RegisseurID</label>
            <input type="number" name="RegisseurID" placeholder="Enter RegisseurID">
            <br> </br>
            <label>Titel</label>
            <input type="text" name="Titel" placeholder="Enter Titel"/>
            <br> <br/>
            <label>Releasedate</label>
            <input type="date" name="Releasedate" placeholder="Enter Releasejaar"/>
            <br> <br/>
            <label>Beschrijving</label>
            <input type="text" name="Beschrijving" placeholder="Enter Beschrijving"/>
            <br> <br/>
            <label>Poster</label>
            <input type="file" name="Poster" placeholder="Choose Poster"/>
            <br> <br/>
            <label>Beoordeling</label>
            <input type="cijfer" name="Beoordeling" placeholder="Enter Beoordeling"/>
            <br> <br/>
            <button type="submit" name="Submit">Submit</button>
        </form>
    </div>
</body>
</html>