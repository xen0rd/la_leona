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

		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
		$query=mysql_query("select * from tblfoodinven");
		
		
	
		$pdf->SetFont('arial','b',11);
		$pdf->setX(250);$pdf->Cell(0,0,$vd,0,0,'L');
			$pdf->Ln(6);
		$pdf->setX(250);$pdf->Cell(0,0,$time,0,0,'L');		
		$pdf->Ln(2);
		//Image("image name", y, x, image size);
		
		$pdf->Image("logo-trans.jpg",5,15,60);
		$pdf->Ln(30);
		$pdf->SetFont('arial','b',15);
		$pdf->setX(120);$pdf->Cell(0,0,'Food Inventory Report',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(10);
		
	
		
		//$pdf->Ln(10);
		$pdf->SetFont('arial','b',9);
		$pdf->setX(0);$pdf->Cell(0,0,'Item No.',0,0,'L');
		$pdf->setX(24);$pdf->Cell(0,0,'Item Name',0,0,'L');
		$pdf->setX(124);$pdf->Cell(0,0,'Quantity',0,0,'L');
		$pdf->setX(146);$pdf->Cell(0,0,'Price',0,0,'L');
		$pdf->setX(166);$pdf->Cell(0,0,'Unit',0,0,'L');
		//$pdf->Ln(6.0001);
		//$pdf->setX(20);$pdf->Cell(0,0,'Liquidating',0,0,'L');
			$pdf->Ln(5);
		$pdf->setX(9);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		while($row=mysql_fetch_array($query))
		{
		
		
		$pdf->Ln(7);
		
		//$pdf->Image($row['picture'],9.5,8,13);
		
		
		
		$pdf->setX(5);$pdf->Cell(0,0,''.$row['flditemcode'],0,0,'L');
		$pdf->setX(24);$pdf->Cell(0,0,''.$row['flditemname'],0,0,'L');
		$pdf->setX(124);$pdf->Cell(0,0,''.$row['fldquantity'],0,0,'L');
		$pdf->setX(146);$pdf->Cell(0,0,''.$row['fldprice'],0,0,'L');
		$pdf->setX(166);$pdf->Cell(0,0,''.$row['fldunit'],0,0,'L');

		
		}
		$pdf->Ln(2);
		$pdf->setX(7);$pdf->Cell(0,0,' ',0,0,'C');
$pdf->setX(7);$pdf->Cell(0,0,'_______________________________________________________________________________________________________________________________________________________________________________________________________________',0,0,'C');
		$pdf->Ln(10);
			
			
		$db = mysql_connect('localhost', 'root','');
		mysql_select_db('dbresort');
		$query=mysql_query("select * from tblfoodinven");
		$pdf->SetFont('arial','',10);
		$pdf->setX(237);$pdf->Cell(0,0,'Total Networth:',0,0,'L');	
		$qty = 0;
		while ($num=mysql_fetch_array($query))
		{
		$qty += $num['fldprice'];
		$pdf->setX(266);$pdf->Cell(0,0,''. $qty		,0,0,'L');
		}

$pdf->Output();


			?>