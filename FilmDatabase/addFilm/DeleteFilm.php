<?php
@include 'dbconnection.php';

$errors = array();

if(isset($_GET['FilmID'])) {
    $filmID = mysqli_real_escape_string($conn, $_GET['FilmID']);
    
    
    $delete_genre_query = "DELETE FROM filmgenre WHERE FilmID = '$filmID'";
    if(mysqli_query($conn, $delete_genre_query)) {
        
        $delete_movie_query = "DELETE FROM film WHERE FilmID = '$filmID'";
        if(mysqli_query($conn, $delete_movie_query)) {
            echo "<script>alert('Movie deleted successfully');</script>";
        } else {
            $errors[] = "Failed to delete movie: " . mysqli_error($conn);
        }
    } else {
        $errors[] = "Failed to delete related records: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Film.css">
    <title>Delete Movie</title> 
</head>
<body>
<div class="navbar">
            <ul>
                <li><a href="../addFilm/uploadMovie.php">Add Film</a></li>
                <li><a href="../addRegisseur/uploadRegisseur.php">Add Regisseur</a></li>
                <li><a href="../AddFilmInGenre/AddFilmInGenre.php">Add Film in Genre</a></li>
                <li><a href="../RegisterNlogin/Logout.php">Logout</a></li>
                
            </ul>
        </div>
    <div class="delete">
        <h2>Delete Movie</h2>
        <?php

        if(!empty($errors)) {
            foreach($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
        ?>
        <form method="get">
            <input type="text" id="filmID" name="FilmID" required>
            <button type="submit">Delete Movie</button>
        </form>
    </div>
</body>
</html>