<?php
include('db.php');

$datadate4 = $_GET['datadate4'];
$authname4 = $_GET['authname4'];
$category = $_GET['category4'];
$fuelused = $_GET['fuelused4'];
$mileage = $_GET['mileage4'];
$distancetravelled = $_GET['distancetravelled4'];
$emissionfactor = $_GET['emissionfactor4'];
$fourwheeleremissions = $_GET['fourwheeleremissions'];


$query = "INSERT INTO 3fourwheeler (datedate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,fourwheeleremissions) values ('$datadate4','$authname4','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$fourwheeleremissions')";
$result = mysqli_query($db_result,$query);
?>

<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>
