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
$sql = 'SELECT client_name, client_address, zip_code, client_contact_number FROM project1db.clients where clientsID=?';

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


</body>
</html>