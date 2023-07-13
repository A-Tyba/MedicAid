<?php


session_start();

if($_POST['uname']==""||$_POST['full_name']==""||$_POST['phone_number']==""||$_POST['BMDC_number']==""||$_POST['status']==""||$_POST['accreditations']==""){
    echo "FAILED: Don't leave any field empty!";
    die();
}



if(isset($_POST['uname'])&&isset($_POST['full_name'])&&isset($_POST['phone_number'])&&isset($_POST['BMDC_number'])&&isset($_POST['status'])&&isset($_POST['accreditations'])){
    $email=$_SESSION['email'];
    $uname=$_POST['uname'];
    $full_name=$_POST['full_name'];
    $accreditations=$_POST['accreditations'];
    $phone_number=$_POST['phone_number'];
    $BMDC_number=$_POST['BMDC_number'];
    $status=$_POST['status'];
    $designation="";

//Setting Doctor Status
if($status=="YES"){
    $designation="DOCTOR";
}

$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE profiles SET uname = ? WHERE email = ?");


    $stmt->bind_param("ss", $uname, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET full_name = ? WHERE email = ?");


    $stmt->bind_param("ss", $full_name, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET phone_number = ? WHERE email = ?");


    $stmt->bind_param("ss", $phone_number, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET BMDC_number = ? WHERE email = ?");


    $stmt->bind_param("ss", $BMDC_number, $email);


    $execval = $stmt->execute();


    $stmt = $conn->prepare("UPDATE reg SET designation = ? WHERE email = ?");


    $stmt->bind_param("ss", $designation, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET designation = ? WHERE email = ?");


    $stmt->bind_param("ss", $designation, $email);


    $execval = $stmt->execute();


    $stmt = $conn->prepare("UPDATE profiles SET accreditations = ? WHERE email = ?");


    $stmt->bind_param("ss", $accreditations, $email);


    $execval = $stmt->execute();


    echo "Profile created SUCCESSFULLY!";
}
}
else{
    echo "Profile creation FAILED!";
}


?>


