<?php

include('header.php');
include('db.php');
$query1="SELECT * FROM sselectricity";
$rows1 = mysqli_query($db_result,$query1);
while($row1 = mysqli_fetch_row($rows1))
{
	$eleemission = $eleemission + $row1[6];
	$offsetemission = $offsetemission + $row1[7];
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
   <h1 class="display-5">Scope 2</h1>
</div>


<div>
    <div class="pl-5 pr-5 pt-3 page-header text-center">
        <h2>Current Readings</h2>
        <hr>
    </div>
</div>

<!-- Charts -->


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
  ['Electricity Emission',<?php echo $eleemission ?>],
  ['Offset Emission', <?php echo $offsetemission ?>]
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
    labels: ["Electricity Emission", "Offset Emission"],
    datasets: [{
      label: '# of Votes',
      data: [<?php echo $eleemission ?>, <?php echo $offsetemission ?>],
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


<!-- End charts -->



<div>
    <div class="pl-5 pr-5 page-header text-center">
        <h2>Add Details</h2>
        <hr>
    </div>
</div>

<div class="bs-example shadow  bg-white rounded mb-5 mr-5 ml-5 mt-3">
    <div class="accordion" id="accordionExample">
        <!--Electricity -->
        <div class="card ">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i>  Electricity</button>									
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="electricitydata.php">
                        <!-- 5 Columns -->
                        <div class="form-group">
                            <label>Electricity Purchased from Grid (kWh)</label><input type="number" id="elepurchased" onblur="setelectricityemission()" name="elepurchased"  class="form-control" placeholder="Electricity Purchased from Grid in kWh" step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>Renewable Energy Onsite (kWh)</label> &nbsp <input id="renewableenergyonsite" name="renewableenergyonsite"  placeholder="Renewable Energy Onsite in kWh" class="form-control" type="number" step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>Renewable Energy Wheeled (kWh)</label> &nbsp <input id="renewableenergywheeled" onblur="setoffsetemission()" name="renewableenergywheeled" placeholder="Renewable Energy Wheeled in kWh" class="form-control" type="number" step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>Electricity Emissions (kgCo2/kWh)</label> &nbsp <input id="eleemissions" name="eleemissions" placeholder="Electricity Emissions (kgCo2/kWh)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        
                        <div class="form-group">
                            <label>Offeset Emissions (kg Co2/kWh)</label> &nbsp <input id="offsetemissions" name="offsetemissions"  placeholder="Offeset Emissions (kg Co2/kWh)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate1" name="datadate1"  placeholder="Date" class="form-control" type="month" required>
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
                        function setelectricityemission() {
                            //alert("hello");
                            var temp = document.getElementById("elepurchased").value*0.82;
                            document.getElementById("eleemissions").value = temp.toFixed(2);;
                        }
                        function setoffsetemission() {
                            //alert("hello");
                            var onsite = parseFloat(document.getElementById('renewableenergyonsite').value)
                            var wheeled = parseFloat(document.getElementById('renewableenergywheeled').value)
                            //var addition = parsefloat(document.getElementById('lpgcooking').value+document.getElementById('lpglab').value);
                            document.getElementById("offsetemissions").value = ((onsite+wheeled)*0.82).toFixed(2);
                        }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
