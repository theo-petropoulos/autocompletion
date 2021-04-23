<?php
    header('charset=utf-8');
    require 'sql.php';
    if(isset($_POST['search']) && $_POST['search']){
        $array=preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $_POST['search'], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $searchp=$searchm='';

        foreach($array as $key=>$value){
            if($key==0){
                $searchp.="'%" . $value . "%'";
                $searchm.="'%" . $value . "%'";
            }
            else{
                $searchp.=" OR p.nom LIKE '%" . $value . "%'";
                $searchm.=" OR m.nom LIKE '%" . $value . "%'";
            }
        }
        $stmt=$db->query(
            "SELECT DISTINCT `nom`, `description` FROM results
            WHERE (`nom` LIKE $searchp ) 
            OR (`description` LIKE $searchm )
            ");
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }

    //If nothing has been found or nothing has been searched
    return 0;