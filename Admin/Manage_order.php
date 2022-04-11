<?php  include('partial/menu.php');  ?>
<div class="menu text-center">
	   <div class="wrapper">
	      <h1> Manage Order</h1>
      </div>


	  <table class="tbl">
	      <tr> 
		     <th>S.N.</th>
			 <th>Name</th>
			 <th>Mobile no</th>
			 <th>Order</th>
			 <th>Additional Food</th>
			 <th>How much</th>
			 <th>Date & Time </th>
			 <th>Address</th>
			 <th>Message</th>
		  </tr>
		  
		  <?php  
		  
		    $sql="SELECT * FROM order_table";
			$res=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($res);
			$sn=1;
			if($count>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$Name=$row['Name'];
					$Mobile_number=$row['Mobile_number'];
					$Food_menu=$row['Food_menu'];
					$Additional_food=$row['Additional_food'];
					$How_much=$row['How_much'];
					$Date_time=$row['Date_time'];
					$Address=$row['Address'];
					$Message=$row['Message'];
					?><tr>
		     <td><?php echo $sn++;?></td>
			 <td> <?php echo $Name;?></td>
			 <td><?php echo $Mobile_number;?></td>
			 <td><?php echo $Food_menu;?></td>
			 <td><?php echo $Additional_food;?></td>
			 <td><?php echo $How_much;?></td>
			 <td><?php echo $Date_time;?></td>
			 <td><?php echo $Address;?></td>
			 <td><?php echo $Message;?></td>
			 <td></td>
			 <td></td>
		  </tr><?php
				}
			}
			?>
		 
	  </table>

<?php  include('partial/Footer.php');  ?>