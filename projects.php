<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Project list</title>
</head>

<body>

<h1>Project list:</h1>
<ul>
<?php


require_once 'dbcon.php';
$sql = 'SELECT projectID, pr_name FROM projects';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($prid, $prname);
while($stmt->fetch()){
	echo '<li><a href="prinfo.php?id='.$prid.'">'.$prname.'</a></li>'.PHP_EOL;
}
?>
</ul>
<a href="editform.php?prid=<?=$prid?>">Edit Project</a>

</body>
</html>