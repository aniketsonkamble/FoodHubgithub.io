
<?php  include('partial/menu.php');  ?>
<div class="main-content">
    <div class="wrapper">
       <h1>Update Admin</h1>
        <br><br>
				
		<?php 
		$id=$_GET['id'];
		$sql="SELECT * FROM admin_table WHERE id=$id";
		
		   $res=mysqli_query($conn,$sql);
		    if($res==true)
		    {
		      	$count= mysqli_num_rows($res);
		          if($count==1)
		       	  {
			     	  $row=mysqli_fetch_assoc($res);
				      $username=$row['username'];
				  
			        }		
              else
			  {
				  header('location:'.SITEURAL.'Admin/Manage_admin.php');
			  }			
			}			  
		?>
            <form action="" method="POST">
               <table class="tbl-30">
	               <tr>
	                    <td>Username:</td>
				      <td>
	                 <input type="text" name="username" value="<?php echo $username;?>">
	                 </td>
	                  </tr>
	              <tr>
	                <td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id;?>">
	                   <input type="submit" name="submit" value="update Admin" class="btn-secondary">
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
		$username=$_POST['username'];
		 $sql="UPDATE admin_table SET username='$username' WHERE id='$id'";
		 $res=mysqli_query($conn,$sql);
		 if($res==true)
		 {
			 $_SESSION['update']="<div class='success'> Admin updated successfully.</div>";
			 header('location:'.SITEURAL.'Admin/Manage_admin.php');
		 }
		 else
		 {
			 $_SESSION['update']="<div class='error'> Failed to add Admin .</div>";
			 header('location:'.SITEURAL.'Admin/Manage_admin.php');
		 }
	 }
   ?>
 
	    <?php  include('partial/Footer.php');  ?>