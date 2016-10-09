<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CLient info</title>
</head>

<body>
<?php
$prid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
   
?>

<!-- CLIENT DETAILS -->    
<h1>Details for project with ID <?=$prid?>:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT project_name, project_description, other_details, clients_clientsID FROM project1db.projects where projectID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $prid);
$stmt->execute();
$stmt->bind_result($prname, $prdescr, $prother, $clid);

while($stmt->fetch()){
	echo '<li>Project Name: '.$prname.'</li>';
    echo '<li>Project Description: '.$prdescr.'</li>';
    echo '<li>Other info: '.$prother.'</li>';   
	echo '<li>Client Name: '.$clid.'</li>';
}
?>
</ul>

</body>
</html>