<?php
include '../loginSystem/partials/_dbconnect.php';
session_start();
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../loginSystem/partials/_dbconnect.php';
    $password = md5($_POST["password"]);
    $username = $_SESSION['username'];
    $sql = "select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        if($_SESSION['update']==true){
         $_SESSION['message'] = "update=ture";
        header("location: appoEdit.php");
        
        //exit;
        }
        elseif($_SESSION['update']==false){
            $_SESSION['message'] = "update=false";
            header("location: appoDelete.php");
            //exit;
        }
        
    } else {
        $showError = "Incorrect Password";
    }
    echo 'wrong';
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

    <title>Authentication</title>
</head>

<body>
    <?php require '../loginSystem/partials/_nav.php';
    $username = $_SESSION['username']; ?>
    <?php
    if ($showError) {
        echo '<div class="alert alert-warning alert-danger" role="alert">
      <strong>Error!</strong>' . $showError . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    ?>
    <div class="container my-4">
        <h1 class="text-center">Authentication</h1>
    </div>
    <br>
    <br>
    <br>
    <center>
        <form action="/project/users/authentication.php" method="post">
            <div class="form-group col-md-6">
                <b><label for="text">Confirm Password of <?php echo $username; ?></label></b><br><br>
                <input type="password" class="form-control" id="password" name="password">
            </div><?php $page=true;?>
            <button type="submit" class="btn btn-primary">Login</button><br><br>
    </center>
    <?php
    require '../loginSystem/partials/_footer.php';
    ?>
</body>

</html>