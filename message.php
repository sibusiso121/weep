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
		
		$message = $_POST['message'];
		$message = strip_tags($message);
		$message = htmlspecialchars($message);
		

		
		
		//Validate
	
		if(empty($username)){
			$error = true;
			$errorusername ='Please input username';
		}
		
		if(empty($contact)){
			$error = true;
			$errorcontact ='Please input Contact';
		}
		
		if(empty($message)){
			$error = true;
			$errormessage ='Please input message';
		}
	
		
		
		//insert data into error
		if(!$error){
			$sql = "insert message(username,contact, message)values('$username','$contact','$message')";
			if(mysqli_query($conn, $sql)){
				$successMsg = 'We have recieved your Thank you.!.';		
			}else{
				echo 'Error'.mysqli_error($conn);
			} 
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>

	<link rel="stylesheet" href="index.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="themes/app0122.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="js/jquery.mobile-1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider-21.1.5.mini.js"></script>
	<style type="text/css">
	.ui-page {
		background: transparent url(images/dotmp3.png);
		width: 100%;
		background-repeat:repeat !important;
		background-size:100% 100% !important;
	
	}
	</style>
</head>
<body>

<div data-role="page" data-position="fixed" data-theme="a">

	<div data-role="header">
		<h1><font face="ink free">Weep</font></h1>
		<a href="welcome.html"  target="welcome.html" data-rel="back" data-icon="back" data-iconpos="notext" data-transition="slidefade"></a>
		
	</div><!-- /header -->

	<div role="main" class="ui-content">
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
			
				<h3><u><font face="ink free">Message</font></u></h3>
			<div class="form-group">
				<label for="contact" class="control-label"><font face="ink free">Username:</font></label>	
				<input type="text" name="username" class="form-control" placeholder='eg Sibusiso' autocomplete="off">
				<span class="text-danger"><?php if(isset($errorusername)) echo $errorusername; ?></span>
			</div>
	
			<div class="form-group">
				<label for="contact" class="control-label"><font face="ink free">Contact:</font></label>		
				<input type="text" name="contact" class="form-control" placeholder='(012)345 6789.'autocomplete="off">
				<span class="text-danger"><?php if(isset($errorcontact)) echo $errorcontact; ?></span>
			</div>
			
			<div class="form-group">
				
				<label for="message" class="control-label"><font face="ink free">Message:</font></label>	
				
				<textarea input type="message" name="message" class="form-control" placeholder='type here?.' autocomplete="off"></textarea>
				<span class="text-danger"><?php if(isset($errormessage)) echo $errormessage; ?></span>
			</div>
			
	
			
			
			
			
			<div class="form-group">
				<center><input type="submit" name="btn-register" value="Send" class="btn btn-primary">
				<p>
	
			</div>
		</form>
	</div>
			
		<div data-role="footer" data-position="fixed" data-theme="a">
		<h4><font face="Bell MT">Copyright &copy Private App 2019.</font></h4>
	</div><!-- /footer -->	
	</div>
	
	<div data-role="page" id="concel" data-theme="a">
			<div data-role="header" data-position="fixed">
				<h3><font face="ink free">Concel</font></h3>
				<a href="index.html" data-rel="back" data-icon="back" data-iconpos="notext"></a>
			</div>
			<div data-role="content" class="ui-content">	
			
			
			</div>
			
		<div data-role="footer" data-position="fixed" data-theme="a">
		<h4><font face="Bell MT">Copyright &copy Private App 2019.</font></h4>
	</div><!-- /footer -->	
	</div>

</body>
</html>