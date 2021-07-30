<?php
include('db.php');

$datadate = $_GET['datadate10'];
$authname = $_GET['authname10'];
$papersheets = $_GET['papersheets10'];
$papercharts = $_GET['papercharts10'];
$textbooks = $_GET['textbooks10'];
$paperproductsemissions = $_GET['paperproductsemissions'];

$query = "INSERT INTO 3paperproducts (datedate,authname,papersheets,papercharts,textbooks,paperproductsemissions) values ('$datadate','$authname','$papersheets','$papercharts','$textbooks','$paperproductsemissions')";
$result = mysqli_query($db_result,$query);
?>
<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>

