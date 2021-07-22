<?php
include('db.php');

$datadate5 = $_GET['datadate5'];
$authname5 = $_GET['authname5'];
$category = $_GET['category3'];
$fuelused = $_GET['fuelused3'];
$mileage = $_GET['mileage3'];
$distancetravelled = $_GET['distancetravelled3'];
$emissionfactor = $_GET['emissionfactor3'];
$bustransportemissions = $_GET['bustransportemissions'];


$query = "INSERT INTO sbustransport (datadate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,bustransportemissions) values ('$datadate5','$authname5','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$bustransportemissions')";
$result = mysqli_query($db_result,$query);
?>

<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope1.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope1.php";
  }

</script>
