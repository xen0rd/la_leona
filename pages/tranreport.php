<?php
require('reports/fpdf.php');
require("include/conn.php");


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
		$pdf->setX(17);$pdf->Cell(0,0,'Transaction Summary',0,0,'L');
		$pdf->Ln(10);
		
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
		$query=mysql_query("select * from reports  ");

		while($row=mysql_fetch_array($query))
		{
		
		$pdf->SetFont('arial','b',9);
		$pdf->setX(17);$pdf->Cell(0,0,'Transaction Date: ',0,0,'L');
		$pdf->setX(46);$pdf->Cell(0,0,''.$row['flddate'],0,0,'L');
		$pdf->Ln(10);
		$pdf->setX(17);$pdf->Cell(0,0,'Transaction ID: ',0,0,'L'); 
		$pdf->setX(42);$pdf->Cell(0,0,''.$row['RegNo'],0,0,'L');
		$pdf->Ln(10);


		

		$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(5);
		
	
		//$pdf->Ln(10);
		$pdf->SetFont('arial','b',9);

		$pdf->setX(34);$pdf->Cell(0,0,'First Name:',0,0,'L');
		$pdf->setX(53);$pdf->Cell(0,0,''.$row['fldfname'],0,0,'L');
		$pdf->setX(107);$pdf->Cell(0,0,'Last Name:',0,0,'L');
		$pdf->setX(126);$pdf->Cell(0,0,''.$row['fldlname'],0,0,'L');
		$pdf->setX(180);$pdf->Cell(0,0,'Contact Number:',0,0,'L');
		$pdf->setX(207);$pdf->Cell(0,0,''.$row['fldcontact'],0,0,'L');
		}
		//$pdf->Ln(6.0001);
		//$pdf->setX(20);$pdf->Cell(0,0,'Liquidating',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(9);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(8);
		$pdf->setX(0);$pdf->Cell(0,0,'Checkin Date',0,0,'L');
		$pdf->setX(25);$pdf->Cell(0,0,'Checkout Date',0,0,'L');
		$pdf->setX(53);$pdf->Cell(0,0,'Stay Type',0,0,'L');
		$pdf->setX(73);$pdf->Cell(0,0,'Night of Stay',0,0,'L');
		$pdf->setX(95);$pdf->Cell(0,0,'Adult',0,0,'L');
		$pdf->setX(108);$pdf->Cell(0,0,'Children',0,0,'L');
		$pdf->setX(125);$pdf->Cell(0,0,'Cottages',0,0,'L');
		$pdf->setX(143);$pdf->Cell(0,0,'No of Cottage',0,0,'L');
		$pdf->setX(167);$pdf->Cell(0,0,'Room',0,0,'L');
		$pdf->setX(181);$pdf->Cell(0,0,'No of Room',0,0,'L');
		$pdf->setX(200);$pdf->Cell(0,0,'Payment Type',0,0,'L');
		$pdf->setX(235);$pdf->Cell(0,0,'Total',0,0,'L');
		$pdf->setX(252);$pdf->Cell(0,0,'Change:',0,0,'L');
		$pdf->Ln(16);
		$pdf->setX(251);$pdf->Cell(0,0,'Total Payment',0,0,'L');
		
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
		$query=mysql_query("select * from reports  ");

		while($row=mysql_fetch_array($query))
		{
				$pdf->Ln(-10);
				$pdf->setX(0);$pdf->Cell(0,0,''.$row['fldarrival'],0,0,'L');
				$pdf->setX(80);$pdf->Cell(0,0,''.$row['fldlname'],0,0,'L');
				$pdf->setX(134);$pdf->Cell(0,0,''.$row['fldcontact'],0,0,'L');
				$pdf->setX(184);$pdf->Cell(0,0,''.$row['fldarrival'],0,0,'L');
				$pdf->setX(232);$pdf->Cell(0,0,''.$row['flddeparture'],0,0,'L');
				$pdf->Ln(30);
				$pdf->setX(204	);$pdf->Cell(0,0,''.$row['fldnightstay'],0,0,'L');
				$pdf->setX(257);$pdf->Cell(0,0,''.$row['fldtotal'],0,0,'L');
				$pdf->Ln(6);
				$pdf->setX(258);$pdf->Cell(0,0,''.$row['fldpayment'],0,0,'L');
				$pdf->Ln(6);
				$pdf->setX(258);$pdf->Cell(0,0,'₱'.$row['fldchange'],0,0,'L');
						
		
		
		}
		$pdf->Ln(20);
		$pdf->setX(7);$pdf->Cell(0,0,' ',0,0,'C');
$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln(5);
$pdf->setX(260);$pdf->Cell(0,0,'',0,0,'L');
$pdf->Output();

		

?>