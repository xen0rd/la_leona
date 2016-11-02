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
		if(isset($_GET['id'] ))
		{
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
		$email=$_GET["email"];
		$name=$_GET["name"];
				$total=$_GET["total"];
				$totals=$_GET["totals"];



		$queryy=mysql_query("SELECT * FROM tblregister where fldemail='$email'");


		while($row=mysql_fetch_array($queryy))
		{
		$pdf->Image("logo-trans.jpg",5,15,60);
		$pdf->Ln(35);
		$pdf->SetFont('arial','b',12);
		$pdf->setX(17);$pdf->Cell(0,0,'Guest Name:',0,0,'L');
		$pdf->setX(57);$pdf->Cell(0,0,$_GET['name'],0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(17);$pdf->Cell(0,0,'Address:',0,0,'L');
		$pdf->setX(57);$pdf->Cell(0,0,$row['fldaddress'],0,0,'L');
		
		
		
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
				$trxnid=$_GET["id"];

		$query=mysql_query("SELECT * FROM tblpayments where trxnid=$trxnid");
		
		while($row=mysql_fetch_array($query))
		{
		$pdf->setX(220);$pdf->Cell(0,0,'Invoice Number:',0,0,'L');
		$pdf->setX(255);$pdf->Cell(0,0,$row['ornum'],0,0,'L');

		}
		
			
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
				$trxnid=$_GET["id"];

		$query=mysql_query("SELECT * FROM tblreservations where trxnid=$trxnid");
		
		while($row=mysql_fetch_array($query))
		{
		$pdf->Ln(5);
		$pdf->setX(17);$pdf->Cell(0,0,'Checked in Date:',0,0,'L');
		$pdf->setX(57);$pdf->Cell(0,0,$row['cin'],0,0,'L');

		$pdf->Ln(5);
		$pdf->setX(17);$pdf->Cell(0,0,'Checked out Date:',0,0,'L');
		$pdf->setX(57);$pdf->Cell(0,0,$row['cout'],0,0,'L');

		$pdf->Ln(5);
		
		}
		

		$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(5);
		
	
		//$pdf->Ln(10);
		$pdf->SetFont('arial','b',9);

		}
		//$pdf->Ln(6.0001);
		//$pdf->setX(20);$pdf->Cell(0,0,'Liquidating',0,0,'L');
		$pdf->Ln(5);
	
		$pdf->setX(20);$pdf->Cell(0,0,'Date',0,0,'L');
		
		$pdf->setX(65);$pdf->Cell(0,0,'Description',0,0,'L');
		$pdf->setX(165	);$pdf->Cell(0,0,'Quantity',0,0,'L');

		$pdf->setX(200);$pdf->Cell(0,0,'Amount',0,0,'L');
		$pdf->setX(235);$pdf->Cell(0,0,'Total',0,0,'L');
	
			$pdf->setX(9);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(5);
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');

		$query=mysql_query("SELECT * FROM tblreservations where trxnid=$trxnid");
		
		while($row=mysql_fetch_array($query))
		{
		
		$pdf->Ln(10);
		$pdf->setX(10);$pdf->Cell(0,0,$vd,0,0,'L');
		$pdf->setX(60);$pdf->Cell(0,0,''.$row['facname'],0,0,'L');
		$pdf->setX(170);$pdf->Cell(0,0,1,0,0,'L');
		$pdf->setX(200);$pdf->Cell(0,0,''.$row['rate'],0,0,'L');
		
		
		
	

		$pdf->Ln(10);
		$pdf->setX(251);$pdf->Cell(0,0,'Total Charges: ',0,0,'L');
		$pdf->setX(277);$pdf->Cell(0,0,''.$totals,0,0,'L');

		
		}
		
		
	
	
		$pdf->Ln(5);
	
		$pdf->setX(251);$pdf->Cell(0,0,'Change: ',0,0,'L');
			$pdf->Ln(5);

		$pdf->setX(251);$pdf->Cell(0,0,'Total Payment: ',0,0,'L');
			$pdf->setX(277);$pdf->Cell(0,0,''.$total,0,0,'L');

		
		$query=mysql_query("SELECT * FROM tblpayments where trxnid=$trxnid");
		
		while($row=mysql_fetch_array($query))
		{
		
			$pdf->Ln(0);

		$pdf->setX(277);$pdf->Cell(0,0,''.$row['changes'],0,0,'L');
			$pdf->Ln(-5);

		

		

		
		
		}
		}
		
		
		
		$pdf->Ln(20);
		$pdf->setX(7);$pdf->Cell(0,0,' ',0,0,'C');
$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln(5);
$pdf->setX(260);$pdf->Cell(0,0,'',0,0,'L');
	
$pdf->Output();

		

?>