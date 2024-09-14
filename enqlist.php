<?php
$host = "localhost";
$userName = "u249004694_letsconnect";
$password = "Letsconnect*32";
$dbName = "u249004694_letsconnect_db";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    $sql="SELECT * FROM enquiry ORDER BY id DESC";
    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }else
    {
        foreach($result as $row) {
            echo '<pre>';
            print_r($row);
            // do something with each row
        }
    }
}

?>
