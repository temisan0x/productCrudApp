<?php 

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_crud', 'temisan', 'valentino');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

