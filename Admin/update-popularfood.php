 <?php  include('partial/menu.php');  ?>
 <div class="main-content">
	  <div class="wrapper">
	     <h1>Update  Popular Food</h1>
		 <br><br>
		 <br><br>
		 <?php 
		         if(isset($_GET['id']))
		         {
			         $id=$_GET['id'];
			          $sql="SELECT * FROM pop WHERE id=$id";
			          $res=mysqli_query($conn,$sql);
			          
				    $row=mysqli_fetch_assoc($res);
				     $id=$row['id'];
					$title=$row['title'];
					$price=$row['price'];
					$current_image=$row['image_name'];
					$featured=$row['featured'];
					$active=$row['active'];	  
			      }
			      else
			        {
				          $_SESSION['no-popularfood-found']="<div class='error'>NO Food Found. </div>";
		                   header('location:'.SITEURAL.'admin/Manage_category.php');
			        }
		  
		  ?>
		 
		 <form action="" method="POST" enctype="multipart/form-data">
	          <table class="tbl-30">
	                <tr>
		                 <td>Title </td>
		                   <td> 
		                         <input type="text" name="title" value="<?php echo$title;?>">
			                </td>
		            </tr>
		
		
		            <tr>
		                      <td>Price </td>
		                       <td> 
		                           <input type="number" name="price" value="<?php echo$price;?>">
			                    </td>
		             </tr>
					 <tr>
					       <td> Current Image </td>
		                     <td>
		                      <?php 
			                      if($current_image=="")
				                    {
					                     echo"<div class='error'> Image Not Added.</div>";
									}
									else
									{
										?>
					                   <img src="<?php echo SITEURAL;?>images/<?php echo $current_image;?>" width="150">
					                      <?php
				                      }
				                    ?>   
		                    </td>       
		              </tr>
		
		                <tr>
		                          <td> New Image </td>
		                           <td> 
		                               <input type="file" name="image">
		                          </td>
		                  </tr>
      
	                       <tr>
		                           <td>Featured </td>
		                       <td> 
		                            <input <?php if($featured=="Yes"){echo "checked";} ?>  type="radio" name="featured" value="Yes">Yes
		                             <input <?php if($featured=="No"){echo "checked";} ?>  type="radio" name="featured" value="No">No
		                        </td>
		                        </tr>
								 <tr>
		                                <td>Active</td>
                             		    <td> 
		                                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
		                                    <input <?php if($active=="No"){echo "checked";} ?>  type="radio" name="active" value="No">No
		                                  </td>
                         		</tr>
								<tr> 
		                           <td> 
		                                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
		                                <input type="hidden" name="id" value="<?php echo $id;?>">
			                               <input type="submit" name="submit" value="Update Popular Food" class="btn-secondary">
			                         </td>
		                          </tr>
		       </table>
         </form>			   
       <?php 
           if(isset($_POST['submit']))
	        {
		        $id=$_POST['id'];
		        $title=$_POST['title'];
				$price=$_POST['price'];
				$current_image=$_POST['current_image'];
				$featured=$_POST['featured'];
				$active=$_POST['active'];
			if(isset($_FILES['image']['name']))
		 {
			$image_name= $_FILES['image']['name'];
			if($image_name!="")
			{
			$ext=end(explode('.',$image_name));
			$image_name="popular-food".rand(000,999).'.'.$ext;
			
			$source_path= $_FILES['image']['tmp_name'];
			$destination_path = "../images/".$image_name;
			
			$upload=move_uploaded_file($source_path,$destination_path);
			
			if($upload==false)
			{
				$_SESSION['upload']="<div class='error'>Failed to Upload  New Image.</div>";
				header('location:'.SITEURAL.'admin/Add-food.php');
				die();
			}
		       if($current_image!="")
			   {
				   $remove_path="../images/".$current_image;
				   $remove=unlink($remove_path);
				   if($remove==false)
				   {
					   $_SESSION['removed-faailed']="<div class='error'> Failed to remove current image. </div>";
                          header('location:'.SITEURAL.'admin/Manage_food.php');
						  die();
					}
			   }
            }
			else
			{
				$image_name=$current_image;
			}
		 }
		 else
		 {
			 $image_name="";
		 }
		 
		 
		  $sql1="UPDATE pop SET title='$title', price='$price',image_name='$image_name',featured='$featured',active='$active' WHERE id=$id";
		 $res=mysqli_query($conn,$sql1);
		 
		 if($res==TRUE)
			{
				$_SESSION['add']="<div class='success'> Popular  Food Updated successfully.</div>";
				header('location:'.SITEURAL.'admin/Manage_category.php');
			}
			else
			{
				$_SESSION['add']="<div class='error'> Fail to Updated  Food </div>";
				header('location:'.SITEURAL.'admin/Manage_food.php');
			}
	}
			
	?>
	</div>    
</div>



<?php  include('partial/Footer.php'); ?>