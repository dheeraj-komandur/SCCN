<?php
include('db.php');

$query1="SELECT * FROM sdieselandlpg";
$rows1 = mysqli_query($db_result,$query1);
while($row1 = mysqli_fetch_row($rows1))
{
	$diesel = $diesel + $row1[3];
}

$query2="SELECT * FROM sdieselandlpg";
$rows2 = mysqli_query($db_result,$query2);
while($row2 = mysqli_fetch_row($rows2))
{
	$lpg = $lpg + $row2[7];
}

$query3="SELECT * FROM sbustransport";
$rows3 = mysqli_query($db_result,$query3);
while($row3 = mysqli_fetch_row($rows3))
{
	$bus = $bus + $row3[8];
}

$query4="SELECT * FROM sfourwheeler";
$rows4 = mysqli_query($db_result,$query4);
while($row4 = mysqli_fetch_row($rows4))
{
	$car = $car + $row4[8];
}

$query5="SELECT * FROM stwowheeler";
$rows5 = mysqli_query($db_result,$query5);
while($row5 = mysqli_fetch_row($rows5))
{
	$two = $two + $row5[8];
}

$query6="SELECT * FROM sthreewheeler";
$rows6 = mysqli_query($db_result,$query6);
while($row6 = mysqli_fetch_row($rows6))
{
	$three = $three + $row6[8];
}

$query7="SELECT * FROM sfreightvehicle";
$rows7 = mysqli_query($db_result,$query7);
while($row7 = mysqli_fetch_row($rows7))
{
	$freight = $freight + $row7[8];
}

$query8="SELECT * FROM shybridfourwheeler";
$rows8 = mysqli_query($db_result,$query8);
while($row8 = mysqli_fetch_row($rows8))
{
	$hybrid = $hybrid + $row8[8];
}

$query9="SELECT * FROM srefrigerant";
$rows9 = mysqli_query($db_result,$query9);
while($row8 = mysqli_fetch_row($rows9))
{
	$refrigerant = $refrigerant + $row9[9];
}

$total1 = $diesel+$lpg+$bus+$car+$two+$three+$freight+$hybrid+$refrigerant;
echo $total1;
?>