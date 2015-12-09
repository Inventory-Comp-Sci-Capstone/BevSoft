<?php
header('Content-type: application/json');

$server = "localhost";
$username = "root";
$password = "password";
$database = 'bev_soft';


$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);

 

$sql = "SELECT a.beverage_id, a.price AS price, a.name AS name, a.brand_id, a.type_id, 
	a.quantity AS quantity, b.name AS brand_name, c.name AS type_name, d.name AS supplier_name
	FROM beverages a 
	INNER JOIN brands b ON b.brand_id = a.brand_id
	INNER JOIN types c ON a.type_id = c.type_id
	INNER JOIN suppliers d ON d.supplier_id=b.supplier_id
	ORDER BY a.brand_id";

$result = mysql_query($sql) or die ("Query error: " . mysql_error());

 

$records = array();

 

while($row = mysql_fetch_assoc($result)) {

    $records[] = $row;

}

 

mysql_close($con);

 

echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';
?>
