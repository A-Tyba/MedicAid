<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Testing Center - MedicAid</title>
</head>
<body>
<div class="d-flex justify-content-center">
<div style="
  width: 55%;
  border-style: solid;
  border-width: 1px;
  display: inline-block;" >
<form action="" method="post" style="background-color:#D4F1F4;">
    <hr>
    <div class="d-flex justify-content-center">
        <h1>Testing Center</h1>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Testing Center Name: </label>
        <input type="text" class="form-control" id="testing_center_name" name="testing_center_name" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter name of testing center</div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address: </label>
        <textarea class="form-control" id="testing_center_address" name="testing_center_address" rows="6" cols="50" aria-describedby="emailHelp"></textarea>
        </textarea>
        <div id="emailHelp" class="form-text">Enter location of testing center</div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
    <h3>Availability</h3>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Start Date: </label>
        <input type="date" id="testing_center_start_date" name="testing_center_start_date" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter when testing starts</div>
        </div>
    </div>
    <br><br><br>
    <div class="d-flex justify-content-center">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter End Date: </label>
        <input type="date" id="testing_center_end_date" name="testing_center_end_date" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter when testing ends</div>
        </div>
    </div>
    <br><br><br>
    <div class="d-flex justify-content-center">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Timing From: </label>
        <input type="time" id="testing_center_start_time" name="testing_center_start_time" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter the start time</div>
        </div>
    </div>
    <br><br>
    <div class="d-flex justify-content-center">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Timing To: </label>
        <input type="time" id="testing_center_end_time" name="testing_center_end_time" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter the end time</div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <button type="button" id="ADD" name="ADD" class="btn btn-success btn-lg" style="margin-right:10px; height:75px;">ADD</button>
        <button type="button" id="UPDATE" name="UPDATE" class="btn btn-primary btn-lg" style="margin-right:10px;">UPDATE</button>
        <button type="button" id="REMOVE" name="REMOVE" class="btn btn-danger btn-lg" style="margin-right:10px;">REMOVE</button>
</div>
<hr>
</form>
</div>
</div>
<script>
    
$("#ADD").click(function() {


var mode = "ADD";
var testing_center_name = $("#testing_center_name").val();
var testing_center_address = $("#testing_center_address").val();
var testing_center_start_date = $("#testing_center_start_date").val();
var testing_center_end_date = $("#testing_center_end_date").val();
var testing_center_start_time = $("#testing_center_start_time").val();
var testing_center_end_time = $("#testing_center_end_time").val();



event.preventDefault();



$.post("testing_center_setter.php",


{
    mode: mode,
    testing_center_name: testing_center_name,
    testing_center_address: testing_center_address,
    testing_center_start_date: testing_center_start_date,
    testing_center_end_date: testing_center_end_date,
    testing_center_start_time: testing_center_start_time,
    testing_center_end_time: testing_center_end_time

},



function received(data){


  alert(data);


  return false;


});


});

  
$("#UPDATE").click(function() {


var mode = "UPDATE";
var testing_center_name = $("#testing_center_name").val();
var testing_center_address = $("#testing_center_address").val();
var testing_center_start_date = $("#testing_center_start_date").val();
var testing_center_end_date = $("#testing_center_end_date").val();
var testing_center_start_time = $("#testing_center_start_time").val();
var testing_center_end_time = $("#testing_center_end_time").val();



event.preventDefault();



$.post("testing_center_setter.php",


{
    mode: mode,
    testing_center_name: testing_center_name,
    testing_center_address: testing_center_address,
    testing_center_start_date: testing_center_start_date,
    testing_center_end_date: testing_center_end_date,
    testing_center_start_time: testing_center_start_time,
    testing_center_end_time: testing_center_end_time

},



function received(data){


  alert(data);


  return false;


});


});

  
$("#REMOVE").click(function() {


var mode = "REMOVE";
var testing_center_name = $("#testing_center_name").val();
var testing_center_address = $("#testing_center_address").val();
var testing_center_start_date = $("#testing_center_start_date").val();
var testing_center_end_date = $("#testing_center_end_date").val();
var testing_center_start_time = $("#testing_center_start_time").val();
var testing_center_end_time = $("#testing_center_end_time").val();



event.preventDefault();



$.post("testing_center_setter.php",


{
    mode: mode,
    testing_center_name: testing_center_name,
    testing_center_address: testing_center_address,
    testing_center_start_date: testing_center_start_date,
    testing_center_end_date: testing_center_end_date,
    testing_center_start_time: testing_center_start_time,
    testing_center_end_time: testing_center_end_time

},



function received(data){


  alert(data);


  return false;


});


});

</script>


</body>
</html>