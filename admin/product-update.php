<?php

 include "confs/config.php";
 include "confs/auth.php";


 $id=$_POST['id'];

 $product_name=$_POST['product_name'];
 $price=$_POST['price'];
 $detail=$_POST['detail'];
 $company_name=$_POST['company_name'];
 $category_id=$_POST['category_id'];
 $cover=$_FILES['cover']['name'];
 $tmp=$_FIELS['cover']['tmp_name'];

//if cover is changed

if($cover){

  move_uploaded_file($tmp,"covers/$cover");

  $sql="UPDATE products SET product_name='$product_name',detail='$detail',price='$price',
        company_name='$company_name',cover='$cover',category_id='$category_id',modified_date=now() WHERE id=$id ";

//if cover is not changed
}else{
  $sql="UPDATE products SET product_name='$product_name',detail='$detail',price='$price',
        company_name='$company_name',category_id='$category_id',modified_date=now() WHERE id=$id ";
}

mysqli_query($conn,$sql);

header("location:product-list.php");
