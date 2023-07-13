<?php



$q=$_GET["q"];



$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');

  



$sql = "SELECT * FROM listings WHERE authorized='YES'";



$all = $conn->query($sql);



$results = $all->fetch_all();





$profile_pic=[];

$category=[];

$email=[];

$symptoms=[];

$name=[];





//index 2 is Category, index 4 is symptoms and index 3 is Email



foreach ($results as $result) {


  if((stristr($result[2],$q))||(stristr($result[4],$q))){

    array_push($profile_pic, $result[5]);

    array_push($category, $result[2]);

    array_push($email, $result[3]);

    array_push($symptoms, $result[4]);

    array_push($name, $result[6]);

    

  }

  


}




$array=array("profile_pic"=>$profile_pic,"category"=>$category,"email"=>$email,"symptoms"=>$symptoms,"name"=>$name);





// print_r($array);





// print_r($array);



//output the response



echo(json_encode($array, JSON_UNESCAPED_SLASHES));



?>