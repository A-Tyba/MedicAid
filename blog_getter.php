<?php
require 'db_config.php';

$sql11 = "SELECT * FROM blogs";

$result = $conn->query($sql11);

$blog_picture = array();
$blog_title = array();
$blog_subtitle = array();
$blog_email = array();

if ($result->num_rows > 0) {

    // output data of each row

    while ($row = $result->fetch_assoc()) {
        
            array_push($blog_picture,$row['picture']);
            array_push($blog_title, $row['title']);
            array_push($blog_subtitle, $row['subtitle']);
            array_push($blog_email,$row['email']);
        
        
    }
}

$reversed_blog_picture = array_reverse($blog_picture);
$reversed_blog_title = array_reverse($blog_title);
$reversed_blog_subtitle = array_reverse($blog_subtitle);
$reversed_blog_email = array_reverse($blog_email);

?>