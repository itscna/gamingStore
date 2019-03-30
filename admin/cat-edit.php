<?php
  include "confs/auth.php";
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
      <h2>Edit category</h2>
      <?php
        include "confs/config.php";
        $id=$_GET['id'];
        $result=mysqli_query($conn,"SELECT * FROM categories WHERE id=$id");
        $row=mysqli_fetch_assoc($result);
       ?>
        <form action="cat-update.php" method="post">

          <input type="hidden" name="id" value="<?php  echo $row['id']; ?>">

          <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" name="cat_name" value="<?php echo $row['name']; ?>" class="form-control" id="name">
        </div>
        <div class="form-group">
          <label for="remark">Remark</label>
          <textarea name="remark" class="form-control" id="remark">
              <?php echo $row['remark']; ?>
          </textarea>
        </div>
        <input type="submit"  value="Update" class="btn btn-block btn-secondary">
        </form>
        <a href="cat-list.php">Category List</a>
    
    </div>
  </body>
</html>
