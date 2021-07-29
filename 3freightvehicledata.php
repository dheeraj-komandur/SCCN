<?php
include('db.php');

$datadate = $_GET['datadate2'];
$authname = $_GET['authname2'];
$category = $_GET['category2'];
$fuelused = $_GET['fuelused2'];
$mileage = $_GET['mileage2'];
$distancetravelled = $_GET['distancetravelled2'];
$emissionfactor = $_GET['emissionfactor2'];
$freightvehicleemissions = $_GET['freightvehicleemissions'];


$query = "INSERT INTO 3freightvehicle (datedate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,freightvehicleemissions) values ('$datadate','$authname','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$freightvehicleemissions')";
$result = mysqli_query($db_result,$query);
?>

<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>
