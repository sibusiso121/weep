<?php
	include_once('dbcon.php');
	
	$error = false;
	if(isset($_POST['btn-register'])){
		
		//Prevent SQL Injection
		
		$username = $_POST['username'];
		$username = strip_tags($username);
		$username = htmlspecialchars($username);
		
		$contact = $_POST['contact'];
		$contact = strip_tags($contact);
		$contact = htmlspecialchars($contact);
		
		$address = $_POST['address'];
		$address = strip_tags($address);
		$address = htmlspecialchars($address);
		
		$menu = $_POST['menu'];
		$menu = strip_tags($menu);
		$menu = htmlspecialchars($menu);
		
		$price = $_POST['price'];
		$price = strip_tags($price);
		$price = htmlspecialchars($price);
		
		
		//Validate
	
		if(empty($username)){
			$error = true;
			$errorusername ='Please input username';
		}
		
		if(empty($contact)){
			$error = true;
			$errorcontact ='Please input Contact';
		}
		
		if(empty($address)){
			$error = true;
			$erroraddress ='Please input Address';
		}
		
		if(empty($menu)){
			$error = true;
			$errormenu ='Please input Menu';
		}
		
		if(empty($price)){
			$error = true;
			$errorprice ='Please input price';
		}
		
		
		
		//insert data into error
		if(!$error){
			$sql = "insert clients(username,contact, address, menu,price)values('$username','$contact','$address','$menu','$price')";
			if(mysqli_query($conn, $sql)){
				$successMsg = 'Your order was successfully submited. will deliver  in 15minute Thank you!.';		
			}else{
				echo 'Error'.mysqli_error($conn);
			} 
		}
	}
?>

<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nkanyey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Bootstrap DateTimePicker -->
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">



	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">Nkanyey<em></em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="index.html" class="btn btn-primary">Back</a></li><br>

					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_3.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">

					<div class="row row-mt-15em">
						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
						
							<h1 class="cursive-font">Customers Order?</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 animate-box">
		
					</header>
		<form method="post" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
			
			
				<?php  
					if(isset($successMsg)){
						?>
							<div="alert alert-success">
								<span class="glyphicon glyphicon-info-sign"></span>
									<?php echo $successMsg; ?>
							</div>
						<?php
					}
				
				?>
				<hr>
				<hr>
				<div class="gtco-contact-info">
						<h3><u>Contact Information</u></h3>
						<ul>
							<li class="address">52 Titinyane<br> Sun Valley </li>
							<li class="phone"><a href="tel://1234567920">071 234 567 8910</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">nkanyeny@gmail.com</a></li>
							<li class="url"><a href="http://FreeHTML5.co">www.nkanyenyfood.co.za</a></li>
						</ul>
					</div>
				<h3><u>Customers Order</u></h3>
				<div class="form-group">
				<label for="contact" class="control-label">Username:</label>	
				<input type="text" name="username" class="form-control" placeholder='eg Sibusiso' autocomplete="off">
				<span class="text-danger"><?php if(isset($errorusername)) echo $errorusername; ?></span>
			</div>
			
			

			
			<div class="form-group">
				<label for="contact" class="control-label">Contact:</label>		
				<input type="text" name="contact" class="form-control" placeholder='(012)345 6789.'autocomplete="off">
				<span class="text-danger"><?php if(isset($errorcontact)) echo $errorcontact; ?></span>
			</div>
			
			<div class="form-group">
				
				<label for="address" class="control-label">Address:</label>	
				
				<textarea input type="adress" name="address" class="form-control" placeholder='Where are you?.' autocomplete="off"></textarea>
				<span class="text-danger"><?php if(isset($erroraddress)) echo $erroraddress; ?></span>
			</div>
			
			<div class="form-group">
				<label  for="menu" class="control-label">Menu:</label>	
					<select input type="menu" name="menu" id="activities" class="form-control" autocomplete="off">
						<option value=""></option>								
						<option value="all in one combo">All in one combo (R20.00)</option>
						<option value="lamp ribs">Lamp Ribs (R50.00)</option>
						<option value="cow ribs">Cow Ribs (R65.00)</option>
						<option value="Wors & salad">Wors & Salad(R45.00)</option>
						<option value="steak & salad">Steak & Salad(R45.00)</option>
						<option value="chips small">Chips Small (R20.00) </option>
						<option value="chips medium">Chips Medium (R35.00)</option>
						<option value="chips larger">Chips Large (R40.00)</option>
						<option value="mini combo">Mini Combo (R18.50)</option>
						<option value="cheese burger">	Cheese Burger(R30.00)</option>
						<option value="mini combo">2nd Mini Combo (R12.00)</option>
					</select>
														
			
				<span class="text-danger"><?php if(isset($errormenu)) echo $errormenu; ?></span>
			</div>

			<div class="form-group">
				<label for="price" class="control-label">Price:</label>		
				<input type="text" name="price" class="form-control" placeholder='How much you have?.'autocomplete="off">
				<span class="text-danger"><?php if(isset($errorprice)) echo $errorprice; ?></span>
			</div>
			
			
			
			
			<div class="form-group">
				<center><input type="submit" name="btn-register" value="Send" class="btn btn-primary">
				<p>
	
			</div>
		</form>
	</div>	
					

				</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">

				<div class="col-md-12 text-center">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> 071 345 6789</a></li>
					
					
						</ul>
					</div>
					<div class="gtco-widget">
						<h3>Get Social</h3>
						<ul class="gtco-social-icons">
						
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							
						</ul>
					</div>
				</div>

				<div class="col-md-12 text-center copyright">
					<p><small class="block">&copy; 2019. All Rights Reserved.</small> 
					
				</div>

			</div>


		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>


	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

