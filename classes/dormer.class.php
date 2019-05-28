<?php

  $mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM dormers") or die($mysqli->error);
  // pre_r($result->fetch_assoc());
  function pre_r( $array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }

  class Dormer {
    var $dormerID;
    var $firstName;
    var $lastName;
    var $studentNum;
    var $roomNum;
    var $course;
    var $permitStatus;
    var $paymentStatus;
    var $contact;
    var $email;

    private $result;

    function  __construct($result) {
      $this->dormerID = null;
      $this->firstName = null;
      $this->lastName = null;
      $this->studentNum = null;
      $this->roomNum = null;
      $this->course = null;
      $this->permitStatus =  null;
      $this->paymentStatus = null;
      $this->contact = null;
      $this->email =  null;

      $this->retrieveDormerDetails($result);
    }

    function retrieveDormerDetails($result){
      while ($row = $result->fetch_assoc()) {
        $this->dormerID = $row["dormerID"]; 
        $this->firstName = $row["firstName"];
        $this->lastName = $row["lastName"];
        $this->studentNum = $row["studentNum"];
        $this->roomNum = $row["roomNum"];
        $this->course = $row["course"];
        $this->permitStatus = $row["permitStatus"];
        $this->paymentStatus = $row["paymentStatus"];
        $this->contact = $row["contact"];
        $this->email = $row["email"];
      }
    }
  }

?>