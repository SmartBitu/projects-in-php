<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '../loginSystem/partials/_dbconnect.php';
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $service = implode(", ", $_POST["service"]);
  $appodate = $_POST["appodate"];
  $appotime = $_POST["appotime"];
  $msg = $_POST["msg"];
  $place = $_POST["place"];
  $sql = "INSERT INTO `appoinment` (`name`, `email`, `phone`, `service`, `appodate`, `appotime`, `msg`, `dateoforder`, `place`) VALUES('$name', '$email', '$phone', '$service', '$appodate', '$appotime', '$msg', current_timestamp(),'$place')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $_SESSION['message'] = "Appoinment has been placed";
    header("location: ../index.php");
  } else {
    $_SESSION['message'] = "Appoinment has been not Placed";
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Appoiment</title>
</head>

<body>
  <?php require '../loginSystem/partials/_nav.php' ?>
  <div class="container my-4">
    <h1 class="text-center" style="color:blue;"><i>Book An Appoinment</i></h1>
  </div>
  <br>
  <br>
  <br>
  <center>
    <form class="form-group col-md-6" action="/project/appoiment/order.php" method="post">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="name" name="name">
        </div>
        <div class="col">
          <input type="email" class="form-control" placeholder="email" name="email" id="email">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Mobile Number" name="phone">
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
          <input type="date" id="appodate" name="appodate">
        </div>
        <div class="col">
          <label for="appoinmenttime">APPOINMENT TIME:</label>
          <input type="time" id="appotime" name="appotime">
        </div>
        <div class="col ">
        </div>
      </div>
      <br>
      <p>YOUR MASSAGE</p>
      <textarea id="msg" rows="4" cols="50" name="msg"></textarea>
      <br>
      <label for="place">HAIR CUT PLACE :-- </label>
      <input type="radio" id="place" name="place" value="home">
      <label for="home">AT YOUR HOME</label>
      <input type="radio" id="place" name="place" value="store">
      <label for="store">STORE</label><br>

      </br>
      <button type="submit" style="background-color: #4CAF50" ; class="btn btn-primary">BOOK AN APPOINMENT</button>

    </form>
  </center>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>