<?php 
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=bdgis", "root", "");
$pdo->exec("set names utf8"); 