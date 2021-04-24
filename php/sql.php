<?php
    $link= new PDO('mysql:host=localhost;', 'root', '');
    $link->query('CREATE DATABASE IF NOT EXISTS `autocompletion` CHARACTER SET utf8');
    $db = new PDO('mysql:host=localhost;dbname=autocompletion;charset=UTF8', 'root');
    $sql= file_get_contents(realpath($_SERVER["DOCUMENT_ROOT"]) . '/autocompletion/php/autocompletion.sql');
    $db->exec($sql);