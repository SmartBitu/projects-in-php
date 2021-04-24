<?php
include '../loginSystem/partials/_dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: ../loginSystem/login.php");
  //exit;
}
include "../_logic.php"
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Appoiment <?php echo $_SESSION['username'] ?></title>
</head>

<body>
  <?php require '../loginSystem/partials/_nav.php' ?>
  <div class="container my-4">
    <h1 class="text-center" style="color:blue;"><i>Now you can Edit Appoinment</i></h1>
  </div>
  <br>
  <br>
  <br>
  <?php
  if (isset($_GET['action'])) {
    switch ($_GET["action"]) {
      case "edit":
        $aid = $_GET['aid'];
        $query = "SELECT * FROM `appoinment` WHERE `sno`='$aid'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) > 0) {
          while ($row = mysqli_fetch_array($results)) {
  ?>
            <center>
              <form class="form-group col-md-6" action="appodetailsUser.php" method="post">
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $row['name'] ; ?>">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Mobile Number" name="phone" value="<?php echo $row['phone'] ; ?>">
                  </div>
                </div>
                <br><br>
                <center><b>SERVICES INTERSTED</b></center>
                <br><br>
                <div class="row">
                  <div class="col">
                    <input class="form-check-input" type="checkbox" name="service[]" id="inlineCheckbox1" value="CutAndBlowDry">
                    <label class="form-check-label" for="inlineCheckbox1">Cut and Blow Dry</label>
                  </div>
                  <div class="col">
                    <input class="form-check-input" type="checkbox" name="service[]" id="inlineCheckbox2" value="WashAndBlowDry">
                    <label class="form-check-label" for="inlineCheckbox2">Wash and Blow Dry</label>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col">
                    <input class="form-check-input" type="checkbox" name="service[]" id="inlineCheckbox3" value="Color">
                    <label class="form-check-label" for="inlineCheckbox3">Color</label>
                  </div>
                  <div class="col">
                    <input class="form-check-input" type="checkbox" name="service[]" id="inlineCheckbox4" value="Makeup">
                    <label class="form-check-label" for="inlineCheckbox4">Make up</label>
                  </div>
                </div>
                <br><br>
                <div class="row">
                  <div class="col ">
                  </div>
                  <div class="col ">
                    <label for="appoinmentdate">APPOINMENT DATE:</label>
                    <input type="date" id="appodate" name="appodate" value="<?php echo $row['appodate'] ; ?>">
                  </div>
                  <div class="col">
                    <label for="appoinmenttime">APPOINMENT TIME:</label>
                    <input type="time" id="appotime" name="appotime" value="<?php echo $row['appotime'] ; ?>">
                  </div>
                  <div class="col ">
                  </div>
                </div>
                <br>
                <textarea id="msg" rows="4" cols="50" name="msg" placeholder="Your Massage"></textarea>
                <br>
                <label for="place">HAIR CUT PLACE :-- </label>
                <input type="radio" id="place" name="place" value="home">
                <label for="home">AT YOUR HOME</label>
                <input type="radio" id="place" name="place" value="store">
                <label for="store">STORE</label><br>
                <input type="hidden" name="sno" value="<?php echo $row['sno'] ; ?>">

                </br>
                <button type="submit" style="background-color: #4CAF50;" name="updateA" class="btn btn-primary">Update appoinment</button>

              </form>
            </center>
  <?php }
        }else{
          echo "<label>Something wents wrong</label>";
        }
    }
  } ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  <?php
  require '../loginSystem/partials/_footer.php';
  ?>
</body>

</html>