<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<h1>Clients list:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT clientsID, client_name FROM project1db.clients';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cname);
while($stmt->fetch()){
	echo '<li><a href="clinfo.php?id='.$cid.'">'.$cname.'</a></li>'.PHP_EOL;
}
?>
</ul>

<form method="post" action="addclient.php">
	New Name: <input type="text" name="clname" placeholder="New Name"/>
    New address: <input type="text" name="claddress" placeholder="New adress"/>
    New nub: <input type="text" name="clnumb" placeholder="New number"/>
    New conname: <input type="text" name="clconname" placeholder="New conname"/>
    New zip: <input type="text" name="clzip" placeholder="New zip"/>
    <input type="submit" name="action" value="Add to client" />
</form>

<h2>DELETE CLIENT</h2>
 <form action="deleteclient.php" method="post">
 <select name="cid">
		<?php
		$sql = 'Select c_name, `clientsID` from clients;';
   		$stmt = $link->prepare($sql);
    	$stmt->execute();
    	$stmt->bind_result($clname, $cid);
    while ($stmt->fetch()){
   echo '<option value="'.$cid.'" placeholder="Zip">'.$clname.'</option>'.PHP_EOL;
	}
 ?>
 <input type="submit" value="Delete">
 </select>
 </form>

</body>
</html>