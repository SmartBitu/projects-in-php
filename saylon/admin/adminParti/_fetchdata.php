<?php
$limitfetch = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include '../../loginSystem/partials/_dbconnect.php';
  $number = $_POST["number"];
  if(empty($number)){
      $limitfetch = true;
  $sql = "select sno, name, email, phone, service, appodate, appotime, msg, dateoforder, place from appoinment LIMIT '$number'";
        $result = $conn->query($sql);
        //$num = mysqli_num_rows($result);
        if (!empty($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["sno"] ."</td><td>". $row["name"] ."</td><td>". $row["email"] ."</td><td>". $row["phone"] ."</td><td>". $row["service"] ."</td><td>". $row["appodate"] ."</td><td>". $row["appotime"] ."</td><td>". $row["msg"] ."</td><td>". $row["dateoforder"] ."</td><td>". $row["place"] ."</td><td>";
            }
            echo "</tbody>";
        }
            else{
                echo "0 result found";
            }
    } 
    else {
        if($limitfetch == false){
        $sql = 'select sno, name, email, phone, service, appodate, appotime, msg, dateoforder, place from appoinment';
        $result = $conn->query($sql);
        //$num = mysqli_num_rows($result);
        if (!empty($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["sno"] ."</td><td>". $row["name"] ."</td><td>". $row["email"] ."</td><td>". $row["phone"] ."</td><td>". $row["service"] ."</td><td>". $row["appodate"] ."</td><td>". $row["appotime"] ."</td><td>". $row["msg"] ."</td><td>". $row["dateoforder"] ."</td><td>". $row["place"] ."</td><td>";
            }
            echo "</tbody>";
        }
        else{
            echo "0 result found";
        }
        } 
    }
        $conn->close();
  }  ?>