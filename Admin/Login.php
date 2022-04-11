<?php  include('../config/constant.php');?>
<!DOCTYPE html>
<!-- sign up page -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Eagle Restaurent Employee sign up page</title>
  <link rel="stylesheet" href="../css/sign_up_page_style.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>   
  <div class="wrapper">
    <header>Login Form</header>
	<br><br>
	<?php 
		    if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}
	?>
    <form action="" method="POST" >
      <div class="field username">
        <div class="input-area">
          <input type="text" name="username" placeholder="Username">
          <i class="icon fas fa-user"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Username can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" name="password" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      
      <input type="submit" name="submit" value="Login">
    </form>
	

</body>
</html>
    <?php 
     if(isset($_POST['submit']))
	 { 
		 $username=$_POST['username'];
		 $password=md5($_POST['password']);
		 $sql="SELECT * FROM  admin_table WHERE username='$username' AND password='$password'";
		 
		 $res= mysqli_query($conn,$sql);
		
		 $count= mysqli_num_rows($res);
		 
		 if($count==1)
		 {
			 $_SESSION['login']="<div class='success'> Login Successfully .</div>"; 
				           header('location:'.SITEURAL.'Admin/');
			 
		 }
		 else
		 {
			$_SESSION['login']="<div class='error'>Failed to Login .</div>"; 
				           header('location:'.SITEURAL.'Admin/Login.php');
			
		
		 }
	 }
	?>
  

 