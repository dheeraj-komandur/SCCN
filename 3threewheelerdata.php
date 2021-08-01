<?php
include('db.php');

$datadate = $_GET['datadate1'];
$authname = $_GET['authname1'];
$category = $_GET['category1'];
$fuelused = $_GET['fuelused1'];
$mileage = $_GET['mileage1'];
$distancetravelled = $_GET['distancetravelled1'];
$emissionfactor = $_GET['emissionfactor1'];
$threewheeleremissions = $_GET['threewheeleremissions'];


$query = "INSERT INTO 3threewheeler (datedate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,threewheeleremissions) values ('$datadate','$authname','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$threewheeleremissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>

