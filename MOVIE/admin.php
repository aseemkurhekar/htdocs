<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="admin.js"></script>
</head>
 
<body>
<nav id="navigation">
    <article class="logo">
        <a href="index.php">
        <img src="logo.png" width="283.2" height="60"></a>
    </article>
</nav>
    
<section class="admin">
    <h1 id="wcad">Welcome Admin</h1>
    <form id="msform" action="adset1.php" method ="post">
        <fieldset id="fdset"> 
            <div id="movie_id">
                <select name="movie_id" class="fields">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                </select>
            </div>
            <div id="movie_name">
                <input type="text" name="movie_name" placeholder="Name" class="fields">
            </div>
            <div id="movie_cast">
                <input type="text" name="movie_cast" placeholder="Cast" class="fields">
            </div>
            <div id="runtime">
                <input type="text" name="runtime" placeholder="Runtime" class="fields">
            </div>
            <div id="movie_desc">
                <input type="text" name="movie_desc" placeholder="Plot" class="fields">
            </div>
            <div id="movie_cover">
                <input type="text" name="movie_cover" placeholder="Cover Photo" class="fields">
            </div>
            <div id="movie_photo">
                <input type="text" name="movie_photo" placeholder="Movie Photo" class="fields">
            </div>
            <div id="trailer">
                <input type="text" name="trailer" placeholder="Trailer" class="fields">
            </div>
            <div id="language">
                <input type="text" name="language" placeholder="Language" class="fields">
            </div>
            <div id="genre">
                <input type="text" name="genre" placeholder="Genre" class="fields">
            </div>
            <div id="rating">
                <input type="text" name="rating" placeholder="Rating" class="fields">
            </div>
            <div id="censor_rating">
                <input type="text" name="censor_rating" placeholder="Censor Rating" class="fields">
            </div>
            <div id="movie_photo_2">
                <input type="text" name="movie_photo_2" placeholder="Movie Profile Photo" class="fields">
            </div>
            <div id="cast_name_1">
                <input type="text" name="cast_name_1" placeholder="Cast Name 1" class="fields">
            </div>
            <div id="cast_photo_1">
                <input type="text" name="cast_photo_1" placeholder="Cast Photo 1" class="fields">
            </div>
            <div id="cast_name_2">
                <input type="text" name="cast_name_2" placeholder="Cast Name 2" class="fields">
            </div>
            <div id="cast_photo_2">
                <input type="text" name="cast_photo_2" placeholder="Cast Photo 2" class="fields">
            </div>
            <div id="submitbtn">
                <button type="submit" id="bookbtn" class="submitbtn">ALTER MOVIE</button></a>
            </div>
        </fieldset>
    </form>
</section>