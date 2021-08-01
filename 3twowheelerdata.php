<?php
include('db.php');

$datedate = $_GET['datedate'];
$authname = $_GET['authname'];
$category = $_GET['category'];
$fuelused = $_GET['fuelused'];
$mileage = $_GET['mileage'];
$distancetravelled = $_GET['distancetravelled'];
$emissionfactor = $_GET['emissionfactor'];
$twowheeleremissions = $_GET['twowheeleremissions'];



$query = "INSERT INTO 3twowheeler (datedate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,twowheeleremissions) values ('$datedate','$authname','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$twowheeleremissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>

