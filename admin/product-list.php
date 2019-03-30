<?php
include "confs/config.php";
include "confs/auth.php";

 if(isset($_GET['category'])){
     $cat=$_GET['category'];
      $sql="SELECT products.*,categories.name FROM products LEFT JOIN categories ON
         products.category_id=categories.id  WHERE categories.id='$cat' ORDER BY products.created_date DESC";

         $result=mysqli_query($conn,$sql);
     }else{
       $sql="SELECT products.*,categories.name FROM products LEFT JOIN categories ON
          products.category_id=categories.id ORDER BY products.created_date DESC";
          $result=mysqli_query($conn,$sql);
     }

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#5c7bf9;" id="menu">
              <a href="#" class="navbar-brand">Store</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="cat-list.php" class="nav-link">Manage Categories</a> </li>
                    <li class="nav-item"><a href="product-list.php" class="nav-link">Manage Products</a> </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a> </li>
                  </ul>
                </div>
            </nav>
          </div>
      <div class="page-header">
        <h2>Products List</h2>
      </div>
    <div class="row">

      <!--Category Sidebar Starts -->
        <div class="col-md-2">
          <aside>
            <ul>
              <li> <a href="product-list.php">All Categories</a></li>

              <?php $cats=mysqli_query($conn,"SELECT * FROM categories");
                    while($categories=mysqli_fetch_assoc($cats)):
               ?>
               <li>
                 <a href="product-list.php?category=<?=$categories['id']; ?> ">
                   <?=$categories['name']; ?>
                 </a>
               </li>
             <?php endwhile; ?>
             <li>
               <a href="product-new.php">Add New Product</a>
             </li>
            </ul>
          </aside>

        </div>
        <!--Category Sidebar Ends -->
    <div class="col-md-10">
        <ul>
          <?php while($row=mysqli_fetch_assoc($result)): ?>
          <li>
            <img src="covers/<?php echo $row['cover']; ?>" alt="product_image" align="right" height="140">
            <h3> <?php echo $row['product_name']; ?> </h3>
            <p id="detail_paragraph"> <?php echo $row['detail']; ?> </p>
            <p> price $(<?php echo $row['price']; ?>) in <strong><?php echo $row['name']; ?></strong></p>
            <p> manufactured by <i><?php echo $row['company_name']; ?></i></p>
            <a href="product-del.php?id=<?php echo $row['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete it?')")>Delete</a>
            <a href="product-edit.php?id=<?php echo $row['id']; ?>" class="text-warning">Edit</a>
          </li><hr>
        <?php endwhile; ?>
        </ul>
      </div>
      </div>
    </div>

  </div>
  </body>
</html>
