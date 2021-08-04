<?php

include('header.php');
include('db.php');

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

var wheat = 0.1195;
var rice = 1.2213;
var basmati = 1.5154;
var pulses = 0.3068;
var potato = 0.0249;
var cauliflower = 0.0282;
var brinjal = 0.0311;
var oilseed = 0.4225;
var poultry = 0.8465;
var mutton = 12.062;
var egg = 0.5884;
var milk = 0.7292;
var banana = 0.0716;
var apple = 0.3314;
var spices = 0.845;
var fish = 0.7183;
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
   <h1 class="display-5">Scope 3</h1>
</div>


<div>
    <div class="pl-5 pr-5 pt-3 page-header text-center">
        <h2>Current Readings</h2>
        <hr>
    </div>
</div>



<div>
    <div class="pl-5 pr-5 page-header text-center">
        <h2>Add Details</h2>
        <hr>
    </div>
</div>

<div class="bs-example shadow  bg-white rounded mb-5 mr-5 ml-5 mt-3">
    <div class="accordion" id="accordionExample">
        <!--2 wheelers --> 
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>  Two Wheelers</button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="3twowheelerdata.php">
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
                                    <input id="datedate" name="datedate"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname" name="authname"  placeholder="Authority Name" class="form-control" type="text" required >
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
                    <form method="get" action="3threewheelerdata.php">
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
                                    <input id="datadate1" name="datadate1"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname1" name="authname1"  placeholder="Authority Name" class="form-control" type="text" required >
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
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
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
                    <form method="get" action="3freightvehicledata.php">
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
                                    <input id="datadate2" name="datadate2"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname2" name="authname2"  placeholder="Authority Name" class="form-control" type="text" required>
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
                    <form method="get" action="3bustransportdata.php">
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
                    <form method="get" action="3fourwheelerdata.php">
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
                                    <input id="datadate4" name="datadate4"  placeholder="Date" class="form-control" type="month" required >
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
                    <form method="get" action="3hybridfourwheeler.php">
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
                                    <input id="datadate5" name="datadate5"  placeholder="Date" class="form-control" type="month" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname5" name="authname5"  placeholder="Authority Name" class="form-control" type="text" required>
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
        <!--Agri and Dairy Products-->
        <div class="card">
            <div class="card-header" id="headingEight">
            <h2 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight"><i class="fa fa-plus"></i>  Agriculture and Dairy</button>
            </h2>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="3agrianddairy.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category6" name="category6" onblur="setfoodemissionsfactor1()">
                                <option value="wheat">Wheat</option>
                                <option value="rice">Rice</option>
                                <option value="basmati">Rice(Basmati)</option>
                                <option value="pulses">Pulses</option>
                                <option value="potato">Potato</option>
                                <option value="cauliflower">Cauliflower</option>
                                <option value="brinjal">Brinjal</option>
                                <option value="oilseed">Oilseed</option>
                                <option value="poultry">Poultry Meat</option>
                                <option value="mutton">Mutton</option>
                                <option value="egg">Egg</option>
                                <option value="milk">Milk & Milk Products</option>
                                <option value="banana">Banana</option>
                                <option value="apple">Apple</option>
                                <option value="spices">Spices</option>
                                <option value="fish">Fish</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Useage (KGs)</label> &nbsp<input id="useage" onblur = "setfoodemissions()" name="useage" placeholder="Use (KGs)" class="form-control" type="number" step="0.01">
                        </div>
                        
                        <div class="form-group">
                            <label>Emissions Factor</label> &nbsp <input id="foodemissionsfactor" name="foodemissionsfactor"  placeholder="Emissions Factor" class="form-control" type="number" step="0.01"readonly >
                        </div>
                        
                        <div class="form-group">
                            <label>Emissions (kg Co2)</label> &nbsp <input id="foodemissions" name="foodemissions"  placeholder="Emissions (kg Co2)" class="form-control" type="number" step="0.01"readonly >
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
                                    <input id="authname6" name="authname6"  placeholder="Authority Name" class="form-control" type="text" required >
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
                           
                            
                            function setfoodemissionsfactor1(){
                                //alert("hello");
                                var e = document.getElementById("category6");
                                alert(e.options[e.selectedIndex].value);
                                var food = e.options[e.selectedIndex].value;
                                if(food == "wheat")
                                {
                                    document.getElementById("foodemissionsfactor").value = wheat.toFixed(2);
                                }
                                if(food == "rice")
                                {
                                    document.getElementById("foodemissionsfactor").value = rice.toFixed(2);
                                }
                                if(food == "basmati")
                                {
                                    document.getElementById("foodemissionsfactor").value = basmati.toFixed(2);
                                }
                                if(food == "pulses")
                                {
                                    document.getElementById("foodemissionsfactor").value = pulses.toFixed(2);
                                }
                                if(food == "potato")
                                {
                                    document.getElementById("foodemissionsfactor").value = potato.toFixed(2);
                                }
                                if(food == "cauliflower")
                                {
                                    document.getElementById("foodemissionsfactor").value = cauliflower.toFixed(2);
                                }
                                if(food == "brinjal")
                                {
                                    document.getElementById("foodemissionsfactor").value = brinjal.toFixed(2);
                                }
                                if(food == "oilseed")
                                {
                                    document.getElementById("foodemissionsfactor").value = oilseed.toFixed(2);
                                }
                                if(food == "poultry")
                                {
                                    document.getElementById("foodemissionsfactor").value = poultry.toFixed(2);
                                }
                                if(food == "mutton")
                                {
                                    document.getElementById("foodemissionsfactor").value = mutton.toFixed(2);
                                }
                                if(food == "egg")
                                {
                                    document.getElementById("foodemissionsfactor").value = egg.toFixed(2);
                                }
                                if(food == "milk")
                                {
                                    document.getElementById("foodemissionsfactor").value = milk.toFixed(2);
                                }
                                if(food == "banana")
                                {
                                    document.getElementById("foodemissionsfactor").value = banana.toFixed(2);
                                }
                                if(food == "apple")
                                {
                                    document.getElementById("foodemissionsfactor").value = apple.toFixed(2);
                                }
                                if(food == "spices")
                                {
                                    document.getElementById("foodemissionsfactor").value = spices.toFixed(2);
                                }
                                if(food == "fish")
                                {
                                    document.getElementById("foodemissionsfactor").value = fish.toFixed(2);
                                }
                            }
                            function setfoodemissions(){
                                 var foodemissionfactor = parseFloat(document.getElementById('foodemissionsfactor').value)
                                 var useage = parseFloat(document.getElementById('useage').value)
                                 document.getElementById("foodemissions").value = (foodemissionfactor*useage).toFixed(2);  
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
        <!--Shared Transport-->
        <div class="card">
            <div class="card-header" id="headingNine">
            <h2 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine"><i class="fa fa-plus"></i>  Shared Transport</button>
            </h2>
            </div>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="3sharedtransport.php">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category7" name="category7" >
                                <option value="twowheeler">Two wheeler</option>
                                <option value="threewheeler">Three Wheeler</option>
                                <option value="fourwheeler">Four Wheeler</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused7" name="fuelused7" onBlur="setemissionfactor7()">
                                <option value="petrol">Petrol</option>
                                <option value="ev">Electric</option>
                                <option value="diesel">Diesel</option>
                                <option value="cng">CNG</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Fuel Efficiency(Mileage) (km/lit)</label> &nbsp <input id="mileage7" name="mileage7" placeholder="Fuel Efficiency(Mileage) km per lit." class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled7"  name="distancetravelled7" placeholder="Distance Travelled in Kms."  class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor7" name="emissionfactor7"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <div class="form-group">
                            <label>Total Travellers</label> &nbsp <input id="totaltravellers7" name="totaltravellers7" onblur="setsharedtransportemissions()" placeholder="Total Travellers" class="form-control" type="number" step="0.01"  >
                        </div>
                        <div class="form-group">
                            <label>Three Wheeler Emissions (kg Co2)</label> &nbsp <input id="sharedtransportemissions" name="sharedtransportemissions"  placeholder="Three Wheeler Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate7" name="datadate7"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname7" name="authname7"  placeholder="Authority Name" class="form-control" type="text" required >
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
                        function setemissionfactor7() {
                            var e = document.getElementById("fuelused7");
                            var fuelused = e.options[e.selectedIndex].value;
                            //alert("hello");
                            if( fuelused == "petrol")
                            {
                                document.getElementById("emissionfactor7").value = petrol.toFixed(2);
                            }
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor7").value = ev.toFixed(2);
                            }
                            if( fuelused == "diesel")
                            {
                                document.getElementById("emissionfactor7").value = diesel.toFixed(2);
                            }
                            if(fuelused == "cng")
                            {
                                document.getElementById("emissionfactor7").value = cng.toFixed(2);
                            }
                        }
                        function setsharedtransportemissions() {
                            var mileage7 = parseFloat(document.getElementById('mileage7').value)
                            var distancetravelled7 = parseFloat(document.getElementById('distancetravelled7').value)
                            var emissionfactor7 = parseFloat(document.getElementById('emissionfactor7').value)
                            var totaltravellers7 = parseFloat(document.getElementById('totaltravellers7').value)
                            document.getElementById("sharedtransportemissions").value = ((distancetravelled7/mileage7)*(emissionfactor7/totaltravellers7)).toFixed(2);
                        }
                        </script>
                    </form>
                </div>
            </div>
        </div>
        
        <!--Public Transport-->
        <div class="card">
            <div class="card-header" id="headingTen">
            <h2 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen"><i class="fa fa-plus"></i>  Public Transport</button>
            </h2>
            </div>
            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="3publictransport.php">
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <select class="form-control" id="fuelused8" name="fuelused8" onBlur="setemissionfactor8()">
                                <option value="ev">Electric</option>
                                <option value="diesel">Diesel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Emission Factor</label> &nbsp <input id="emissionfactor8" name="emissionfactor8"  placeholder="Emission Factor (kg Co2)" class="form-control" type="number" step="0.01" readonly >
                        </div>
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled8"  name="distancetravelled8" placeholder="Distance Travelled in Kms."  class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Total Travellers</label> &nbsp <input id="totaltravellers8" name="totaltravellers8"  placeholder="Total Travellers" class="form-control" type="number" step="0.01"  >
                        </div>
                        <div class="form-group">
                            <label>Total Days</label> &nbsp <input id="totaldays8" name="totaldays8" onblur="setpublictransportemissions()" placeholder="Total Travellers" class="form-control" type="number" step="0.01"  >
                        </div>
                        <div class="form-group">
                            <label>Public Transport Emissions (kg Co2)</label> &nbsp <input id="publictransportemissions" name="publictransportemissions"  placeholder="Public Transport Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate8" name="datadate8"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname8" name="authname8"  placeholder="Authority Name" class="form-control" type="text" required >
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
                        function setemissionfactor8() {
                            var e = document.getElementById("fuelused8");
                            var fuelused = e.options[e.selectedIndex].value;
                            
                            if(fuelused == "ev")
                            {
                                document.getElementById("emissionfactor8").value = ev.toFixed(2);
                            }
                            if( fuelused == "diesel")
                            {
                                document.getElementById("emissionfactor8").value = diesel.toFixed(2);
                            }
                        }
                        function setpublictransportemissions() {
                            //Used online 3 equation solver to get values for for x,y and z.
                            var x = 2.167;
                            var y = 2.598;
                            var z = -3.249;
                            var distancetravelled8 = parseFloat(document.getElementById('distancetravelled8').value)
                            var totaltravellers8 = parseFloat(document.getElementById('totaltravellers8').value)
                            var totaldays8 = parseFloat(document.getElementById('totaldays8').value)
                            document.getElementById("publictransportemissions").value = ((distancetravelled8*x)+(totaltravellers8*y)+(totaldays8*z)).toFixed(2);
                        }
                        </script>
                    </form>
                </div>
            </div>
        </div>
        <!--Air Transport-->
        <div class="card">
            <div class="card-header" id="headingEleven">
            <h2 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven"><i class="fa fa-plus"></i>  Air Transport</button>
            </h2>
            </div>
            <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="3airtransport.php">
                        <div class="form-group">
                            <label>Distance Travelled (Km)</label> &nbsp <input id="distancetravelled9"  name="distancetravelled9" placeholder="Distance Travelled in Kms."  class="form-control" type="number" step="0.01" >
                        </div>
                      
                        <div class="form-group">
                            <label>Total Travellers</label> &nbsp <input id="totaltravellers9" name="totaltravellers9"  placeholder="Total Travellers" class="form-control" type="number" step="0.01"  >
                        </div>
                        
                        <div class="form-group">
                            <label>Total Trips</label> &nbsp <input id="totaltrips9" name="totaltrips9" onblur = "setairtransportemissions()" placeholder="Total Trips" class="form-control" type="number" step="0.01"  >
                        </div>
                        
                        <div class="form-group">
                            <label>Air Transport Emissions (kg Co2)</label> &nbsp <input id="airtransportemissions" name="airtransportemissions"  placeholder="Air Transport Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate9" name="datadate9"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname9" name="authname9"  placeholder="Authority Name" class="form-control" type="text" required >
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
                        function setairtransportemissions(){
                            //Used online 3 equation solver to get values for for x,y and z.
                            var x = 0.509;
                            var y = -0.514;
                            var z = 26.1105;
                            var distancetravelled9 = parseFloat(document.getElementById('distancetravelled9').value)
                            var totaltravellers9 = parseFloat(document.getElementById('totaltravellers9').value)
                            var totaltrips9 = parseFloat(document.getElementById('totaltrips9').value)
                            document.getElementById("airtransportemissions").value = ((distancetravelled9*x)+(totaltravellers9*y)+(totaltrips9*z)).toFixed(2);
                        }
                        </script>
                    </form>
                </div>
            </div>  
        </div> 
        
        <!--Paper Products-->
        <div class="card">
            <div class="card-header" id="headingTwelve">
            <h2 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve"><i class="fa fa-plus"></i>  Paper Products</button>
            </h2>
            </div>
            <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                <div class="card-body  pb-5 pl-5 pr-5">
                    <form method="get" action="3paperproducts.php">
                        <div class="form-group">
                            <label>Paper Sheets (kg)</label> &nbsp <input id="papersheets10"  name="papersheets10" placeholder="Paper Sheets (kg)"  class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Paper Charts (kg)</label> &nbsp <input id="papercharts10"  name="papercharts10" placeholder="Paper Charts (kg)"  class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Text Books (kg)</label> &nbsp <input id="textbooks10"  name="textbooks10" placeholder="Text Books (kg)" onblur="setpaperproductemissions()" class="form-control" type="number" step="0.01" >
                        </div>
                        <div class="form-group">
                            <label>Paper Product Emissions (kg Co2)</label> &nbsp <input id="paperproductsemissions" name="paperproductsemissions"  placeholder="Paper Product Emissions (kg Co2)" class="form-control" type="number" step="0.01" readonly>
                        </div>
                        
                        <!-- Date and Name -->
                        <div class="form-group ">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label>Data Date : </label>
                                    <input id="datadate10" name="datadate10"  placeholder="Date" class="form-control" type="month" required >
                                </div>
                                <div class="col-md-4">
                                    <label>Authority Name : </label>
                                    <input id="authname10" name="authname10"  placeholder="Authority Name" class="form-control" type="text" required >
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
                        function setpaperproductemissions(){
                            alert("Hi");
                            var papersheets10 = parseFloat(document.getElementById('papersheets10').value)
                            var papercharts10 = parseFloat(document.getElementById('papercharts10').value)
                            var textbooks10 = parseFloat(document.getElementById('textbooks10').value)
                            var z = 2.5;
                            document.getElementById('paperproductsemissions').value = ((papersheets10+papercharts10+textbooks10)*z).toFixed(2); 
                        }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

