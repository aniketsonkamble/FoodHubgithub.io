<?php  include('partial/menu.php');  ?>
<div class="main-content">
	  <div class="wrapper">
	     <h1>Add Popular Food</h1>
		 <br><br>
		 <br><br>
		 <?php 
		    if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			 if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			?>
		 <form action="" method="POST" enctype="multipart/form-data">
	  <table class="tbl-30">
	  
	  <tr>
		   <td> Title</td>
		   <td> 
		         <input type="text" name="title" placeholder="Title">
			</td>
		</tr>
		  
		  <tr>
		   <td> Price</td>
		   <td> 
		         <input type="price" name="price" placeholder="Price">
			  </td>
		</tr>
		
		<tr>
		   <td> Select Image</td>
		   <td> 
		         <input type="file" name="image" >
			  </td>
		</tr>
		<tr>
		   <td> Featured</td>
		   <td> 
		         <input type="radio" name="featured" value="Yes">Yes
				  <input type="radio" name="featured" value="No">No
			  </td>
		</tr>
		<tr>
		   <td> Active</td>
		   <td> 
		         <input type="radio" name="active" value="Yes">Yes
				  <input type="radio" name="active" value="No">No
			  </td>
		</tr>
		<tr>
		   
		   <td colspan="2"> 
		         <input type="submit" name="submit" value="Add Popular Food" class="btn-secondary">
			  </td>
		</tr>
	  </table>
	  </form>
	  
	  <?php if(isset($_POST['submit']))
	  {
	     $title=$_POST['title'];
		 $price=$_POST['price'];
		 if(isset($_POST['featured']))
		 {
			 $featured=$_POST['featured'];
		 }
		 else
		 {
			 $featured="No";
		 }
		 if(isset($_POST['active']))
		 {
			 $active=$_POST['active'];
		 }
		 else
		 {
			 $active="No";
		 }
		 if(isset($_FILES['image']['name']))
		 {
			$image_name= $_FILES['image']['name'];
			if($image_name!="")
			{
			$ext= end(explode('.',$image_name));
			$image_name="popular-food".rand(000,999).'.'.$ext;
			
			$source_path= $_FILES['image']['tmp_name'];
			$destination_path = "../images/".$image_name;
			
			$upload=move_uploaded_file($source_path,$destination_path);
			
			if($upload==false)
			{
				$_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
				header('location:'.SITEURAL.'admin/Add-popularfood.php');
				die();
			}
		 }
		 }
		 else
		 {
			 $image_name="";
		 }
		 $sql="INSERT INTO pop SET title='$title', price='$price',image_name='$image_name',  featured='$featured', active='$active'";
		 $res=mysqli_query($conn,$sql);
		 
		 if($res==TRUE)
			{
				$_SESSION['add']="<div class='success'>Popular Food added Successfully</div>";
				header('location:'.SITEURAL.'admin/Manage_category.php');
			}
			else
			{
				$_SESSION['add']="<div class='error'> Fail to Add Popular Food </div>";
				header('location:'.SITEURAL.'admin/Manage_category.php');
			}
	  }
		 ?>
		 </div>
	  </div>

<?php  include('partial/Footer.php');  ?>