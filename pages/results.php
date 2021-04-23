<?php
    require '../php/sql.php';
    if(isset($_POST['search']) && $_POST['search']){
        $array=preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $_POST['search'], 0,  PREG_SPLIT_DELIM_CAPTURE);
        $searchn='';
        foreach($array as $key=>$value){
            if($key==0){
                $searchn=$value;
            }
            else{
                $searchn.=" " . $value;
            }
        }
        $stmt=$db->query(
            "SELECT `id`, `nom`, `description` FROM(
                SELECT CASE 
                    WHEN `nom` LIKE '$searchn%' THEN 1
                    WHEN `nom` LIKE ' $searchn%' OR `nom` LIKE '% $searchn%' THEN 2
                    WHEN `description` LIKE '$searchn%' THEN 3
                    WHEN `description` LIKE ' $searchn%' OR `description` LIKE '% $searchn%' THEN 4 
                    END AS `relevance`, `id`, `nom`, `description` FROM `results` )
            AS `results` WHERE `relevance` IS NOT NULL ORDER BY `relevance`,`nom`");
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>

<html prefix="og: https://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/autocompletion.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Signika+Negative:wght@300&family=Sora:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
    <script src="../scripts/results.js"></script>
    <title>Ceci est <?=isset($searchn) ? $searchn : null;?></title>
</head>

<body id="body_search">
    <header>
        <div id="ghost_header"></div>
        <form id="search_form" method="post" action="">
            <h1>Ceci<span>.</span></h1>
            <div id="search_box">
                <input type="text" name="search" id="search_input" maxlength="25" required autocomplete="off">
                <div id="results_box">
                </div>
            </div>
            <button type="submit" id="search_submit"><i class="fas fa-search"></i></button>
        </form>
    </header>
    <section id="search_results">
        <?php if(isset($results) && $results){
            foreach($results as $key=>$value){ ?>
            <div id="result_<?=$value['id'];?>" class="search_result">
                <a href="element.php/?id=<?=$value['id'];?>"><?=$value['nom'];?></a>
                <hr>
                <p><?=$value['description'];?></p>
            </div>
            <?php }
        } ?>
    </section>
</body>
</html>