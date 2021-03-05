<?php 

/** @var $pdo \PDO */
require_once "../../database.inc.php";
require_once "../../functions.php";
 
$errors = [];

$title = ''; 
$price = '';
$product = [
  'image' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_product.php";
    
    if (empty($errors)) {
       
      $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
          VALUES(:title, :image, :description, :price, :date)");
     
      $statement->bindValue(':title', $title);
      $statement->bindValue(':image', $imagePath);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':price', $price);
      $statement->bindValue(':date', date('Y-m-d H:i:s'));
      $statement->execute();

      header('Location:index.php');
    }


}

?>

<?php include_once '../../views/partials/header.php'?>

<p class="pt-5">
    <a class="btn btn-secondary"  href="index.php">Go back to Products</a>
</p> 

   <div class="container">
     <h1 class="m-5">Create New Product</h1>
 
    <?php include_once "../../views/products/form.php" ;?>
   </div>
</body>
</html>