<?php
include('db.php');

$datadate3 = $_GET['datadate3'];
$authname3 = $_GET['authname3'];
$category = $_GET['category1'];
$fuelused = $_GET['fuelused1'];
$mileage = $_GET['mileage1'];
$distancetravelled = $_GET['distancetravelled1'];
$emissionfactor = $_GET['emissionfactor1'];
$threewheeleremissions = $_GET['threewheeleremissions'];


$query = "INSERT INTO sthreewheeler (datadate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,threewheeleremissions) values ('$datadate3','$authname3','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$threewheeleremissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope1.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope1.php";
  }

</script>

