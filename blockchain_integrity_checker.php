<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Blockchain Integrity Checker</title>
</head>
<body>
<hr>
    <div class="d-flex justify-content-center">
    <h1>Blockchain Integrity Checker v1.0</h1>
    </div>
<hr>
<div class="d-flex justify-content-center">
<h2>Click the button below to check integrity</h2>
    </div>
<hr>
<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary btn-lg" style="height:75px;">Check Blockchain Integrity</button>
    </div>
<hr>
<div class="container">
  <h2>Blockchain Status:</h2>
  <p>Any message about the current state of the blockchain is going to present itself below:</p>
  <div id="test"><p>Hello</p></div>
  <div  class="alert alert-success display-5">
    <strong><div id="success"></div></strong><a href="blockchain_integrity_checker.php" class="alert-link">Click here to try again</a>.
  </div>
  <div  class="alert alert-danger display-5">
    <strong id="danger"><div id="danger"></div></strong><a href="blockchain_integrity_checker.php" class="alert-link">Click here to try again</a>.
  </div>
</div>
<hr>
<div class="d-flex justify-content-center">
<a href="index.php"><button type="button" class="btn btn-secondary btn-lg" style="height:75px;">Click to go back to home</button></a>
</div>
<script>
    $(document).ready(function() {
        $(".alert-success").hide();
        $(".alert-danger").hide();
});
$("button").click(function(){
  

$.ajax({url: "integrity_check.php", success: function(result){
    var string = result;
    var message = result.split(/(\s+)/);

    $("#success").append(string);
    $("#danger").append(string);
    if(message[0]=="SUCCESS!"){
        $(".alert-success").show();

    }else{$(".alert-danger").show();}

  }});
});


</script>
</body>
</html>