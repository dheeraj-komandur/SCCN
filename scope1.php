<?php

include('header.php');
include('db.php');

$query1="SELECT * FROM sdieselandlpg";
$rows1 = mysqli_query($db_result,$query1);
while($row1 = mysqli_fetch_row($rows1))
{
	$diesel = $diesel + $row1[3];
}

$query2="SELECT * FROM sdieselandlpg";
$rows2 = mysqli_query($db_result,$query2);
while($row2 = mysqli_fetch_row($rows2))
{
	$lpg = $lpg + $row2[7];
}

$query3="SELECT * FROM sbustransport";
$rows3 = mysqli_query($db_result,$query3);
while($row3 = mysqli_fetch_row($rows3))
{
	$bus = $bus + $row3[8];
}

$query4="SELECT * FROM sfourwheeler";
$rows4 = mysqli_query($db_result,$query4);
while($row4 = mysqli_fetch_row($rows4))
{
	$car = $car + $row4[8];
}

$query5="SELECT * FROM stwowheeler";
$rows5 = mysqli_query($db_result,$query5);
while($row5 = mysqli_fetch_row($rows5))
{
	$two = $two + $row5[8];
}

?>

<style>
    .bs-example{
        margin: 20px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
    }
</style>

<script>
var diesel = 2.6444;
var petrol = 2.27193;
var cng = 2.692;
var ev =0;
var lpg = 3.13;
var electricity = 0.82;
var bustr= 0.015161;
var airtr= 0.121;
var paper = 2.5;
var orgwasteland = 1.29;
var orgwastecomp = 0.3;
var hybrid = 0.0;

    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
    
    

</script>


<div class="jumbotron text-center" style="padding-top: 1rem; padding-bottom: 1rem;">
   <h1 class="display-5">Scope 1</h1>
</div>


<div>
    <div class="pl-5 pr-5 pt-3 page-header text-center">
        <h2>Current Readings</h2>
        <hr>
    </div>
</div>


<div class="container" >
<div class="row">
<div class ="col-xs-12 col-sm-12 col-md-6" id="piechart"></div>

