<?php
  session_start();
  include "admin/confs/config.php";
  if(!isset($_SESSION['cart'])){
    header("location:index.php");
    exit();
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
        <h3>Gaming Store <small>Your gaming needs</small> </h3>
      </div>
       <div class="row">
         <div class="col-md-3">
           <aside>
             <ul class="category">
               <li><a href="index.php">Continue Shopping</a></li>
               <li><a href="clear-cart.php" onclick="return confirm('Do you want to  clear? ')">Clear Cart</a></li>
             </ul>
           </aside>
         </div>
         <div class="col-md-9">
            <p style="color:blue;font-size:19px;"><i> Here, Your Gaming Gig lists in your Shopping Cart </i> </p>
           <table class="table table-bordered">
             <thead class="thead-light">
             <tr>
               <th>Name</th>
               <th>Price</th>
               <th>Unit</th>
               <th>Total Price</th>
             </tr>
           </thead>
           <?php
              $total=0;
              foreach($_SESSION['cart'] as $id=>$qty):
              $sql="SELECT product_name,price FROM products WHERE id=$id";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_assoc($result);
              $total += $row['price'] * $qty;
            ?>
            <tbody>
              <tr>
                <td><?=$row['product_name']; ?></td>
                <td><?=$row['price'];  ?></td>
                <td><?=$qty; ?> </td>
                <td>
                  <?=$row['price'] * $qty; ?>
              </td>
              </tr>
            </tbody>
          <?php endforeach; ?>
          <tfoot>
            <tr>
            <td colspan="3">Grand Total</td>
            <td>
                <?=$total; ?>
            </td>
          </tr>
          </tfoot>
           </table>

           <!--Order Form Here -->
           <p>Thank you for your Order, You may need to fill the following form to complete your
              Shopping order.</p>
          <form action="submit-order.php" method="post" id="order_form">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="ph_number">Phone number</label>
              <input type="text" name="ph_number" id="ph_number" class="form-control" aria-describedby="phHelptext">
              <small class="form-text text-muted" id="phHelptext">Phone numbers are optional.</small>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" id="address" class="form-control"></textarea>
            </div>
            <input type="submit" value="Submit Order" class="btn btn-primary btn-block">
          </form>
         </div>
       </div>
       <div class="row">
         <footer>
            <span>
              <script type="text/javascript"> document.write(new Date().getFullYear()); </script>
              &copy; Hello Gaming World.
              <a href="index.php"> Go home</a>
           </span>
         </footer>
       </div>
    </div>
    <!--Customer order form validation here -->
<script src="admin/js/jquery-3.3.1.min.js"></script>
<script src="admin/js/jquery.validate.min.js"></script>
<script>
  $(document).ready(function(){
    $("#order_form").validate({
        rules:{
          "name":"required",
          "email":{
            "email":true,
            "required":true
          },
          "address":"required"
        },
        messages:{
          "name":"Please tell us your name",
          "email":"Please tell us your email address",
          "address":"Fill your address"
        }
    });
  });
</script>
  </body>
</html>
