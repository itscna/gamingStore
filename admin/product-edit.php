<!DOCTYPE html>
<html>
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
      <h2>Editing</h2>
      </div>
        <?php
          include "confs/config.php";
          $id=$_GET['id'];
          $result=mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
          $row=mysqli_fetch_assoc($result);
         ?>
      <form action="product-update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value=" <?php echo $row['id']; ?> ">

        <div class="form-group">
          <label for="name">Product Name</label>
          <input type="text" name="product_name" value=" <?php echo $row['product_name'] ?> " class="form-control" id="name" required>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price" value=" <?php echo $row['price'] ?>" class="form-control" id="price" maxlength="5" required>
        </div>
        <div class="form-group">
          <label for="detail">Detail</label>
          <textarea name="detail"  class="form-control" id="detail">
            <?php echo $row['detail'] ?>
          </textarea>
        </div>
        <div class="form-group">
          <label for="company_name">Manufacturer</label>
          <input type="text" name="company_name" value="<?= $row['company_name']; ?>"
           class="form-control" id="company_name">
        </div>
        <div class="custom-file">
          <label for="cover_image" class="custom-file-label">Choose Cover</label>
          <input type="file" name="cover" id="cover_image" class="custom-file-input">
        </div><br><br>

          <select class="custom-select" name="category_id">
            <option value="0">Choose</option>

            <!--Getting categories from categories Table -->

            <?php
              $cat=mysqli_query($conn,"SELECT * FROM categories");
              while($cat_id=mysqli_fetch_assoc($cat)):
             ?>
             <option value="<?=$cat_id['id']; ?> ">
               <?php if($cat_id['id']==$row['category_id'])
                  echo "SELECTED";
                ?>
               <?=$cat_id['name']; ?>

             </option>
           <?php endwhile; ?>
         </select><br>
        <input type="submit" value="Edit" class="btn btn-block btn-secondary">
      </form>
      <a href="product-list.php" class="text-primary">Back</a>
    </div>
  </body>
</html>
