<?php
include "confs/config.php";
include "confs/auth.php";

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM products WHERE id=$id");

header("location:product-list.php");
