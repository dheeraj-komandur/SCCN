<?php
include('db.php');

$datadate = $_GET['datadate8'];
$authname = $_GET['authname8'];
$fuelused = $_GET['fuelused8'];
$distancetravelled = $_GET['distancetravelled8'];
$totaltravellers = $_GET['totaltravellers8'];
$totaldays = $_GET['totaldays8'];
$emissionfactor = $_GET['emissionfactor8'];
$publictransportemissions = $_GET['publictransportemissions'];


$query = "INSERT INTO 3publictransport (datedate,authname,fuelused,distancetravelled,totaltravellers,totaldays,emissionfactor,publictransportemissions) values ('$datadate','$authname','$fuelused','$distancetravelled','$totaltravellers','$totaldays','$emissionfactor','$publictransportemissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>

