<?php include "confs/auth.php"; ?>
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
      <h2>New Product</h2>
      <form  action="product-add.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Product Name</label>
          <input type="text" name="product_name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price" class="form-control" id="price" maxlength="5">
        </div>
        <div class="form-group">
          <label for="detail">About Product</label>
          <textarea name="detail" class="form-control" id="detail"></textarea>
        </div>
        <div class="form-group">
          <label for="producer">Brand</label>
          <input type="text" name="company_name" id="producer" class="form-control">
        </div><br>
        <div class="custom-file">
          <label for="cover_image" class="custom-file-label">Choose Cover</label>
          <input type="file" name="cover" id="cover_image" class="custom-file-input">
        </div><br><br>
        <?php
          include "confs/config.php";
          $sql="SELECT id,name FROM categories";
          $result=mysqli_query($conn,$sql);
         ?>
         <select name="category_id" class="custom-select" required>
           <option value="0">Choose Category</option>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
             <option value="<?php echo $row['id']; ?>">
               <?php echo $row['name']; ?>
             </option>
           <?php endwhile; ?>
         </select><br><br>

         <input type="submit" value="Add" class="btn btn-primary btn-block">
      </form>


    </div>
  </body>
</html>
