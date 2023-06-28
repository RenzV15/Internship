<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNo = $_POST['phoneNo'];
$gender = $_POST['gender'];
$maritalStatus = $_POST['maritalStatus'];
$address = $_POST['address'];

$conn = new mysqli('localhost','root','','form');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, phoneNo, gender, maritalStatus, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $firstName, $lastName, $phoneNo, $gender, $maritalStatus, $address);
    $stmt->execute();
    echo "Registration Successful";
    $stmt->close();
    $conn->close();
}
?>
