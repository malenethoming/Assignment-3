<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CLient info</title>
</head>

<body>
<?php
$cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
    echo $cid;
?>

<!-- CLIENT DETAILS -->    
<h1>Details for client with ID <?=$cid?>:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT client_name, client_address, zip_code, client_contact_number FROM malenethoming_c.clients where clientsID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($clname, $claddress, $clzip, $clcontact);

while($stmt->fetch()){
	echo '<li>Name: '.$clname.'</li>';
    echo '<li>Address: '.$claddress.', '.$clzip.'</li>';
    echo '<li>Contact number: '.$clcontact.'</li>';   
}

?>
</ul>
<h1>Projects <?=$cid?>:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT project_name, project_description, project_stat_date, project_end_date FROM malenethoming_c. projects where projectID=?';



$stmt = $link->prepare($sql);

$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($prname, $prdescription, $prstatdate, $prenddate);

while($stmt->fetch()){
	echo '<li><a href="filmdetails.php">'.$prname.' '.$prdescription.'</a></li>';
	echo '<li>Start date'.' '.$prstatdate.'</li>'; 
	echo '<li>End date'.' ' .$prenddate.'</li>'; 
}
?>
</ul>
<h1>Resource <?=$cid?>:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT Other_resource_details, resource_name FROM malenethoming_c. resources where resourceID=?';



$stmt = $link->prepare($sql);

$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($reotherdetails, $rename);

while($stmt->fetch()){
	echo '<li><a href="filmdetails.php">'.$reotherdetails.'</a></li>';
	echo '<li>Start date'.' '.$rename.'</li>'; 
	
}
?>
</ul>

<h1>Zip code <?=$cid?>:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT zip_code FROM malenethoming_c. zip_code where clientsID=?';



$stmt = $link->prepare($sql);

$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($city);

while($stmt->fetch()){
	echo '<li><a href="filmdetails.php">'.$city.'</a></li>';
	
}
?>
</ul>

</body>
</html>