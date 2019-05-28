<?Php

$mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));

if (isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $getCreds = $mysqli->query("SELECT * FROM accounts WHERE username='$username' ");
  $row = $getCreds->fetch_assoc();
  $getUser = $row['username'];
  $getPassword = $row['pwd'];

  if($getUser==$username && $getPassword==$password){
    header('location: home.php');
  }
  else {
    header('location: index.php?loginerror='. 'Incorrect credentials');
  }
}
?>