<?php
    require '../php/sql.php';
    if(!isset($_GET['p'])) $_GET['p']=1;
    else if(isset($_GET['p']) && isset($_POST['search'])) $_GET['p']=1;
    if(!isset($_POST['search']) && isset($_POST['search_prev'])) $_POST['search']=$_POST['search_prev'];
    if(isset($_POST['search']) && $_POST['search']){
        $array=preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $_POST['search'], 0,  PREG_SPLIT_DELIM_CAPTURE);
        $searchn=''; $resultsn=0;
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
                    WHEN `nom` LIKE '%$searchn' THEN 5 
                    WHEN `nom` LIKE '%$searchn%' THEN 6
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
        <link rel="stylesheet" href="/autocompletion/css/autocompletion.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Signika+Negative:wght@300&family=Sora:wght@200&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
        <script src="/autocompletion/scripts/script.js"></script>
        <title>Ceci est <?=isset($searchn) ? $searchn : null;?></title>
    </head>

    <body id="body_search">
        <header>
            <div id="ghost_header"></div>
            <form id="search_form" method="post" action="">
                <a href="/autocompletion/index.php"><h1>Ceci<span>.</span></h1></a>
                <div id="search_box">
                    <input type="text" name="search" id="search_input" maxlength="25" required autocomplete="off">
                    <div id="results_box">
                    </div>
                    <button type="submit" id="search_submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </header>

        <section id="search_results">
            <span>
            <?php if(isset($results) && $results){
                
                for($i=intval($_GET['p'])*5-5; $i<intval($_GET['p'])*5; $i++){ 
                    if(!isset($results[$i])) break;?>
                    <div id="result_<?=$results[$i]['id'];?>" class="search_result">
                        <a class="titlelink" href="element.php/?id=<?=$results[$i]['id'];?>">
                            <?=preg_replace("/$searchn/i", "<b>\$0</b>", $results[$i]['nom']);?>
                        </a>
                        <a class="fakelink" href="element.php/?id=<?=$results[$i]['id'];?>">
                            http://www.ceci.com/<?="element.php/?id=" . $results[$i]['id']?>
                        </a>
                        <hr>
                        <p><?=preg_replace("/$searchn/i", "<b>\$0</b>", $results[$i]['description']);?></p>
                    </div>
                    <?php } ?>
            </span>
                <nav id="nav_results">
                    <form class="nav_form" id="prev" method="post" action="results.php?p=<?=intval($_GET['p']) - 1?>" 
                    style="visibility:<?=intval($_GET['p'])==1 ? 'hidden' : 'visible';?>">
                        <input type="hidden" name="search_prev" value="<?=htmlspecialchars($_POST['search']);?>">
                        <button type="submit"><i class="fas fa-chevron-left"></i></button>
                    </form>
                    <p>Page <?=intval($_GET['p']);?></p>
                    <form class="nav_form" id="next" method="post" action="results.php?p=<?=$_GET['p'] + 1?>" 
                    style="visibility:<?=((intval($_GET['p'])+1)*5-count($results))==0 || ((intval($_GET['p'])+1)*5-count($results))>=5 ? 
                    'hidden' : 'visible';?>">
                        <input type="hidden" name="search_prev" value="<?=htmlspecialchars($_POST['search']);?>">
                        <button type="submit"><i class="fas fa-chevron-right"></i></button>
                    </form>
                </nav>
            <?php } ?>
        </section>
    </body>
</html>