<?php
    header('charset=utf-8');
    require 'sql.php';
    if(isset($_POST['search']) && $_POST['search']){
        $array=preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $_POST['search'], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
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
            "SELECT DISTINCT `nom`, `description` FROM `results` 
            WHERE `nom` LIKE '$searchn%' OR `nom` LIKE ' $searchn%' ORDER BY `nom` DESC LIMIT 7");

        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }

    //If nothing has been found or nothing has been searched
    return 0;