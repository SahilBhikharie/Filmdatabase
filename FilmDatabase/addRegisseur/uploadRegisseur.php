<?php
  include('dbconnection.php');
  if(isset($_POST['Submit'])){
    $RegisseurID = $_POST['RegisseurID'];
    $Naam = $_POST ['Naam'];
    $Geboortedatum = $_POST ['Geboortedatum'];
    $Description = $_POST ['Description'];
    $img = $_POST ['img'];

    $query= mysqli_query($conn, "Insert into regisseur (RegisseurID, Naam, Geboortedatum, Description, img) Values('$RegisseurID', '$Naam', '$Geboortedatum', '$Description', '$img')");
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
    <title>Add Regisseur</title>
    <link rel="stylesheet" href="regisseur.css">
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
    <div class="addregisseur">
    <h1>ADD REGISSEUR</h1>
        <form method="POST">
            <label>RegisseurID</label>
            <input type="number" name="RegisseurID" placeholder="Enter RegisseurID">
            <br> </br>
            <label>Naam</label>
            <input type="text" name="Naam" placeholder="Enter naam"/>
            <br> <br/>
            <label>Geboortedatum</label>
            <input type="date" name="Geboortedatum" placeholder="Enter geboortedatum"/>
            <br> <br/>
            <label>Description</label>
            <input type="text" name="Description" placeholder="Enter description"/>
            <br> <br/>
            <label>Image</label>
            <input type="file" name="img" placeholder="Choose image"/>
            <br> <br/>
            <button type="submit" name="Submit">Submit</button>
        </form>
    </div>
</body>
</html>