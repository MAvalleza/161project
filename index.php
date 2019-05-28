<?Php include_once 'inc/header.inc.php'; 
?>

        <!--start for content-->
        <div id="content">
            <div id="clear">&nbsp;</div>
            <div class="container pt-5">
                <div class="row pt-5">
                    <img src="./images/ipil-logo.jpg" height="100"
                        style=" display: block;
                        margin-left: auto;
                        margin-right: auto;">
                </div>
                <div class="row pt-5 justify-content-center">
                    <div class="cols-6">
                        <div class="card bg-dark text-center" style="min-width: 30rem;">
                            <div class="card-header text-white">Log In</div>
                            <div class="card-body bg-light ">
                                <?php require_once 'userprocess.php'; ?> 
                                <form action="userprocess.php" method="POST">
                                    <input type="hidden" name="uid">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="cols-6 offset-3">
                                                <label class="font-weight-bold">Username</label>
                                                <input type="text" name="username" class="form-control"  placeholder="Enter your username">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cols-6 offset-3">
                                                <label class="font-weight-bold">Password</label>
                                                <input type="password" name="password" class="form-control"  placeholder="Enter password ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg" name="login">LOGIN</button>
                                    </div>   
                                </form>
                                <?php 
                                    if(isset($_GET['loginerror'])){
                                        echo "<p>";
                                        echo $_GET['loginerror'];
                                        echo "</p>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));
            ?>
        <!--end for content-->
        </div>