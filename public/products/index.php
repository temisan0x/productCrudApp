<?php 
      /** @var $pdo \PDO */
      
      require_once "../../database.inc.php";
        
      //if search is triggered
      $search = $_GET['search'] ?? '';
    
      if ($search) {
         $statment = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
         $statment->bindValue(':title', "%$search%");
      } else {
          //if search could not be found
        $statment = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
      }
      $statment->execute();
      $products = $statment->fetchAll(PDO::FETCH_ASSOC);

;?>

<?php include_once '../../views/partials/header.php'?>
    
<div class="container">
    <h1 class="m-5">Product CRUD </h1>

        <!--Create form for the products-->

        <p>
            <a type="button" class="btn btn-success btn-sm" href="create.php">Create Product </a>
        </p>

        <form>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for products" name="search" value="<?php echo $search ?>">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Search</button>
            </div>
            </div>
        </form>

        <table class="table ml-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $i => $product):?>

                    <tr>
                        <th scope="row"><?php echo $i + 1 ?></th>
                        <td>
                            <?php if($product['image']): ?>
                                <img src="/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="thumb-image">
                            <?php endif;?>
                        </td>
                        <td><?php echo $product['title'];?></td>
                        <td><i class="fas fa-dollar-sign"></i> <?php echo $product['price'];?></td>
                        <td><?php echo $product['create_date'];?></td>
                        <td>
                            <a href="update.php?id=<?php echo $product['id']?>" class="btn btn-primary btn-sm">Edit</a>
                        <form style="display: inline-block;" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button href="delete.php?id=<?php echo $product['id'] ?>" type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>
                    </tr>
        
                <?php endforeach;?>
            </tbody>
        </table>
</div>

</body>
</html>