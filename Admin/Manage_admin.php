<?php  include('partial/menu.php');  ?>
   
    <!-- Menu Content start -->
      <div class="main-content">
	  <div class="wrapper">
	     <h1>Manage Admin</h1>
		 <br><br>
		 <?php 
		    if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			if(isset($_SESSION['delete']))
			{
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}
			if(isset($_SESSION['update']))
			{
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}
			if(isset($_SESSION['user-no-found']))
			{
				echo $_SESSION['user-no-found'];
				unset($_SESSION['user-no-found']);
			}
			if(isset($_SESSION['password-no-match']))
			{
				echo $_SESSION['password-no-match'];
				unset($_SESSION['password-no-match']);
			}
			if(isset($_SESSION['password-no-match-1']))
			{
				echo $_SESSION['password-no-match-1'];
				unset($_SESSION['password-no-match-1']);
			}
			if(isset($_SESSION['password-match']))
			{
				echo $_SESSION['password-match'];
				unset($_SESSION['password-match']);
			}
			
		 ?>
		 <br><br><br>
	  </div>
	  
	  <!-- Button to add admin -->
	  <a href="Add-admin.php" class="btn-primary">ADD ADMIN</a>
	  <br><br>
	  <table class="tbl">
	      <tr> 
		     <th>S.N.</th>
			 <th>Username</th>
			 <th>Actions</th>
		  </tr>
		  <?php 
		    $sql= "select * from admin_table";
			 $res=mysqli_query($conn,$sql);
			 if($res==TRUE)
			 {
				 $count=mysqli_num_rows($res);
				 if($count>0)
				 {
					 $sn=1;
					 while($rows=mysqli_fetch_assoc($res))
					 {
						 $id=$rows['id'];
						 $username=$rows['username'];
						 
					 
					 
					 ?>
					 <tr>
		                <td><?php echo $sn++ ?></td>
			              <td><?php echo $username ?></td>
			             <td>
						 <a href="<?php echo SITEURAL; ?>Admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
			               <a href="<?php echo SITEURAL; ?>Admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a> 
			               <a href="<?php echo SITEURAL; ?>Admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
				         </td>
		               </tr>
					 
					 <?php 
					 }
				 }
				 else
				 {
					 
				 }
			 }
			 
		  ?>
		  
	  </table>
	  
    <!-- Menu Content end-->
	
	 <?php  include('partial/Footer.php');  ?>