<?php 
 include('../config/constant.php');
 if(isset($_GET['id']) AND isset($_GET['image_name']))
 {
	 $id=$_GET['id'];
	 $image_name=$_GET['image_name'];
	 if($image_name!="")
	 {
		 $path='../images/'.$image_name;
		 $remove=unlink($path);
		 if($remove==false)
		 {
			$_SESSION['upload']="<div class='error'>Failed to  Remove Image</div>";
				header('location:'.SITEURAL.'admin/Manage_food.php');
				die(); 
		 }
	 }
	 $sql="DELETE FROM food WHERE id=$id";   
	 $res=mysqli_query($conn,$sql);
	 
	 if($res==true)
	 {
		 $_SESSION['delete']="<div class='success'> Food Deleted Successfully. </div>";
		 header('location:'.SITEURAL.'admin/Manage_food.php');
	 }
	 else
	 {
		 $_SESSION['delete']="<div class='error'>Failed to Delete Food. </div>";
		 header('location:'.SITEURAL.'admin/Manage_food.php');
	 }
 }
     else
	 {
		 $_SESSION['delete']="<div class='error'>Unauthorized user. </div>";
		 header('location:'.SITEURAL.'admin/Manage_food.php');
	 }	 
 
 ?>