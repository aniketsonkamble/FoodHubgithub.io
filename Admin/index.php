
<?php  include('partial/menu.php');  ?>
   
    <!-- Menu Content start -->
      <div class="main-content">
	  <div class="wrapper">
	     <h1>Dashboard</h1>
	  </div>
	  <br><br>
	<?php 
		    if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}
	?>
	  <div class="col-4 text-center">
	  
	    <h1>5</h1>
		<br>
		Categories
	  </div>
	  
	  <div class="col-4 text-center">
	  
	    <h1>5</h1>
		<br>
		Categories
	  </div>
	  <div class="col-4 text-center">
	  
	    <h1>5</h1>
		<br>
		Categories
	  </div>
	  <div class="col-4 text-center">
	  
	    <h1>5</h1>
		<br>
		Categories
	  </div>
	  <div class="clearflex"></div>
	  
    <!-- Menu Content end-->
	
   <?php  include('partial/Footer.php');  ?>