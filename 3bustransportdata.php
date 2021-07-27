<?php
include('db.php');

$datadate3= $_GET['datadate3'];
$authname3 = $_GET['authname3'];
$category = $_GET['category3'];
$fuelused = $_GET['fuelused3'];
$mileage = $_GET['mileage3'];
$distancetravelled = $_GET['distancetravelled3'];
$emissionfactor = $_GET['emissionfactor3'];
$bustransportemissions = $_GET['bustransportemissions'];


$query = "INSERT INTO 3bustransport (datedate,authname,category,fuelused,mileage,distancetravelled,emissionfactor,bustransportemissions) values ('$datadate3','$authname3','$category','$fuelused','$mileage','$distancetravelled','$emissionfactor','$bustransportemissions')";
$result = mysqli_query($db_result,$query);
?>

<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>
