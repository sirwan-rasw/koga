<?php



include "db.php";

include "fpdf.php";

$out="";

$sql="SELECT * from sales";

$res=mysqli_query($conn,$sql);

$pdf= new FPDF();

$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont("Arial");
$pdf->SetTextColor(0,0,0);
$pdf->setFillColor(0,255,0);
//width heifht txt      //0 hamw widthy page nagret 1 hamwy dagre   // center right left , backgroun color true 
//am cella tanha xana dadanet ama bo hedara zyatr 
$pdf->Cell(0,10,"کۆگای ڕاپەین");

$pdf->Cell(0,10,"txt 2 ",1,1,"C",true);


//table header 
$pdf->SetFillColor(150,150,150);
$pdf->Cell(10,10,'id',1,0,"C",true);
$pdf->Cell(20,10,'num qaima',1,0,"C",true);

$pdf->Cell(40,10,'num sharika ',1,0,"C",true);

$pdf->Cell(30,10,'price ',1,0,"C",true);
$pdf->Cell(30,10,'price draw ',1,1,"C",true);




//table body 
//rangy spy 
$pdf->SetFillColor(255,255,255);

while($row=mysqli_fetch_array($res))
{
    $pdf->Cell(10,10,"{$row['id_s']}",1,0,"C",true);
    $pdf->Cell(20,10,"{$row['id_list']}",1,0,"C",true);
    $pdf->Cell(40,10,"{$row['id_comp']}",1,0,"C",true);
    $pdf->Cell(30,10,"{$row['price']}",1,0,"C",true);
    $pdf->Cell(30,10,"{$row['price_draw']}",1,1,"C",true);

}

$pdf->output();

?>