<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="icon" href="admin/image/theEye.png" type="image/png">
    </head>
  <body>
    <?php
      include "admin/confs/config.php";
      $id=$_GET['id'];
      $sql="SELECT * FROM products WHERE id=$id";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
     ?>
    <div class="container-fluid">
      <div class="page-header">
        <h3>Gaming Store <small>Your gaming needs</small></h3>
      </div>
      <div class="row">
        <h4 class="detail_header"> <?php echo $row['product_name']; ?> </h4>
          <div class="col-md-4">
        <img src="admin/covers/<?=$row['cover']; ?>" alt="product's cover image" width="200px" height="300px" class="float-left">
        </div>
        <div class="col-md-8">
        <p class="detail_paragraph"> <?php echo $row['detail']; ?> </p>
        <span> Price is $ <?=$row['price']; ?>  </span>
      </div>
      </div>
      <a href="add-to-cart.php?id=<?=$row['id']; ?>" class="add_to_cart_button">Add To Cart</a>
      <a href="index.php">Continue Shopping</a>
    </div>
  </body>
</html>
