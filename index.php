<?php
    require 'php/sql.php';
?>

<!DOCTYPE html>

<html prefix="og: https://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/autocompletion.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Signika+Negative:wght@300&family=Sora:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
    <title>Ceci</title>
</head>

<body id="body_index">
    <div id="title">
        <a href="index.php"><h1>Ceci<span>.</span></h1></a>
        <h2>est un moteur de recherche</h2>
    </div>
    <form id="search_form" method="post" action="pages/results.php">
        <div id="search_box">
            <input type="text" name="search" id="search_input" maxlength="25" required autocomplete="off">
            <div id="results_box">
            </div>
        </div>
        <input type="submit" id="search_submit" value="Rechercher">
    </form>
    
</body>

</html>