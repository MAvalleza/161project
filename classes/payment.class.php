<?php

  class Payment {
    var $dormerID;
    var $firstName;
    var $lastName;
    var $paymentStatus;
    var $paymentAmount;
    private $result;

    function  __construct($result) {
      $this->dormerID = '';
      $this->firstName = '';
      $this->lastName = '';
      $this->paymentStatus = '';
      $this->paymentAmount = 0;

      $mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM payments") or die($mysqli->error);
      
      $this->retrieveDormerDetails($result);
    }

    function retrieveDormerDetails($result){
      while ($row = $result->fetch_assoc()) {
        $this->dormerID = $row["dormerID"]; 
        $this->firstName = $row["firstName"];
        $this->lastName = $row["lastName"];
        $this->paymentStatus = $row["paymentStatus"];
        $this->paymentAmount = $row["paymentAmount"];
      }
    }
  }

?>