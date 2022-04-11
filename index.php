<?php  include('Admin/partial/front-menu.php');  ?>
<!-- search form  -->

<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="search-input" id="search-box">
   <label for="search-box" class="fas fa-search"name="search"></label>
    <i class="fas fa-times" id="close"></i>
	<?php 
	if(isset($_POST['search']))
	{
		$input=mysqli_real_escape_string($conn,$_POST['search-input']);
		$sql=" SELECT * FROM food WHERE title=$input";
		$res=mysqli_query($conn,$sql);
		if(mysqli_num_rows($res))
		{
			echo"success";
		}
		else{
			echo"fail";
		}
	}
	?>
</form>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>spicy noodles</h3>
                    <p>Though instant ramen noodles provide iron, B vitamins and manganese, they lack fiber, 
					protein and other crucial vitamins and minerals</p>
                    <a href="#order" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home-img-1.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>chocolate  cake</h3>
                    <p>It is said that chocolate cake is good for reducing cholesterol levels. 
					It is good for making a good and healthy heart. The chocolate inside cake lowers the LDL level which leads to 
					protection from coronary heart disease. A moderate amount of sugar and chocolate helps in regulating the cholesterol 
					level in the body.</p>
                    <a href="#order" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home-img-2.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>hot pizza</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#order" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home-img-3.png" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="dishes">

    <h3 class="sub-heading"> our dishes </h3>
    <h1 class="heading"> popular dishes </h1>
       <div class="box-container">
    <?php 
	   $sql="SELECT * FROM pop ";
	   $res=mysqli_query($conn,$sql);
	   $count=mysqli_num_rows($res);
	   if($count>0)
	   {
		   while($row=mysqli_fetch_assoc($res))
		   {
			   $id=$row['id'];
			   $title=$row['title'];
			   $image_name=$row['image_name'];
			   $price=$row['price'];
			   ?>
			   
			    <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
			<?php 
			if($image_name=="")
			{
				  echo"<div calss='error'> Image is not available.</div>";
			}
			else
			{
				?>
				 <img src="<?php echo SITEURAL;?>images/<?php echo $image_name;?>" alt="">   
				<?php
			}
			?>
               
            <h3><?php echo $title;?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$<?php echo $price;?></span>
            <a href="#order" class="btn">Order now</a>
        </div>
			   <?php
		   }
		 }
		   else
		   {
			   echo"<div calss='error'> Popular Food Not Added.</div>";
		   }
	?>
        
        </div>

    </div>

</section>

<!-- dishes section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>best food in the country</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->
 
<!-- menu section starts  -->

<section class="menu" id="menu">

    <h3 class="sub-heading"> our menu </h3>
    <h1 class="heading"> today's speciality </h1>
	
<div class="box-container">
        
      <?php 
       	    $sql="SELECT * FROM food ";
	        $res1=mysqli_query($conn,$sql);
	        $count=mysqli_num_rows($res1);
	        if($count>0)
	        {
		        while($row=mysqli_fetch_assoc($res1))
		        {
			      $id=$row['id'];
			      $title=$row['title'];
			       $image_name=$row['image_name'];
			      $price=$row['price'];
			      $description=$row['description'];
			   ?>  
				   
				   <div class="box">
				   <div class="image">
				   <?php
				   if($image_name=="")
			        {
			      	  echo"<div calss='error'> Image is not available.</div>";
			          }
	            		else
			          {
				       ?>
				       <img src="<?php echo SITEURAL;?>images/<?php echo $image_name;?>" alt="">   
				       <?php
			}
			?>
			            <a href="#" class="fas fa-heart"></a>
                         </div>
                          <div class="content">
                            <div class="stars">
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                   <i class="fas fa-star-half-alt"></i>
                               </div>
							   
                <h3><?php echo$title;?></h3>
                <p><?php echo$description;?></p>
                <a href="#order" class="btn">order now</a>
                <span class="price">$<?php echo$price;?></span>
            </div> </div><?php
		   }
	   }else
		   {
			   echo"<div calss='error'>  Food Not Added.</div>";
		   }
	?>                     
       

</section>

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/a.jpeg" alt="">
                    <div class="user-info">
                        <h3>Aniket Sonkamble</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/manmath.jpeg" alt="">
                    <div class="user-info">
                        <h3>manmath Ashiture</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/Dipak.jpeg" alt="">
                    <div class="user-info">
                        <h3>dipak ligade</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/Shreyash.jpeg" alt="">
                    <div class="user-info">
                        <h3> shreyash</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

        </div>

    </div>
    
</section>

<!-- review section ends -->

<!-- order section starts  -->

<section class="order" id="order">

    <h3 class="sub-heading"> order now </h3>
    <h1 class="heading"> free and fast </h1>

    <form action="" method="POST">

        <div class="inputBox">
            <div class="input">
                <span>your name</span>
                <input type="text" name="Name" placeholder="enter your name">
            </div>
            <div class="input">
                <span>your number</span>
                <input type="number" name="Mobile_number" placeholder="enter your number">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>your order</span>
                <input type="text" name="Food_menu" placeholder="enter food name">
            </div>
            <div class="input">
                <span>additional food</span>
                <input type="test" name="Additional_food" placeholder="extra with food">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>how musch</span>
                <input type="number" name="How_much"  placeholder="how many orders">
            </div>
            <div class="input">
                <span>date and time</span>
                <input  type="datetime-local" name="Date_time">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>your address</span>
                <textarea name="Address" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="Message" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <input type="submit" name="submit" value="order now" class="btn">

    </form>
<?php 
   if(isset($_POST['submit']))
   {
	   
	   $Name=$_POST['Name'];
	   $Mobile_number=$_POST['Mobile_number'];
	   $Food_menu=$_POST['Food_menu'];
	   $Additional_food=$_POST['Additional_food'];
	   $How_much=$_POST['How_much'];
	   $Date_time=$_POST['Date_time'];
	   $Address=$_POST['Address'];
	   $Message=$_POST['Message'];
	   $sql2="insert into order_table set Name='$Name',Mobile_number='$Mobile_number', Food_menu='$Food_menu',
	   Additional_food='$Additional_food',How_much='$How_much', Date_time='$Date_time',Address='$Address',Message='$Message'
	   ";
	   $res2=mysqli_query($conn,$sql2);
   }
?>

</section>

<!-- order section ends -->
<?php  include('Admin/partial/front-footer.php');  ?>

<!-- loader part  -->
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
	   