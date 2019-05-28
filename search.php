<?php 
  $mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM dormers") or die($mysqli->error);

  $query = $_GET['query'];
  $row = '';
  $query = htmlspecialchars($query);
  $min_length = 1;
  if(strlen($query) >= $min_length){
    $result = $mysqli->query("SELECT * FROM dormers
          WHERE (`dormerID` LIKE '%".$query."%')") or die(mysql_error());
    
    $search = true; 
    $row = $result->fetch_assoc();
    $url = "profile.php";
    header("location: ".$url ."?view=".$row['dormerID']);
  }
  function pre_r( $array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }
?>