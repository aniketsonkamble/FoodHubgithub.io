<?php  
 include('../config/constant.php');
$id=$_GET['id'];
$sql="DELETE FROM admin_table WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
	$_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
	header('location:'.SITEURAL.'Admin/Manage_admin.php');
  

}
else
{
	$_SESSION['delete']="<div class='error'>Fail to  Delete Admin</div>";
	header('location:'.SITEURAL.'Admin/Manage_admin.php');
}
 ?>