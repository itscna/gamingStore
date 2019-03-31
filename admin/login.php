<?php
session_start();

$admin_name=$_POST['admin_name'];

$pwd=$_POST['pwd'];

if($admin_name=="admin" AND $pwd=="12345" )
{
  $_SESSION['auth']=true;
  header("location:product-list.php");
}
else {
  header("location:index.php?login=failed");
}
