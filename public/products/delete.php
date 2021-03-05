<?php 

/** @var $pdo \PDO */
 
require_once "../../database.inc.php";

//if!.. redirect to index.php 
$id = $_POST['id'] ?? null;

if (!$id) {
     header('Location: index.php');
     exit;
}

//Prepared statement
$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');

?> 