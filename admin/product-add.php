<?php
include "confs/config.php";
include "confs/auth.php";
$product_name=$_POST['product_name'];
$price=$_POST['price'];
$detail=$_POST['detail'];
$company_name=$_POST['company_name'];
$category_id=$_POST['category_id'];

$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];
if($cover){
  move_uploaded_file($tmp,"covers/$cover");
}

$sql="INSERT INTO products(product_name,price,detail,company_name,cover,
      category_id,created_date,modified_date) VALUES ('$product_name',
      '$price','$detail','$company_name','$cover','$category_id',now(),now() )";

mysqli_query($conn,$sql);

header("location:product-list.php");
