<?Php
include_once 'inc/header.inc.php';
include_once 'classes/dormer.class.php';
?>
<?Php include_once 'inc/navbar.inc.php'; ?>
  <!-- Start of content -->
  <?php $result = $mysqli->query("SELECT * FROM dormers") or die($mysqli->error); ?>
 

  <div class="container pt-5 justify-content-center">
    <h1 style="text-align: center">IPIL RESIDENCE HALL DORMERS LIST</h1>
    <br>
    <div class="row">
        <div class="cols-3">
          <form action="search.php" class="form-inline" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Dormer ID" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
        <div class="cols-3 offset-1">
          <a href="#addDormerModal"><button class="btn btn-primary addbtn">Add New Dormer</button></a>
        </div>
    </div>
    <br>
    <?php 
      if(isset($_GET['message']) && isset($_GET['search'])){
        echo "<p>";
        echo $_GET['message'];
        echo "</p>";
      }
    ?>
    <?php require_once 'dormerprocess.php'; ?>
    <table class="table table-hover text-center">
      <thead class="thead-dark">
        <tr>
          <th>Dormer ID</th>
          <th>Name</th>
          <th>Room Number</th>
          <th>Degree Program</th>
          <th colspan="3">Action</th>
        </tr>
      </thead>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row["dormerID"]; ?></td>
        <td><?php echo $row["firstName"] . ' '. $row["lastName"]; ?></td>
        <td><?php echo $row["roomNum"]; ?></td>
        <td><?php echo $row["course"]; ?></td>
        <td>
          <a href="profile.php?view=<?php echo $row["dormerID"]; ?>" class="btn btn-info">VIEW</a>
          <a href="editDormer.php?edit=<?php echo $row['dormerID'];  ?>" class="btn btn-warning font-weight-bold">EDIT</a>
          <a href="profileList.php?delete=<?php echo $row["dormerID"]; ?>" class="btn btn-danger">DELETE</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </table>

    <!--Modal -->
    <div id="addDormerModal" class="modal-window">
      
      <div class="card">
        <h1 class="card-title text-center">DORMER FORM</h1>
        <div class="card-text">
          <form action="dormerprocess.php" method="POST">
            <input type="hidden" name="dormerID" value="<?php echo $dormerID; ?>">
            <div class="form-group">
              <label class="font-weight-bold">Name</label>
              <div class="row">
                <div class="cols-12 col-md-6">
                  <!-- <label>First Name </label> -->
                  <input type="text" name="firstName" class="form-control" value="<?php echo $firstName ?>" placeholder="First Name">
                </div>
                <div class="cols-12 col-md-6">
                  <input type="text" name="lastName" class="form-control" value="<?php echo $lastName ?>" placeholder="Last Name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="cols-12 col-md-4">
                  <label class="font-weight-bold">Student Number</label>
                  <input type="text" name="studentNum" class="form-control" value="<?php echo $studentNum ?>" placeholder="Enter student number">
                </div>
                <div class="cols-12 col-md-4">
                  <label class="font-weight-bold">Degree Program</label>
                  <input type="text" name="course" class="form-control" value="<?php echo $course ?>" placeholder="Enter degree program">
                </div>
                <div class="cols-12 col-md-4">
                  <label class="font-weight-bold"l>Room Number</label>
                  <input type="text" name="roomNum" class="form-control" value="<?php echo $roomNum ?>" placeholder="Enter room number">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="cols-12 col-md-6">
                  <label class="font-weight-bold">Contact Number</label>
                  <input type="text" name="contact" class="form-control" value="<?php echo $contact ?>" placeholder="Enter contact number">
                </div>
                <div class="cols-12 col-md-6">
                  <label class="font-weight-bold">Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Enter email">
                </div>
              </div>
            </div>
            <div class="form-group">
              <!-- <button type="submit" class="btn btn-info" name="update">UPDATE</button> -->
              <button type="submit" class="btn btn-primary btn-lg" name="add">ADD</button>
            </div>   
          </form>
        </div>
        <div class="row">
          <div class="cols-4">
            <a href="#modal-close" class="btn btn-danger modal-close">X</a>
          </div>
        </div>
      </div>
    </div>
   </div>


<?Php
include_once 'inc/footer.inc.php';
?>

<style>
.modal-window {
  position: fixed;
  background-color: rgba(200, 200, 200, 0.75);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 999;
  opacity: 0;
  pointer-events: none;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.modal-window:target {
  opacity: 1;
  pointer-events: auto;
}

.modal-window>div {
  width: 70%;
  position: relative;
  margin: 10% auto;
  padding: 2rem;
  background: #fff;
  color: #444;
}

.modal-window header {
  font-weight: bold;
}

.modal-close {
  color: white;
  line-height: 50px;
  font-size: 100%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
}

.modal-close:hover {
  color: #000;
}

.modal-window h1 {
  font-size: 150%;
  margin: 0 0 15px;
}
</style>