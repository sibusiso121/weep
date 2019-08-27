<?php
	function fetch_data()
	{
		$output ='';
		$conn = mysqli_connect("localhost","root","","customers");
		$sql = "SELECT * FROM clients ORDER BY id ASC";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result))
		{
			$output.='<tr>
			
						<td>'.$row['id'].'</td>
						<td>'.$row['username'].'</td>
						<td>'.$row['contact'].'</td>
						<td>'.$row['address'].'</td>
						<td>'.$row['menu'].'</td>
						<td>'.$row['price'].'</td>
						<td>'.$row['date'].'</td>
					</tr>
					';
		}
		return $output;
	}
	
	if(isset($_POST['create_pdf'])){
		
		require_once('tcpdf/tcpdf.php');
		//crete new PDF DOCUMENT
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		//Defines the creator of the a pdf name of app
		$obj_pdf->SetCreator(PDF_CREATOR);
		//Define Title Document
		$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in php");
		$obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf->SetMargins (PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
		$obj_pdf->SetPrintHeader(false);
		$obj_pdf->SetPrintFooter(false);
		$obj_pdf->SetAutoPageBreak(TRUE,10);		
		$obj_pdf->SetFont('helvetica','',12);
		$obj_pdf->addPage();

		// print a line of text
		$text = '<u><b>Proof of Customers Purchasing & Delivery</b></u><br><br><br><br />';
		$obj_pdf->writeHTML($text, true, 0, true, 0);
		
		
		// set JPEG quality
		$obj_pdf->setJPEGQuality(100);

		// Image method signature:
		// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Example of Image from data stream ('PHP rules')
		$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');
		
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// Stretching, position and alignment example

		$obj_pdf->SetXY(15, 39);
		
		$content ='';
		$content .='
		<h4 align="center"><u>Daily Customers Orders</u></h4>
		<table border="1" cellspacing="0" cellpadding="3">

			<tr>
				<th width="5%">id</th>
				<th width="16%">username</th>
				<th width="16%">contact</th>
				<th width="16%">address</th>
				<th width="16%">menu</th>
				<th width="16%">price</th>
				<th width="16%">date</th>
			</tr>
		
		';
		$content.= fetch_data();
		$content.='</table>';
		$obj_pdf->writeHTML($content);
		$obj_pdf->Output('Client Order.pdf', 'I');
	}
	
?>

<td></td>
						
	<!DOCTYPE html>
<html>
<head>
	<title>Weep</title>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spirit8 - Digital Agency One Page Template</title>
    <meta name="description" content="Spirit8 is a Digital agency one page template built based on bootstrap framework. This template is design by Robert Berki and coded by Jenn Pereira. It is simple, mobile responsive, perfect for portfolio and agency websites. Get this for free exclusively at ThemeForces.com">
    <meta name="keywords" content="bootstrap theme, portfolio template, digital agency, onepage, mobile responsive, spirit8, free website, free theme, themeforces themes, themeforces wordpress themes, themeforces bootstrap theme">
    <meta name="author" content="ThemeForces.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

	<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
	<style>
    .google-maps {
        position: relative;
        padding-bottom: 75%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>
</head>
<body>

<div data-role="page"  data-theme="a">

<nav id="footer">
        <div class="container">
		
            <div class="pull-center fnav">
             
				
				<form method="POST">
					
					<a href="welcome.html" target="_welcome.html" class="btn btn-danger">back</a>
					<a href="message_clients.php" target="_message_clients.php" class="btn btn-danger"> inbox</a>	
					<input type="submit" name="create_pdf" class="btn btn-danger" value="Save Customers"/>	
				</form>	

            </div>
          
        </div>
    </nav>
	
</head>
<body>

</table>
	<div role="main" class="ui-content">

	<div style="overflow-x:auto;">

	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								
								 <thead>
                                        <tr>
                                           <tr>
										   <th width="5%"><center><font face="ink free"><u>ID</font></u></th>
												<th width="16%"><font face="ink free"><u>Customer/Name#</font></u></th>	
												<th width="16%"><font face="ink free"><u>Contact</font></u></th>
												<th width="16%"><font face="ink free"><u>Address</font></u></th>
												<th width="16"><font face="ink free"><u>Menu</font></u></th>
										<th width="16"><font face="ink free"><u>Price</font></u></th>
										<th width="16"><font face="ink free"><u>date</font></u></th>
										
											</tr>
										</tr>	
											<?php
												echo fetch_data();
											
											?>
											
                                    </thead>
									<center><p><u><h4>Search Address</u></h4></p></center>
							<div class="google-maps">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21882.270221660765!2d28.344269926222285!3d-25.709227308291858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9558c1f6a5bb69%3A0x831017ba520c79a!2sMamelodi%2C+Pretoria%2C+0122!5e1!3m2!1sen!2sza!4v1564832805925!5m2!1sen!2sza" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>	
						</table>
		
						<hr>
	



</div>



	</div><!-- /content -->
<nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p>All Rights Reserved Copyright Weep 2019.</p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
       
                    
                </ul>
            </div>
        </div>
    </nav>
	    
</div><!-- /page -->

</body>
</html>						
