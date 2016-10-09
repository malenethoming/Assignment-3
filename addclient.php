<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Add New Client</title>
    </head>

<body>

    <?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $clname = filter_input(INPUT_POST, 'client_name') or die('missing parameter name');
    $claddress = filter_input(INPUT_POST, 'client_address') or die('missing parameter address');
    $clnumb = filter_input(INPUT_POST, 'client_contact_number', FILTER_VALIDATE_INT) or die('missing parameter number');
    $clconname = filter_input(INPUT_POST, 'client_contact_name') or die('missing parameter colname');
    $clzip = filter_input(INPUT_POST, 'zip_code', FILTER_VALIDATE_INT) or die('missing parameter zip');

    require_once 'dbcon.php';
    
    echo 'Add new client';
    echo 'Name:' .$clname.', Address: ' .$claddress . ',Numb: ' . $clnumb . ', Conname: ' . $clconname . ', Zip:' .$clzip;

    $sql = 'INSERT INTO `Clients`(`Client_Name`, `Client_Address`, `Client_Contact_Number`, `Clients_Contact_Name`, `Zip_Code`) VALUES (?, ?, ?, ?, ?);';
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssisi', $clname, $claddress, $clnumb, $clconname, $clzip);
    $stmt->execute();
    
    ?>

    <p>Client added to DB</p>

<a href="client_list.php">Back to Client List</a> 



</body>
</html>