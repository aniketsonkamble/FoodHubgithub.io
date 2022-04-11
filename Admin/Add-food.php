<?php  include('partial/menu.php');  ?>
<div class="main-content">
	  <div class="wrapper">
	     <h1>Add Food</h1>
		 <br><br>
		 <br><br>
		 <?php
		   
		    if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			?>
      <form action="" method="post" enctype="multipart/form-data">
	      <table class="tbl-30">
	         <tr>
		          <td> Title</td>
		             <td> 
		                   <input type="text" name="title" placeholder="Title of the Food">
			         </td>
		     </tr>
		
	     	<tr>
		          <td> Description</td>
		          <td> 
		               <textarea  name="description" cols="40" rows="10" placeholder=" Description  of the Food"></textarea>
			     </td>
		    </tr>
		
		    <tr>
		          <td>Price</td>
		         <td> 
		             <input type="number" name="price" placeholder="Price of the Food">
			     </td>
		    </tr>
		
	      	<tr>
		        <td> Image</td>
		        <td> 
		            <input type="file" name="image">
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
		<tr>
		<tr>
		   <td > 
		         <input type="submit" name="submit" value="Add Food" class="btn-secondary">
			  </td>
		</tr>
      </table>
 </form>
      <?php if(isset($_POST['submit']))
	    {
	     $title=$_POST['title'];
		  $description=$_POST['description'];
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
			$image_name="food".rand(000,999).'.'.$ext;
			
			$source_path= $_FILES['image']['tmp_name'];
			$destination_path = "../images/".$image_name;
			
			$upload=move_uploaded_file($source_path,$destination_path);
			
			if($upload==false)
			{
				$_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
				header('location:'.SITEURAL.'admin/Add-food.php');
				die();
			}
		 }
		 }
		 else
		 {
			 $image_name="";
		 }
		 $sql="INSERT INTO food SET title='$title',description='$description', price='$price',image_name='$image_name',  featured='$featured', active='$active'";
		 $res=mysqli_query($conn,$sql);
		 
		 if($res==TRUE)
			{
				$_SESSION['add']="<div class='success'> Food added Successfully</div>";
				header('location:'.SITEURAL.'admin/Manage_food.php');
			}
			else
			{
				$_SESSION['add']="<div class='error'> Failed to Add  Food </div>";
				header('location:'.SITEURAL.'admin/Manage_food.php');
			}
	  }
		 ?>
		 </div>
	  </div>
	  <?php  include('partial/Footer.php');  ?>