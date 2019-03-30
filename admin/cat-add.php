<?php
 include "confs/config.php";
 include "confs/auth.php";

 $name=mysqli_real_escape_string($conn,$_POST['cat_name']);
 $remark=mysqli_real_escape_string($conn,$_POST['remark']);

 $sql="INSERT INTO categories(name,remark,created_date,
      modified_date) VALUES('$name','$remark',now(),now())";

mysqli_query($conn,$sql);

header("location:cat-list.php");
