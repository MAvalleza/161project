<?php

$update = false;
$mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));

$dormerID = '';
$firstName = '';
$lastName = '';
$studentNum = '';
$roomNum = '';
$course = '';
$contact = '';
$email = '';
$amountPaid = 0;
$permitStatus = 'N/A';
$paymentStatus = 'None';
$picture="./images/person.jpg";


if (isset($_POST['add'])){
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $studentNum = $_POST['studentNum'];
  $roomNum = $_POST['roomNum'];
  $course = $_POST['course'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];

  $getLatest = $mysqli->query("SELECT * FROM dormers ORDER BY dormerID DESC LIMIT 1");
  $row = $getLatest->fetch_assoc();
  $dormerID = $row['dormerID'] + 100;

  $mysqli->query(
    "INSERT INTO dormers (dormerID, firstName, lastName, studentNum, roomNum, course, contact, email, permitStatus, paymentStatus, picture) 
    VALUES('$dormerID', '$firstName', '$lastName', '$studentNum', '$roomNum', '$course', '$contact', '$email', '$permitStatus', '$paymentStatus', '$picture')") 
    or die($mysqli->error);
  $mysqli->query(
    "INSERT INTO payments (dormerID, firstName, lastName) 
    VALUES('$dormerID', '$firstName', '$lastName')") 
    or die($mysqli->error);
  header('location: profileList.php');
}

if (isset($_GET['delete'])){
  $dormerID = $_GET['delete'];
  $mysqli->query("DELETE FROM dormers WHERE dormerID=$dormerID") or die($mysqli->error);
  $mysqli->query("DELETE FROM payments WHERE dormerID=$dormerID") or die($mysqli->error);
  header('location: profileList.php');
}

if (isset($_GET['accept'])){
  $dormerID = $_GET['accept'];
  $permitStatus = "APPROVED";
  
  $mysqli->query("UPDATE dormers SET permitStatus='$permitStatus' WHERE dormerID=$dormerID") or die($mysqli->error);
  header('location: permits.php');
}

if (isset($_GET['deny'])){
  $dormerID = $_GET['deny'];
  $permitStatus = "N/A";
  
  $mysqli->query("UPDATE dormers SET permitStatus='$permitStatus' WHERE dormerID=$dormerID") or die($mysqli->error);
  header('location: permits.php');
}

if(isset($_POST['update'])){
  $dormerID = $_POST['dormerID'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $studentNum = $_POST['studentNum'];
  $roomNum = $_POST['roomNum'];
  $course = $_POST['course'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];

  $mysqli->query("UPDATE dormers SET firstName='$firstName', lastName='$lastName', studentNum='$studentNum',
    roomNum='$roomNum', course='$course', contact='$contact', email='$email' WHERE dormerID='$dormerID'") or 
    die($mysqli->error);
    
  header('location: profileList.php');
}

if(isset($_POST['pay'])){
  $dormerID = $_POST['dormerID'];
  $paymentStatus = $_POST['paymentStatus'];
  $amountPaid = $_POST['amountPaid'];

  $mysqli->query("UPDATE dormers SET paymentStatus='$paymentStatus' WHERE dormerID=$dormerID") or 
    die($mysqli->error);
  $mysqli->query("UPDATE payments SET paymentStatus='$paymentStatus' WHERE dormerID=$dormerID") or 
    die($mysqli->error);
  
  $getLatest = $mysqli->query("SELECT * FROM payments WHERE dormerID='$dormerID'");
  $row = $getLatest->fetch_assoc();
  $amountPaid = $row['paymentAmount'] + $amountPaid;
  $mysqli->query("UPDATE payments SET paymentAmount='$amountPaid' WHERE dormerID='$dormerID'") or
    die($mysqli->error);
  header('location: payments.php');
}

if(isset($_POST['updatePayment'])) {
  $dormerID = $_POST['dormerID'];
  $paymentStatus = $_POST['paymentStatus'];
  $paymentAmount = $_POST['paymentAmount'];

  $mysqli->query("UPDATE dormers SET paymentStatus='$paymentStatus' WHERE dormerID=$dormerID") or 
    die($mysqli->error);
  $mysqli->query("UPDATE payments SET paymentStatus='$paymentStatus' WHERE dormerID=$dormerID") or 
    die($mysqli->error);
  $mysqli->query("UPDATE payments SET paymentAmount='$paymentAmount' WHERE dormerID=$dormerID") or 
    die($mysqli->error);

  header('location: paymentsList.php');
}

?>