<?php

$serverName = 'localhost';
$username = 'root';
$password = '';
$dbName = 'db_register';

$connection = mysqli_connect($serverName, $username, $password, $dbName);

?>

<?php 

    
function sendQuery($query){
    global $connection;
    return mysqli_query($connection, $query);
}

function fetchArray($result){
    global $connection;
    return mysqli_fetch_array($result);
}

function escape($query){
    global $connection;
    return mysqli_real_escape_string($connection, $query);
}
    
    
    


?>

