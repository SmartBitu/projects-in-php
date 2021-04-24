<?php
include '../loginSystem/partials/_dbconnect.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: ../loginSystem/login.php");
  exit;

}

include "../_logic.php";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <!--<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">-->
  <title>Abhi's <?php echo $_SESSION['username']; ?></title>
</head>

<body>
  <?php require '../loginSystem/partials/_nav.php'; ?>
  <?php require 'userPartials/_navUser.php';
  $Email = $_SESSION['username']; ?>
  <?php if (isset($_SESSION['message'])) : ?>
    <div class="msg">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>
  <div class="container my-4">
    <h1 class="text-center" style="color:blue;"><i>Appoinment Details</i></h1>
  </div>

  <?php $results = mysqli_query($conn, "SELECT * FROM appoinment where email='$Email'"); 
  if(mysqli_num_rows($results) > 0){
  ?>

  <table class="table table-bordered">
    <thead>
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Service</th>
        <th scope="col">Appoinment Date</th>
        <th scope="col">Appoinment Time</th>
        <th scope="col">Message</th>
        <th scope="col">Date of Order</th>
        <th scope="col">HairCut Place</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>

    <?php //include 'userPartials/_fetchdataU.php';
    while ($row = mysqli_fetch_array($results)) { ?>
    <?php $appoid=$row['sno'];?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['service']; ?></td>
        <td><?php echo $row['appodate']; ?></td>
        <td><?php echo $row['appotime']; ?></td>
        <td><?php echo $row['msg']; ?></td>
        <td><?php echo $row['dateoforder']; ?></td>
        <td><?php echo $row['place']; ?></td>

        <td>
          <form method="POST" action="https://localhost/project/users/appoEdit.php?action=edit&aid=<?php echo $appoid; ?>">
         
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
          
          </form>
          
        </td>
        <td>

          <form method="POST" action="/project/?action=remove&aid=<?php echo $appoid; ?>">
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>

    <?php } ?>
  </table>
<?php }
else{
  echo '<lable style="text-align:center;"> No Appoinment found!!</label>';
} ?>

    <?php
    require '../loginSystem/partials/_footer.php';
    ?>

</html>