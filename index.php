<?php
ini_set("display_errors", true);
session_start();
include('header.php');
?>

<div>
    <div class="pl-5 pr-5 pt-3 page-header text-center">
        <h2>Carbon Emission Monitoring System</h2>
        <hr>
    </div>
</div>

<div class="container pt-4 pl-5">
    <div class="row ">
<!--Card View 1 -->
<div class="container col-xs-12 col-sm-12 col-md-4">
  <div class="card text-center shadow-lg p-1 bg-white rounded" style="width:275px">
    <img class="card-img-top p-1" src="images/scope1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h3 class="card-title text-center">Scope 1</h3>
      <h5>Direct GHG Emissions</h3>
      <p class="card-text ">Direct GHG emissions occur from sources that are owned or controlled by the company.</p>
      <a href="https://creationdevs.in/sccn/scope1.php" class="btn btn-primary  text-center">Fill Records</a>
    </div>
  </div>
  <br>
</div>  
<!--Card View 2 -->
<div class="container col-md-4 ">
  <div class="card  text-center shadow-lg  bg-white rounded" style="width:290px">
    <img class="card-img-top p-1" src="images/scope2.png" alt="Card image" style="width:95%">
    <div class="card-body">
      <h3 class="card-title text-center">Scope 2</h3>
      <h5>Electricity GHG Emissions</h3>
      <p class="card-text "> GHG emissions from the generation of purchased electricity consumed by a company.</p>
      <a href="https://creationdevs.in/sccn/scope2.php" class="btn btn-primary  text-center">Fill Records</a>
    </div>
  </div>
  <br>
</div>  
<!--Card View 3 -->
<div class="container col-md-4 ">
  <div class="card  text-center shadow-lg p-1 bg-white rounded" style="width:275px">
    <img class="card-img-top p-1" src="images/scope3.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h3 class="card-title text-center">Scope 3</h3>
      <h5>Indirect GHG Emissions</h3>
      <p class="card-text ">GHG Emissions occur from sources not owned or controlled by the company.</p>
      <a href="https://creationdevs.in/sccn/scope3.php" class="btn btn-primary  text-center">Fill Records</a>
    </div>
  </div>
  <br>
</div>  
<!--Card View End-->
</div>
</div>
<?php
include('footer.php');

?>