<div class ="col-xs-12 col-sm-12 col-md-6"><canvas id="myChart" ></canvas></div>
</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Parameter', 'Emission'],
  ['Diesel Emission',<?php echo $diesel ?>],
  ['LPG Emission', <?php echo $lpg ?>],
  ['Two Wheeler',<?php echo $two ?>],
  ['Bus Transport', <?php echo $bus ?>],
  ['Four Wheeler', <?php echo $car ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Month of August : Scope 1', 'width':400, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Diesel", "LPG", "Two Wheeler", "Bus Transport", "Four Wheeler"],
    datasets: [{
      label: '# of Votes',
      data: [<?php echo $diesel ?>, <?php echo $lpg ?>, <?php echo $two ?>, <?php echo $bus ?>, <?php echo $car ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>

<div>
    <div class="pl-5 pr-5 page-header text-center">
        <h2>Add Details</h2>
        <hr>
    </div>
</div>

<div class="bs-example shadow  bg-white rounded mb-5 mr-5 ml-5 mt-3">
    <div class="accordion" id="accordionExample">
        <!--Diesel & LPG -->
        <div class="card ">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i>  Diesel & LPG</button>									
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="diesellpgdata.php">
                        <!-- 5 Columns -->
                        <div class="form-group">
                            <label>Diesel (Liters) </label><input type="number" id="diesel" name="diesel" onblur="setdieselemissions()"  class="form-control" placeholder="Diesel in ltrs." step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>Diesel Emissions (kg Co2)</label> &nbsp <input id="dieselemissions" name="dieselemissions"  placeholder="Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        
                        <div class="form-group">
                            <label>LPG-Cooking (kg)</label> &nbsp <input id="lpgcooking" name="lpgcooking" onblur="setlpgemissions()" placeholder="LPG-Cooking in kgs. " class="form-control" type="number" step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>LPG-Lab Activities (kg)</label> &nbsp <input id="lpglab" name="lpglab" onblur="setlpgemissions()" placeholder="LPG-Lab Activities in kgs." class="form-control" type="number" step="0.01" >
                        </div>
                        
                        <div class="form-group">
                            <label>LPG Emissions (kg Co2)</label> &nbsp <input id="lpgemissions" name="lpgemissions"  placeholder="Emissions (kg Co2)" class="form-control" type="number" step="0.01"readonly >
                        </div>
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate1" name="datadate1"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname1" name="authname1"  placeholder="Authority Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>

                        <script>
                        function setdieselemissions() {
                            //alert("hello");
                            var temp = document.getElementById("diesel").value*diesel;
                            temp = temp.toFixed(2);
                            document.getElementById("dieselemissions").value = temp;
                        }
                        function setlpgemissions() {
                            //alert("hello");
                            var lpgcook = parseFloat(document.getElementById('lpgcooking').value)
                            var lpglab = parseFloat(document.getElementById('lpglab').value)
                            //var addition = parsefloat(document.getElementById('lpgcooking').value+document.getElementById('lpglab').value);
                            document.getElementById("lpgemissions").value = ((lpgcook+lpglab)*lpg).toFixed(2);
                        }
                        </script>
                    </form>
                </div>
            </div>
        </div>
        
        <!--2 wheelers --> 
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>  Two Wheelers</button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="twowheelerdata.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category" name="category" >
                                <option value="motorcycle">Motor Cycle</option>
                                <option value="scooter">Scooter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused" name="fuelused" onBlur="setemissionfactor()">
                                <option value="petrol">Petrol</option>
                                <option value="ev">Electric</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) (km/lit)</label> &nbsp <input id="mileage" name="mileage" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled" onblur="settwowheeleremissions()" name="distancetravelled" placeholder="Distance Travelled in Kms." onblur="" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor" name="emissionfactor"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <div class="form-group">
                            <label>Two Wheeler Emissions (kg Co2)</label> &nbsp <input id="twowheeleremissions" name="twowheeleremissions"  placeholder="Two Wheeler Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate2" name="datadate2"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname2" name="authname2"  placeholder="Authority Name" class="form-control" type="text" required >
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setemissionfactor() {
                            var e = document.getElementById("fuelused");
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
                                document.getElementById("emissionfactor").value = petrol.toFixed(2);
                            }
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor").value = ev.toFixed(2);
                            }
                        }
                        function settwowheeleremissions() {
                            var mileage = parseFloat(document.getElementById('mileage').value)
                            var distancetravelled = parseFloat(document.getElementById('distancetravelled').value)
                            var emissionfactor = parseFloat(document.getElementById('emissionfactor').value)
                            document.getElementById("twowheeleremissions").value = ((distancetravelled/mileage)*emissionfactor).toFixed(2);
                        }
                        
                        function comeBack()
                        {
                            alert("hello");
                        }
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <!-- 3 wheelers-->
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i>  Three Wheelers</button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="threewheelerdata.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category1" name="category1">
                                <option value="tempo">Tempo</option>
                                <option value="auto">Auto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused1" name="fuelused1" onblur="setemissionfactor1()">
                                <option value="petrol">Petrol</option>
                                <option value="ev">Electric</option>
                                <option value="diesel">Diesel</option>
                                <option value="cng">CNG</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) (km/lit)</label> &nbsp <input id="mileage1" name="mileage1" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled1" onblur="setthreewheeleremissions1()" name="distancetravelled1" placeholder="Distance Travelled in Kms." onblur="" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor1" name="emissionfactor1"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <div class="form-group">
                            <label>Three Wheeler Emissions (kg Co2)</label> &nbsp <input id="threewheeleremissions" name="threewheeleremissions"  placeholder="Three Wheeler Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate3" name="datadate3"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname3" name="authname3"  placeholder="Authority Name" class="form-control" type="text" required >
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setemissionfactor1() {
                            var e = document.getElementById("fuelused1");
                            //alert(e.options[e.selectedIndex].value);
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
                                //alert(petrol.toFixed(2));
                                document.getElementById("emissionfactor1").value = petrol.toFixed(2);
                            }
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor1").value = ev.toFixed(2);
                            }
                            if( fuelused == "diesel")
                            {
                                document.getElementById("emissionfactor1").value = diesel.toFixed(2);
                            }
                            if(fuelused == "cng")
                            {
                                document.getElementById("emissionfactor1").value = cng.toFixed(2);
                            }
                        }
                        function setthreewheeleremissions1() {
                            var mileage1 = parseFloat(document.getElementById('mileage1').value)
                            var distancetravelled1 = parseFloat(document.getElementById('distancetravelled1').value)
                            var emissionfactor1 = parseFloat(document.getElementById('emissionfactor1').value)
                            document.getElementById("threewheeleremissions").value = ((distancetravelled1/mileage1)*emissionfactor1).toFixed(2);
                        }
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <!-- Freight Vehicles-->
        <div class="card">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"><i class="fa fa-plus"></i>  Freight Vehicles</button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="freightvehicledata.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category2" name="category2">
                                <option value="ldv">LDV</option>
                                <option value="mdv">MDV</option>
                                <option value="hdv">HDV</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused2" name="fuelused2" onblur="setemissionfactor2()">
                                <option value="petrol">Petrol</option>
                                <option value="ev">Electric</option>
                                <option value="diesel">Diesel</option>
                                <option value="cng">CNG</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) (km/lit)</label> &nbsp <input id="mileage2" name="mileage2" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled2" onblur="setfreightvehicleemissions2()" name="distancetravelled2" placeholder="Distance Travelled in Kms." onblur="" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor2" name="emissionfactor2"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        <div class="form-group">
                            <label>Freight Vehicles Emissions (kg Co2)</label> &nbsp <input id="freightvehicleemissions" name="freightvehicleemissions"  placeholder="Freight Vehicles Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate4" name="datadate4"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname4" name="authname4"  placeholder="Authority Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setemissionfactor2() {
                            var e = document.getElementById("fuelused2");
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
                                document.getElementById("emissionfactor2").value = petrol.toFixed(2);
                            }
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor2").value = ev.toFixed(2);
                            }
                            if( fuelused == "diesel")
                            {
                                document.getElementById("emissionfactor2").value = diesel.toFixed(2);
                            }
                            if(fuelused == "cng")
                            {
                                document.getElementById("emissionfactor2").value = cng.toFixed(2);
                            }
                        }
                        function setfreightvehicleemissions2() {
                            var mileage2 = parseFloat(document.getElementById('mileage2').value)
                            var distancetravelled2 = parseFloat(document.getElementById('distancetravelled2').value)
                            var emissionfactor2 = parseFloat(document.getElementById('emissionfactor2').value)
                            document.getElementById("freightvehicleemissions").value = ((distancetravelled2/mileage2)*emissionfactor2).toFixed(2);
                        }
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <!--Bus Transport -->
        <div class="card">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"><i class="fa fa-plus"></i>  Bus Transport</button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="bustransportdata.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category3" name="category3">
                                <option value="bus">BUS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused3" name="fuelused3" onblur="setemissionfactor3()">
                                <option value="petrol">Petrol</option>
                                <option value="ev">Electric</option>
                                <option value="diesel">Diesel</option>
                                <option value="cng">CNG</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) (km/lit)</label> &nbsp <input id="mileage3" name="mileage3" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled3" onblur="setbustransportemissions3()" name="distancetravelled3" placeholder="Distance Travelled in Kms." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor3" name="emissionfactor3"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <div class="form-group">
                            <label>Bus Transport Emissions (kg Co2)</label> &nbsp <input id="bustransportemissions" name="bustransportemissions"  placeholder="Bus Transport Emissions (kg Co2)" class="form-control" type="number" step="0.01"readonly >
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate5" name="datadate5"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname5" name="authname5"  placeholder="Authority Name" class="form-control" type="text" required >
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setemissionfactor3() {
                            var e = document.getElementById("fuelused3");
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
                                document.getElementById("emissionfactor3").value = petrol.toFixed(2);
                            }
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor3").value = ev.toFixed(2);
                            }
                            if( fuelused == "diesel")
                            {
                                document.getElementById("emissionfactor3").value = diesel.toFixed(2);
                            }
                            if(fuelused == "cng")
                            {
                                document.getElementById("emissionfactor3").value = cng.toFixed(2);
                            }
                        }
                        function setbustransportemissions3() {
                            var mileage3 = parseFloat(document.getElementById('mileage3').value)
                            var distancetravelled3 = parseFloat(document.getElementById('distancetravelled3').value)
                            var emissionfactor3 = parseFloat(document.getElementById('emissionfactor3').value)
                            document.getElementById("bustransportemissions").value = ((distancetravelled3/mileage3)*emissionfactor3).toFixed(2);
                        }
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <!--Non Hybrid four wheeler -->
        <div class="card">
            <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"><i class="fa fa-plus"></i>  Non-Hybrid Four Wheeler</button>
                </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="fourwheelerdata.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category4" name="category4">
                                <option value="small">Small</option>
                                <option value="hatchback">HatchBack</option>
                                <option value="prhatchback">Pr. HatchBack</option>
                                <option value="compactsuv">Compact SUV</option>
                                <option value="sedan">Sedan</option>
                                <option value="suv">SUV</option>
                                <option value="muv">MUV</option>
                                <option value="prsuv">Pr. SUV</option>
                                <option value="prsedan">Pr. Sedan</option>
                                <option value="maxivan">Maxi Van</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused4" name="fuelused4" onblur="setemissionfactor4()">
                                <option value="petrol">Petrol</option>
                                <option value="ev">Electric</option>
                                <option value="diesel">Diesel</option>
                                <option value="cng">CNG</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) (km/lit)</label> &nbsp <input id="mileage4" name="mileage4" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled4" onblur="setfourwheeleremissions4()" name="distancetravelled4" placeholder="Distance Travelled in Kms." onblur="" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor4" name="emissionfactor4"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <div class="form-group">
                            <label>Four Wheeler Emissions (kg Co2)</label> &nbsp <input id="fourwheeleremissions" name="fourwheeleremissions"  placeholder="Four Wheeler Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate6" name="datadate6"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname6" name="authname6"  placeholder="Authority Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setemissionfactor4() {
                            var e = document.getElementById("fuelused4");
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
                                document.getElementById("emissionfactor4").value = petrol.toFixed(2);
                            }
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor4").value = ev.toFixed(2);
                            }
                            if( fuelused == "diesel")
                            {
                                document.getElementById("emissionfactor4").value = diesel.toFixed(2);
                            }
                            if(fuelused == "cng")
                            {
                                document.getElementById("emissionfactor4").value = cng.toFixed(2);
                            }
                        }
                        function setfourwheeleremissions4(){
                            var mileage4 = parseFloat(document.getElementById('mileage4').value)
                            var distancetravelled4 = parseFloat(document.getElementById('distancetravelled4').value)
                            var emissionfactor4 = parseFloat(document.getElementById('emissionfactor4').value)
                            document.getElementById("fourwheeleremissions").value = ((distancetravelled4/mileage4)*emissionfactor4).toFixed(2);
                        }
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <!--Non Hybrid four wheeler (Divide by zero error)-->
        <div class="card">
            <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"><i class="fa fa-plus"></i>  Hybrid Four Wheeler</button>
                </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body pb-5 pl-5 pr-5">
                    <form method="get" action="hybridfourwheelerdata.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category5" name="category5">
                                <option value="hybrid">Hybrid</option>
                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused5" name="fuelused5" onblur="setemissionfactor51()">
                                <option value="petrolcng">Petrol + CNG</option>
                                <option value="petev">Petrol + EV</option>
                                <option value="cngev">CNG + EV</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency 1(Mileage) (km/lit)</label> &nbsp <input id="mileage51" name="mileage51" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled 1(Km)</label> &nbsp <input id="distancetravelled51" name="distancetravelled51" placeholder="Distance Travelled in Kms." onblur="" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) 2(km/lit)</label> &nbsp <input id="mileage52" name="mileage52" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled 2(Km)</label> &nbsp <input id="distancetravelled52" onblur="sethybridfourwheeleremissions52()" name="distancetravelled52" placeholder="Distance Travelled in Kms." onblur="" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor 1</label> &nbsp <input id="emissionfactor51" name="emissionfactor51"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        <div class="form-group">
                            <label>Emission Factor 2</label> &nbsp <input id="emissionfactor52" name="emissionfactor52"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        <div class="form-group">
                            <label>Hybird Four Wheeler Emissions (kg Co2)</label> &nbsp <input id="hybridfourwheeleremissions" name="hybridfourwheeleremissions"  placeholder="Hybrid Four Wheeler Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate7" name="datadate7"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname7" name="authname7"  placeholder="Authority Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setemissionfactor51() {
                            var e = document.getElementById("fuelused5");
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrolcng")
                            {
                                document.getElementById("emissionfactor51").value = petrol.toFixed(2);
                                document.getElementById("emissionfactor52").value = cng.toFixed(2);
                            }
                            if(fuelused == "petev")
                            {
                                document.getElementById("emissionfactor51").value = petrol.toFixed(2);
                                document.getElementById("emissionfactor52").value = ev.toFixed(2);
                            }
                            if( fuelused == "cngev")
                            {
                                document.getElementById("emissionfactor51").value = cng.toFixed(2);
                                document.getElementById("emissionfactor52").value = ev.toFixed(2);
                            }

                        }
                        function sethybridfourwheeleremissions52(){
                            
                            var mileage51 = parseFloat(document.getElementById('mileage51').value)
                            var distancetravelled51 = parseFloat(document.getElementById('distancetravelled51').value)
                            var emissionfactor51 = parseFloat(document.getElementById('emissionfactor51').value)
                            var mileage52 = parseFloat(document.getElementById('mileage52').value)
                            var distancetravelled52 = parseFloat(document.getElementById('distancetravelled52').value)
                            var emissionfactor52 = parseFloat(document.getElementById('emissionfactor52').value)

                            document.getElementById("hybridfourwheeleremissions").value = (((distancetravelled52/mileage52)*emissionfactor52) + ((distancetravelled51/mileage51)*emissionfactor51)).toFixed(2);
                            
                            
                        }
                        
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- Fugutive Emissions -->
        <div class="card">
            <div class="card-header" id="headingEight">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight"><i class="fa fa-plus"></i> Fugutive Emissions</button>
                </h2>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="fugutivedata.php">
                        <div class="form-group">
                            <label>Refrigerant</label> &nbsp <input id="refrigerant" name="refrigerant"  placeholder="Refrigerant" class="form-control" type="text" step="0.01">
                        </div>
                         <div class="form-group">
                            <label>GWP </label> &nbsp <input id="gwp" name="gwp"  placeholder="GWP" class="form-control" type="number" step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>Refill (kg)</label> &nbsp <input id="refill" name="refill" placeholder="Refill (kg)" class="form-control" type="number" step="0.01" >
                        </div>
                        
                        <div class="form-group">
                            <label>Full Charge (kg)</label> &nbsp <input id="fullcharge" name="fullcharge" placeholder="Full Charge (kg)" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Recovered (kg)</label> &nbsp <input id="recovered" name="recovered" onblur="setdisposalandemissions()"placeholder="Recovered (kg)" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Disposal (kg)</label> &nbsp <input id="disposal" name="disposal" placeholder="Disposal (kg)" class="form-control" type="number" step="0.01" readonly>
                        </div>

                        <div class="form-group">
                            <label>Refrigerent Emissions (kg Co2)</label> &nbsp <input id="refrigerentemissions" name="refrigerentemissions"  placeholder="Refrigerent Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate8" name="datadate8"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname8" name="authname8"  placeholder="Authority Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!--Submit Button-->
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                        
                        <script>
                        function setdisposalandemissions(){
                            var gwp = parseFloat(document.getElementById('gwp').value)
                            var refill = parseFloat(document.getElementById('refill').value)
                            var fullcharge = parseFloat(document.getElementById('fullcharge').value)
                            var recovered = parseFloat(document.getElementById('recovered').value)
                            document.getElementById("disposal").value = (fullcharge - recovered).toFixed(2);
                            document.getElementById("refrigerentemissions").value = (gwp * (refill+(fullcharge - recovered))).toFixed(2);
                        }
                        </script>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
</div>

