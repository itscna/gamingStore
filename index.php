<?php
  session_start();
  include "admin/confs/config.php";
  $cart=0;
  if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $qty){
      $cart += $qty;
    }
  }
 ?>
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
    <div class="container-fluid">
      <div class="page-header">
        <h3>Gaming Store <small>Your gaming needs</small></h3>
      </div>

      <div class="row">
        <div class="col-md-3">
          <aside>
            <?php
              $sql="SELECT * FROM categories";
              $result=mysqli_query($conn,$sql);
             ?>
             <ul class="category">
               <li><a href="index.php">All Categories</a></li>
               <?php while($row=mysqli_fetch_assoc($result)):  ?>
               <li>
                 <a href="index.php?cats=<?=$row['id'];?>">
                   <?php echo $row['name']; ?>
                </a>
               </li>
             <?php endwhile;  ?>
             </ul>

      <!-- show shopping cart information here-->
           <div class="alert alert-info" role="alert">
             <a href="view-cart.php" class="alert-link">
               <?php echo $cart; ?> in your cart
             </a>
           </div>
           <div class="alert alert-warning" role="alert">
             <a href="clear-cart.php" class="alert-link" onclick="return confirm('Do you want to clear')">Clear Cart</a>
           </div>
         </aside>
        </div>
        <?php
          if(isset($_GET['cats'])){
            $category=$_GET['cats'];
            $sql="SELECT products.*,categories.name FROM products LEFT JOIN categories
                  ON products.category_id=categories.id WHERE categories.id=$category ORDER BY products.created_date DESC";
            $products=mysqli_query($conn,$sql);
          }
          else {
            $sql="SELECT products.*,categories.name FROM products LEFT JOIN categories
                  ON products.category_id=categories.id ORDER BY products.created_date DESC";
            $products=mysqli_query($conn,$sql);
          }
         ?>
        <div class="col-md-9">
          <h4>Products List</h4>
            <ul>
              <?php while($row=mysqli_fetch_assoc($products)): ?>
                <li>
                  <h4> <?php echo $row['product_name']; ?> </h4>
                  <a href="detail.php?id=<?=$row['id']; ?>">
                  <img src="admin/covers/<?php echo $row['cover']; ?>" alt="product's cover image" class="img-responsive"
                    width="100px" height="150px"></a>
                    <p>Price $<?=$row['price']; ?> in
                    <b>(<?=$row['name']; ?> )</b></p>
         <a href="add-to-cart.php?id=<?php echo $row['id']; ?>" class="add_to_cart_button">Add To Cart</a>
                    </li><hr>
              <?php endwhile; ?>
            </ul>
        </div>
      </div>
      <div class="row">
        <footer>
          <span>
                <script type="text/javascript"> document.write(new Date().getFullYear()); </script>
                &copy; Hello Gaming World
                <a href="index.php"> Home</a>
          </span>
        </footer>
      </div>
    </div>
  </body>
</html>
