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
          <h3>Gaming Store <small>Your Gaming Needs Gigs</small></h3>
        </div>
        <div class="row">
          <div class="col-md-3">
            <ul class="category">
              <li> <a href="index.php">Continue Shopping</a> </li>
              <li> <a href="clear-cart.php" onclick="return confirm('Do you want to clear the item? ')">Clear Cart</a> </li>
            </ul>
          </div>
          <div class="col-md-9">
            <p style="color:blue;font-size:17px;">Here, the shopping items you have ordered !</p>
         <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>item</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Total</th>
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
                  <td>
                      <?php echo $row['product_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['price']; ?>
                  </td>
                  <td>
                    <?php echo $qty; ?>
                  </td>
                  <td> <?php echo $row['price'] * $qty; ?> </td>
                <?php endforeach; ?>
              </tr>
                <tr>
                  <td colspan="3" align="center"> <strong>Total</strong> </td>
                  <td><strong><?= $total; ?> </strong></td>
                </tr>
                </tbody>
             </table>

             <h4>Order Form</h4>
             <form action="submit-order.php" method="post" id="order_form">
               <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" id="name" class="form-control">
               </div>
               <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
               </div>
               <div class="form-group">
                 <label for="address">Address</label>
                 <textarea name="address" class="form-control" id="address"></textarea>
               </div>
               <input type="submit" value="Order" class="btn btn-primary btn-block">
             </form>
          </div>
        </div>
        <div class="footer">
          <script type="text/javascript"> document.write(new Date().getFullYear()); </script>
          &copy; Hello Gaming World
          <a href="index.php">Home</a>
        </div>
      </div>
<script src="admin/js/jquery-3.3.1.min.js"></script>
<script src="admin/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#order_form").validate({
        rules:{
          "name":"required",
          "email":{
            "required":true,
            "email":true
          },
          "address":"required"
        },
        messages:{
          "name":"Fill your name",
          "email":{
            "required":"Fill your Email",
            "email":"Email must be a valid email address"
          },
          "address":"Fill your address"
        }
      });
    });
</script>
   </body>
 </html>
