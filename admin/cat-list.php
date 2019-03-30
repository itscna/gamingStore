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
      <h2>Category List</h2>
      <?php
        include "confs/config.php";
        $sql="SELECT * FROM categories";
        $result=mysqli_query($conn,$sql);
       ?>
       <table class="table table-bordered">
         <thead class="thead-light">
            <tr>
              <th>Category Name</th>
              <th colspan="2">Actions</th>
            </tr>
            <tbody>
              <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                  <td title=<?php echo $row['remark']; ?>> <?php echo $row['name']; ?> </td>
                  <td> <a href="cat-edit.php?id=<?php echo $row['id']; ?>">Edit</a> </td>
                  <td> <a href="cat-del.php?id=<?php echo $row['id']; ?>">Delete</a> </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
         </thead>
       </table>
       <a href="cat-new.php">Back</a>
    </div>
  </body>
</html>
