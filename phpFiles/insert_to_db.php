<?php
        include_once('db.php');
        
        
    header('Content-type: application/json');

$server = "localhost";
$username = "root";
$password = "password";
$database = 'bev_soft';

$date = new DateTime("now");
$date = $date->format('Y-m-d');


$name = $_POST['name'];
$brand_id = $_POST['brand_id'];
$type = $_POST['type'];
$price = $_POST['price'];

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);

 $query = "INSERT INTO beverages (name, brand_id, create_date, modify_date, type_id, price) VALUES('" . $name . "', " .$brand_id .", '{$date}', '{$date}', {$type}, {$price})";

// var_dump($query);exit;


if(mysql_query($query))
         echo "Successfully Inserted";
        else
        echo "Insertion Failed";


mysql_close($con); 

// echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';
?>