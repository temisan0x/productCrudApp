  <!--error alert message-->
  <?php if(!empty($errors)) :?>
  <div class="alert alert-danger position-relative w-25 ml-3">
    <?php foreach ($errors as $error):?>
      <div><?php echo $error ;?></div>
    <?php endforeach;?> 
  </div>
<?php endif ;?>

<!--FORM-->
<form class="mx-5" action="" method="POST" enctype="multipart/form-data">
    <!--display image product-->
    <?php if($product['image']):?>
        <img src="/<?php echo $product['image']?>" class="update-image">
    <?php endif ;?>


    <div class="form-group">
      <label for="" class="mb-3">Product image</label>
      <br>
      <input type="file" class="custom-file-input custom-file-label mb-1"  name="image">        
    </div>
    <div class="form-group">
      <label for="">Product Title</label> 
      <input type="text" class="form-control w-50" name="title" value="<?php echo $title?>">        
    </div>
    <div class="form-group mb-5">
      <label for="">Product Description</label>
      <textarea type="text" class="form-control w-50" name="description" value="<?php echo $description?>"></textarea>       
    </div>
    <div class="form-group mb-5">
      <label for="">Product Price</label>
      <input type="number" step=".01" class="form-control w-50" name="price" value="<?php echo $price?>">        
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>