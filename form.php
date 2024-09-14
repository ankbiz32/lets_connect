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

if((isset($_POST['your_name'])&& $_POST['your_name'] !='') )
{
    echo "name_required";
}
else if((isset($_POST['your_email'])&& $_POST['your_email'] !=''))
{
    echo "email_required";
}
else
{

    $yourName = $conn->real_escape_string($_POST['name']);
    $yourEmail = $conn->real_escape_string($_POST['email']);
    $comments = $conn->real_escape_string($_POST['comments']);
    
    $msg = "New enquiry received- \n Name: $yourName \n Email: $yourEmail \n Comments: $comments";
    mail("ankur.agr32@gmail.com","Enquiry - Letsconnect.gq",$msg);

    $sql="INSERT INTO enquiry (name, email, phone, comments) VALUES ('".$yourName."','".$yourEmail."', ' ', '".$comments."')";
    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }else
    {
        echo "sent";
    }
}

?>
