<?php  include('partial/menu.php');  ?>
<div class="menu text-center">
	   <div class="wrapper">
	      <h1> Manage Food</h1>
      </div>
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
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			?>
     <br><br>
	  <a href="<?php echo SITEURAL ;?>Admin/Add-food.php" class="btn-primary">ADD FOOD</a>
	  <br><br>
	  <table class="tbl">
	      <tr> 
		     <th>S.N.</th>
			 <th>Title</th>
			 <th>Description</th>
			 <th>Price</th>
			 <th>Image</th>
			 <th>Featured</th>
			 <th>Active</th>
		  </tr>
		  
		  
		  <?php  
		  
		    $sql="SELECT * FROM food";
			$res=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($res);
			$sn=1;
			if($count>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$title=$row['title'];
					$price=$row['price'];
					$description=$row['description'];
					$price=$row['price'];
					$image_name=$row['image_name'];
					$featured=$row['featured'];
					$active=$row['active'];
					?>
					<tr>
		     <td><?php echo $sn++ ?></td>
			 <td><?php echo $title; ?></td>
			 <td><?php echo $description; ?></td>
			 <td><?php echo $price; ?></td>
			 <td>
			 
			      <?php  
                         if($image_name!="")
						 {
							 ?>
							   <img src="<?php  echo SITEURAL;?>images/<?php echo $image_name?>"width=200px;>
							 <?php
						 }		
                         else
						 {
							 
						 }							 
				  ?>
			</td>
			 <td><?php echo $featured; ?></td>
			 <td><?php echo $active; ?></td>
			 <td>
			      <a href="<?php echo SITEURAL ?>Admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a> 
			      <a href="<?php echo SITEURAL ?>Admin/delete-food.php?id=<?php echo $id; ?>& image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
				  </td>
		  </tr>
					<?php
				}
			}
			else
			{
			 ?>
				 <tr>
				 <td colspan="6"><div class='error'>No Food added. </div></td>
				 </tr>
				<?php	
			}
		  ?>
	  </table>

<?php  include('partial/Footer.php');  ?>