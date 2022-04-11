 <?php  include('partial/menu.php');  ?>

    <!-- Menu Content start -->
      <div class="main-content">
	  <div class="wrapper">
	     <h1>Add Admin</h1>
		 <br><br>
		 <br><br>
		 <?php 
		    if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			
		 ?>
		 <br><br><br>
	  
	  <form action="" method="post">
	  <table class="tbl-30">
	    <tr>
		   <td> Username</td>
		   <td> 
		         <input type="text" name="username" placeholder="Enter Username">
			  </td>
		</tr>
         <tr>
		   <td> Password</td>
		   <td> 
		         <input type="password" name="password" placeholder="Enter Password">
			  </td>
		</tr>
		<tr>
		   
		   <td colspan="2"> 
		         <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
			  </td>
		</tr>
		</table>
		</form>
 </div>
 </div>
 <?php  include('partial/Footer.php');  ?>
 <?php  
  /* process the value from and  sava it in Database */
   if(isset($_POST['submit']))
   {
	   $username=$_POST['username'];
	   $password=md5($_POST['password']);

       $sql="insert into admin_table set username='$username', password='$password' ";
	   $conn= mysqli_connect('localhost','root','') or die(mysqli_error());
	   $db_select=mysqli_select_db($conn,'food-order')or die(mysqli_error());
   
      $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if($res==TRUE)
        {
	      
		  $_SESSION['add']="Admin Added Successfully";
		  header("location:".SITEURAL.'Admin/Manage_admin.php');
        }
         else
          {
	       		  $_SESSION['add']=" Fail to Add Admin Successfully";
		  header("location:".SITEURAL.'Admin/Add-admin.php');
          }   
   }
   
 ?>
 