<?php  include('partial/menu.php');  ?>
<div class="main-content">
    <div class="wraper">
       <h1>Change Password</h1>
        <br><br>
		
		<?php 
		   $id=$_GET['id'];
		?>
		<form action="" method="POST">
               <table class="tbl-30">
	               <tr>
	                    <td>Current Password:</td>
				      <td>
	                 <input type="password" name="current_password" placeholder="Current Password">
	                 </td>
	                  </tr>
					  <tr>
	                    <td>New Password:</td>
				      <td>
	                 <input type="password" name="new_password" placeholder="New Password">
	                 </td>
	                  </tr>
					  <tr>
	                    <td>Conform Password:</td>
				      <td>
	                 <input type="password" name="conform_password" placeholder="Conform Password">
	                 </td>
	                  </tr>
					  
	              <tr>
	                <td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id;?>">
	                   <input type="submit" name="submit" value="Change Password" class="btn-secondary">
	                </td>
	                   </tr>
	             </table>
	   </form>
 </div>
	</div>
<?php 
     if(isset($_POST['submit']))
	 {
		 $id=$_POST['id'];
		 $current_password=md5($_POST['current_password']);
		 $new_password=md5($_POST['new_password']);
		 $conform_password=md5($_POST['new_password']);
		 $conform_password= md5($_POST['conform_password']);
		 
		 $sql="SELECT * FROM admin_table WHERE id='$id' AND password='$current_password'";
		 $res=mysqli_query($conn,$sql);
		 if($res==true)
		 {
			 $count=mysqli_num_rows($res);
			 if($count==1)
			 {
			    if($new_password== $conform_password)
				{
					$sql2="UPDATE  admin_table SET password='$new_password' WHERE id=$id";
					$res2=mysqli_query($conn,$sql2);
		               if($res==true)
					   {
						   $_SESSION['password-match']="<div class='success'>Password Changed Successfully.</div>"; 
				           header('location:'.SITEURAL.'Admin/Manage_admin.php');
					   }
					   else
					   {
						   $_SESSION['password-no-match']="<div class='error'> Fail to Change Password .</div>"; 
				           header('location:'.SITEURAL.'Admin/Manage_admin.php');
					   }
		        }
				else
				{
					$_SESSION['password-no-match-1']="<div class='error'>Password Not Match.</div>"; 
				header('location:'.SITEURAL.'Admin/Manage_admin.php');
				}
			 }
		 }
		     else
		    {
			    $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>"; 
				header('location:'.SITEURAL.'Admin/Manage_admin.php');
		    }
	    }
	 
   ?>
 
	    <?php  include('partial/Footer.php');  ?>