<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$address = $_POST['address'];
$requests = $_POST['requests'];
$host = "localhost";
$dbname = "booking";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO clients (name, email, phone, date, time, address, requests)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssissss",
                       $name,
                       $email,
                       $phone,
                       $date,
                       $time,
                    $address,
                    $requests);

mysqli_stmt_execute($stmt);

echo "Booking successful. Thank you!";

?>