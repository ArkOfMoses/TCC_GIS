<?php 
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=bdgisparasistemas", "root", "");
$pdo->exec("set names utf8"); 
// bdgisparasistemas