<?php
require('reports/fpdf.php');
require("include/conn.php");

$datein=$_GET['datein'];
		$dateout=$_GET['dateout'];

date_default_timezone_set("Asia/Manila");
//date_default_timezone_set('Hongkong');
$vd=date("F d, Y");
$vsd1=date("F d Y");
$ved1=date("F d Y");
$time=date(" h:i:sa", strtotime("now"-16));
//echo $vd;
class PDF extends FPDF
{

	//Page header
	function Header()
	{
		
	}

	//Page footer
	function Footer()
	{
		
	}
}

		
/////////////////////////////////////////////////////////////////////////export database to pdf format

	//Instanciation of inherited class
	//Instanciation of inherited class
	$pdf=new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	// Adds image to beginning of d

		

	
		$pdf->SetFont('arial','b',11);
		$pdf->setX(250);$pdf->Cell(0,0,$vd,0,0,'L');
			$pdf->Ln(6);
		$pdf->setX(250);$pdf->Cell(0,0,$time,0,0,'L');		
		$pdf->Ln(2);	
		//Image("image name", y, x, image size);
		
		$pdf->Image("logo-trans.jpg",5,15,60);
		$pdf->Ln(35);
		$pdf->SetFont('arial','b',15);
		$pdf->setX(17);$pdf->Cell(0,0,'List of Checked-out Summary',0,0,'L');
		$pdf->Ln(10);
		
		$db = mysql_connect('localhost', 'root','');

		//$pdf->Ln(6.0001);
		//$pdf->setX(20);$pdf->Cell(0,0,'Liquidating',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(9);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(8);
				$pdf->SetFont('arial','b',10);

		$pdf->setX(0);$pdf->Cell(0,0,'Booking ID',0,0,'L');
		$pdf->setX(25);$pdf->Cell(0,0,'Booking Type',0,0,'L');
		$pdf->setX(60);$pdf->Cell(0,0,'Customer Name',0,0,'L');
		$pdf->setX(118);$pdf->Cell(0,0,'Status',0,0,'L');
		$pdf->setX(150);$pdf->Cell(0,0,'Arrival Date',0,0,'L');
		$pdf->setX(180);$pdf->Cell(0,0,'Departure Date',0,0,'L');
		
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
		$query=mysql_query("select * from tblreservations WHERE status='checkedout' AND cin>='$datein' AND cout<'$dateout'");

		while($row=mysql_fetch_array($query))
		{
				$pdf->Ln(8);
								$pdf->SetFont('arial','b',8);

				$pdf->setX(0);$pdf->Cell(0,0,''.$row['trxnid'],0,0,'L');
				$pdf->setX(25);$pdf->Cell(0,0,''.$row['facname'],0,0,'L');
				$pdf->setX(60);$pdf->Cell(0,0,''.$row['email'],0,0,'L');
				$pdf->setX(118);$pdf->Cell(0,0,''.$row['status'],0,0,'L');
				$pdf->setX(150);$pdf->Cell(0,0,''.$row['cin'],0,0,'L');
				$pdf->setX(180);$pdf->Cell(0,0,''.$row['cout'],0,0,'L');
					
		
		
		}
						$pdf->Ln(8);

		$pdf->setX(7);$pdf->Cell(0,0,' ',0,0,'C');
$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln(5);
$pdf->setX(260);$pdf->Cell(0,0,'',0,0,'L');
$pdf->Output();

		

?>