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
      <div class="wrapper">
      <div class="page-header">
        <h2 class="header">Admin Panel Login</h2>
      </div>
      <?php if(isset($_GET['login']) AND $_GET['login']=="failed" ): ?>
          <div class="alert alert-info" role="alert">
            <p>You entered the incorrect Name Or Password
              <a href="index.php" class="alert-link">Try Again</a>
             </p>
          </div>
   <?php endif; ?>
      <div class="row">
        <form action="login.php" method="post" class="login_form">
          <div class="form-group">
            <label for="admin_name">Admin Name</label>
            <input type="text" name="admin_name" class="form-control" id="user_name">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" name="pwd" class="form-control" id="pwd">
          </div>
          <input type="submit" value="LogIn" class="btn btn-block btn-primary">
        </form>
      </div>
    </div>
    </div>

    <!--Using Jquery Validation Plugin -->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
      $('.login_form').validate({
        rules:{
          "admin_name":"required",
          "pwd":"required"
        },
        messages:{
          "admin_name":"This Field is required",
          "pwd":"This Field is required"
        }
      });
    });
</script>
  </body>
</html>
