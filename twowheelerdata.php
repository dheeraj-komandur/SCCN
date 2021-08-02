<?php
include('db.php');

$datadate2 = $_GET['datadate2'];
$authname2 = $_GET['authname2'];
$category = $_GET['category'];
$fuelused = $_GET['fuelused'];
$mileage = $_GET['mileage'];
$distancetravelled = $_GET['distancetravelled'];
$emissionfactor = $_GET['emissionfactor'];
$twowheeleremissions = $_GET['twowheeleremissions'];


$query = "INSERT INTO stwowheeler (datadate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,twowheeleremissions) values ('$datadate2','$authname2','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$twowheeleremissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope1.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope1.php";
  }

</script>

