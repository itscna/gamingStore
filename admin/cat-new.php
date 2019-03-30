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
  <!-- Navbar Starts Here-->
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
  <!--Navbar Ends Here -->

  <h2>Category Adding</h2>
      <form action="cat-add.php" method="post">
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="cat_name" id="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="remark">Remark</label>
            <textarea name="remark" id="remark" class="form-control"></textarea>
          </div>
          <input type="submit" value="Add" class="btn btn-primary btn-block">
      </form>
    </div>
  </body>
</html>
