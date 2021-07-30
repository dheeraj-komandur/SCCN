<?php
include('db.php');

$datadate5 = $_GET['datadate5'];
$authname5 = $_GET['authname5'];
$category = $_GET['category5'];
$fuelused = $_GET['fuelused5'];
$mileage1 = $_GET['mileage51'];
$distancetravelled1 = $_GET['distancetravelled51'];
$emissionfactor1 = $_GET['emissionfactor51'];
$mileage2 = $_GET['mileage52'];
$distancetravelled2 = $_GET['distancetravelled52'];
$emissionfactor2 = $_GET['emissionfactor52'];
$hybridfourwheeleremissions = $_GET['hybridfourwheeleremissions'];


$query = "INSERT INTO 3hybridfourwheeler (datedate,authname,category,fuelused,mileage1,distancetravelled1,emissionfactor1,mileage2,distancetravelled2,emissionfactor2,hybridfourwheeleremissions) values ('$datadate5','$authname5','$category','$fuelused','$mileage1','$distancetravelled1','$emissionfactor1','$mileage2','$distancetravelled2','$emissionfactor2','$hybridfourwheeleremissions')";
$result = mysqli_query($db_result,$query);
?>

<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>