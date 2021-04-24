<?php
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
  <title>Abhi's Admin</title>
</head>

<body>
  <?php require '../loginSystem/partials/_nav.php';?>
  <?php require 'adminParti/_navAdmin.php';?>
  <div class="container my-4">
    <h1 class="text-center" style="color:blue;"><i>Appoinment Details</i></h1>
  </div>
  <form action="/project/admin/appodetails.php" method="post">
    <p>&nbsp;Limit for Showing Data, latest <input type="number" id="number" name="number">&nbsp;<button type="submit" class="btn btn-primary">Find</button></p>

  </form>
  <table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">S. No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Service</th>
          <th scope="col">Appoinment Date</th>
          <th scope="col">Appoinment Time</th>
          <th scope="col">Message</th>
          <th scope="col">Date of Order</th>
          <th scope="col">HairCut Place</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        //include '/adminParti/_fetchdata.php';
        ?>
        <?php
        $limitfetch = false;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          require '../loginSystem/partials/_dbconnect.php';
          $number = $_POST["number"];
          
          if (!empty($number)){
            $limitfetch = true;
            $sql = "select sno, name, email, phone, service, appodate, appotime, msg, dateoforder, place from appoinment ORDER BY sno DESC LIMIT $number";
            $result = $conn->query($sql);
            //$num = mysqli_num_rows($result);
            if (!empty($result) && $result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["sno"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["service"] . "</td><td>" . $row["appodate"] . "</td><td>" . $row["appotime"] . "</td><td>" . $row["msg"] . "</td><td>" . $row["dateoforder"] . "</td><td>" . $row["place"] . "</td><tr>";
              }
              echo "</tbody>";
            } else {
              echo "0 result found";
            }
          }
        }
        else{
        require '../loginSystem/partials/_dbconnect.php';
        $sql = 'select sno, name, email, phone, service, appodate, appotime, msg, dateoforder, place from appoinment';
        $result = $conn->query($sql);
        //$num = mysqli_num_rows($result);
        if (!empty($result) && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["sno"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["service"] . "</td><td>" . $row["appodate"] . "</td><td>" . $row["appotime"] . "</td><td>" . $row["msg"] . "</td><td>" . $row["dateoforder"] . "</td><td>" . $row["place"] . "</td><td>";
          }
          echo "</tbody>";
        } else {
          echo "0 result found";
        }
      }

        $conn->close();
        ?>


    </table>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>