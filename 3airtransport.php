<?php
include('db.php');

$datadate = $_GET['datadate9'];
$authname = $_GET['authname9'];
$distancetravelled = $_GET['distancetravelled9'];
$totaltravellers = $_GET['totaltravellers9'];
$totaltrips = $_GET['totaltrips9'];
$airtransportemissions = $_GET['airtransportemissions'];

$query = "INSERT INTO 3airtransport (datedate,authname,distancetravelled,totaltravellers,totaltrips,airtransportemissions) values ('$datadate','$authname','$distancetravelled','$totaltravellers','$totaltrips','$airtransportemissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>

