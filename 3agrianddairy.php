<?php
include('db.php');

$datadate5 = $_GET['datadate6'];
$authname5 = $_GET['authname6'];
$category = $_GET['category6'];
$useage = $_GET['useage'];
$foodemissionsfactor = $_GET['foodemissionsfactor'];
$foodemissions = $_GET['foodemissions'];


$query = "INSERT INTO 3agrianddairy (datedate,authname,category,useage,foodemissionsfactor,foodemissions) values ('$datadate5','$authname5','$category','$useage','$foodemissionsfactor','$foodemissions')";
$result = mysqli_query($db_result,$query);
?>

<script>

  if (confirm("Form Submitted Successfully")) {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  } else {
    location.href = "https://creationdevs.in/sccn/scope3.php";
  }

</script>