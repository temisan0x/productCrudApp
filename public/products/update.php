<?php

/** @var $pdo \PDO */
require_once "../../database.inc.php";
require_once "../../functions.php";

$id = $_GET['id'] ?? null;
//if id not passed!.. redirect to index.php 
if (!$id) {
     header('Location: index.php');
     exit;
}

//select from db
$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

//preview $products in input
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

//check validations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_product.php";

    //if no error, run update

    if (empty($errors)) {       

      $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");
      $statement->bindValue(':title', $title);
      $statement->bindValue(':image', $imagePath);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':price', $price);
      $statement->bindValue(':id', $id);

      $statement->execute();
      header('Location: index.php');
  }
}  

;?> 

<?php include_once '../../views/partials/header.php'?>
 
<div class="container">
    
<p class="border-radius">
    <a class="btn btn-secondary" href="index.php">Go back to Products</a>
</p> 

 <h2 class="m-5">Update Product <b><?php echo $product['title'] ;?></b></h2>

<?php include_once "../../views/products/form.php" ;?>
</div>
</body>
</html>