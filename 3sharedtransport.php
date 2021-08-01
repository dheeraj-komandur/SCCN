<?php
include('db.php');

$datadate = $_GET['datadate7'];
$authname = $_GET['authname7'];
$category = $_GET['category7'];
$fuelused = $_GET['fuelused7'];
$mileage = $_GET['mileage7'];
$distancetravelled = $_GET['distancetravelled7'];
$totaltravellers = $_GET['totaltravellers7'];
$emissionfactor = $_GET['emissionfactor7'];
$sharedtransportemissions = $_GET['sharedtransportemissions'];


$query = "INSERT INTO 3sharedtransport (datedate,authname,category,fuelused,mileage,distancetravelled,totaltravellers,emissionfactor,sharedtransportemissions) values ('$datadate','$authname','$category','$fuelused','$mileage','$distancetravelled','$totaltravellers','$emissionfactor','$sharedtransportemissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>

