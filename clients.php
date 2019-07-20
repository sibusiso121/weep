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
		$text = '<u><b>Head Office Pretoria</b></u><br>52 Tintinyane Street<br>Mamelodi Sun Valley<br>Pretoria<br>0122<br />';
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
		<h4 align="center"><u>Customers Orders</u></h4>
		<table border="1" cellspacing="0" cellpadding="3">

			<tr>
				<th width="5%">id</th>
				<th width="19%">username</th>
				<th width="19%">contact</th>
				<th width="19%">address</th>
				<th width="19%">menu</th>
				<th width="19%">price</th>
				<th width="19%">date</th>
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
</head>
<body>

<div data-role="page" data-position="fixed" data-theme="a">

	<div data-role="header">
		<h1><font face="ink free">Weep</font></h1>
		<a href="welcome.html" data-rel="back" data-icon="back" data-iconpos="notext" data-transition="slidefade"></a>
	</div><!-- /header -->

</head>
<body>


</table>
	<div role="main" class="ui-content">
	
	<P><font face="ink free"><u><b>Daily customer data base<u></b></font></p>
	<div style="overflow-x:auto;">

	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								
								 <thead>
                                        <tr>
                                           <tr>
										   <th width="5%"><center><font face="ink free"><u>ID</font></u></th>
												<th width="19%"><font face="ink free"><u>Customer/Name#</font></u></th>	
												<th width="19%"><font face="ink free"><u>Contact</font></u></th>
												<th width="19%"><font face="ink free"><u>Address</font></u></th>
												<th width="19"><font face="ink free"><u>Menu</font></u></th>
										<th width="19"><font face="ink free"><u>Price</font></u></th>
										<th width="19"><font face="ink free"><u>date</font></u></th>
										
											</tr>
										</tr>	
											<?php
												echo fetch_data();
											
											?>
											
                                    </thead>
								
						</table>
						<form method="POST">
        <br><b>
							<input type="submit" name="create_pdf" class="btn btn-danger" value="Save Customer"/>

</div>
	
			
	</div><!-- /content -->

	<div data-role="footer" data-position="fixed" data-theme="a">
		<h4><font face="Bell MT">Copyright &copy Private App 2019.</font></h4>
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>						
							
							
							
							