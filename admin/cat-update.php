<?php
include "confs/config.php";
include "confs/auth.php";

$id=$_POST['id'];

$name=$_POST['cat_name'];

$remark=$_POST['remark'];

$sql="UPDATE categories SET name='$name',remark='$remark',modified_date=now() WHERE id='$id' ";

mysqli_query($conn,$sql);

header("location:cat-list.php");
