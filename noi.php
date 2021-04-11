<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">


<header id="fh5co-header-section" class="sticky-banner">
	<div class="container">
		<div class="nav-header">
			<a href="index.php" class="js-fh5co-nav-toggle" style="font-size: 30px; color:black;">Bagpackers</a>
			<nav id="fh5co-menu-wrap" role="navigation">
				<ul class="sf-menu" id="fh5co-primary-menu">
				
					<li class="active"><a href="index.php">Home</a></li>
					<li>
						<a href="book_hotel.php" class="fh5co-sub-ddown">Booking</a>		
				
					</li>
					<li><a href="blog.php">Blog</a></li> 
					<li><a href="contact.php">Contact</a></li>
					<?php
					
					
					if(isset($_COOKIE["visit"]))
					{
						echo '<li><a href="book_offer.php">Offers</a></li>';
						echo '<li><a href="logout.php"  class="btn">Logout</a></li>';
						if(isset($_COOKIE["name"])) {
							$show=$_COOKIE['name'];
							echo "<li><a href='profile.php' class='btn'>welcome $show</a></li>";
						  } 
					}
					else{
						echo'<li><a href="login.php" class="btn">Login</a></li>
						<li><a href="reg.php" class="btn">Register</a></li>';
					}
					?>

					
				</ul>
			</nav>
		</div>
	</div>
</header>
