<?php
    require '../php/sql.php';
    $id=intval($_GET['id']);
    $query=$db->query("SELECT * FROM `results` WHERE `id` = $id");
    $result=$query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html prefix="og: https://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/autocompletion/css/autocompletion.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Signika+Negative:wght@300&family=Sora:wght@200&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
        <script src="/autocompletion/scripts/script.js"></script>
        <title>Ceci est <?=isset($searchn) ? $searchn : null;?></title>
    </head>

    <body id="body_element">
        <header>
            <div id="ghost_header"></div>
            <form id="search_form" method="post" action="/autocompletion/pages/results.php">
                <a href="/autocompletion/index.php"><h1>Ceci<span>.</span></h1></a>
                <div id="search_box">
                    <input type="text" name="search" id="search_input" maxlength="25" required autocomplete="off">
                    <div id="results_box">
                    </div>
                    <button type="submit" id="search_submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </header>

        <article id="element_desc">
            <div id="image">
                <img src="/autocompletion/assets/placeholder.png">
            </div>
            <div id="content">
                <h1>Ceci est <strong><?=$result['nom'];?></strong></h1>
                <p><?=$result['description'];?></p>
            </div>
        </article>

    </body>
</html>