<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $mobileno = $_POST["mobileno"];
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $cpassword = md5($_POST["cpassword"]);
  // check whather username or mobile no exist;
  $exists=false;
  $existSql="SELECT * FROM `users` WHERE `username` = '$username'";
  
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows ( $result );
  if($numExistRows > 0){
      $exists=true;
      $showError=" Username already Exist. Try another one!!";
  }
  else{
    $exists=false;
  if(($password == $cpassword) && $exists == false ){
    $sql = "INSERT INTO `users` ( `name`, `lastname`, `mobileno`, `username`, `password`, `dateofenter`) VALUES ('$firstname', '$lastname', '$mobileno', '$username', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result){
      $showAlert =true;
      header("location: login.php");
    }
    else{
      echo "Something went's wrong";
    }
  }
  else{
    $showError = "Password do not match";
    }
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

    <title>Signup</title>
  </head>
  <body>
  <?php require 'partials/_nav.php' ?>
  <?php
  if($showAlert){
    echo '<div class="alert alert-warning alert-success" role="alert">
    <strong>Success</strong> your account is created successfully!!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
    if($showError){
      echo '<div class="alert alert-warning alert-danger" role="alert">
      <strong>Error!</strong>'.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
  ?>
  <div class ="container my-4">
    <h1 class = "text-center">Signup to our website</h1>
  </div>
  <br> 
  <br>
  <br><center>
  <form action="/project/loginSystem/signup.php" method="post">
  <div class="form-group col-md-6">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name" name="firstname">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name" name="lastname">
    </div></div>
 </div>
  <div class="form-group col-md-6">
    <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Mobile number" maxlength="10">
  </div>
  <div class="form-group col-md-6">
    <label for="username">Username</label>
    <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group col-md-6">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <br>
    <button type="submit" class="btn btn-primary">Signup</button></div><p>Account Already is exists <a href="signup.php">click here</a></p>
 </form></center>
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
    require 'partials/_footer.php';
    ?>
  </body>
</html>