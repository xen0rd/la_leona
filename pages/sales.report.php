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
		$pdf->setX(17);$pdf->Cell(0,0,'Sales Report',0,0,'L');
		$pdf->Ln(10);
		
		
		

		//$pdf->Ln(6.0001);
		//$pdf->setX(20);$pdf->Cell(0,0,'Liquidating',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(9);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(8);
		$pdf->SetFont('arial','b',10);

		$pdf->setX(0);$pdf->Cell(0,0,'Transaction ID',0,0,'L');
		$pdf->setX(45);$pdf->Cell(0,0,'Customer',0,0,'L');
		$pdf->setX(95);$pdf->Cell(0,0,'Date',0,0,'L');
		$pdf->setX(125);$pdf->Cell(0,0,'Amount',0,0,'L');
	
		$pdf->Ln(12);
		
		$db = mysql_connect('localhost', 'root','');
		$datein=$_GET['datein'];
		$dateout=$_GET['dateout'];

		mysql_select_db('dbresort');
		$query=mysql_query("SELECT DISTINCT trxnid from tblpayments WHERE date_>='$datein' AND date_<'$dateout' AND payment_status='checkedout'");

		while($row=mysql_fetch_array($query))
		{
				$pdf->Ln(5);
				$pdf->setX(0);$pdf->Cell(0,0,''.$row['trxnid'],0,0,'L');
		}
		
		mysql_select_db('dbresort');
		$query=mysql_query("SELECT  fullname, date_, totamt from tblpayments WHERE date_>='$datein' AND date_<'$dateout' AND payment_status='checkedout'");

		while($row=mysql_fetch_array($query))
		{
								$pdf->Ln(3);

				$pdf->setX(45);$pdf->Cell(0,0,''.$row['fullname'],0,0,'L');
				$pdf->setX(95);$pdf->Cell(0,0,''.$row['date_'],0,0,'L');
				$pdf->setX(125);$pdf->Cell(0,0,''.$row['totamt'],0,0,'L');
			
		
		
		}
		$pdf->Ln(20);
		$pdf->setX(7);$pdf->Cell(0,0,' ',0,0,'C');
$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln(5);
$pdf->setX(260);$pdf->Cell(0,0,'',0,0,'L');
$pdf->Output();

		

?>