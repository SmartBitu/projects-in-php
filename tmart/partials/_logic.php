<?php

if (isset($_POST['productid'])) {
    $t_id = $_POST['t_id'];
    //header("location: tshirt.php");
    //$tid= $_POST['t_id'];
    //echo $tid;
}

if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $msg = $_POST['message'];
    $email = $_POST['email'];

    $result = mysqli_query($conn, "INSERT INTO `contactus`(`c_name`, `c_email`, `c_msg`) VALUES ('$name', '$email', '$msg')");
    if ($result) {
        $_SESSION['message'] = "message saved";
        header('location: index.php');
    } else {
        $_SESSION['message'] = "Somthing wents wrong, message not saved";
    }
}



if (isset($_POST['productadd'])) {
    if (isset($_SESSION['success']) || $_SESSION['success'] != true) {
        $t_id = $_POST['t_id'];
        $tid = $_GET["tid"];
        $username = $_SESSION['username'];
        if (!empty($_POST["t_quantity"])) {
            $tcolor = $_POST["t_color"];
            $bcolor = $_POST["b_color"];
            $tlogo = $_POST["t_logo"];
            $btext = $_POST["b_text"];
            $tsize = $_POST["t_size"];
            $quantity = $_POST["t_quantity"];
            $result = mysqli_query($conn, "SELECT * FROM tshirt WHERE t_id='$tid'");
            while ($row = mysqli_fetch_array($result)) {
                $unitprice = $row["t_price"];
            }
            $totalprice = ($unitprice * $quantity);
            //echo $username , $tid, $tcolor, $bcolor, $tlogo, $btext, $tsize, $totalprice, $quantity ;
            //INSERT INTO `cart` (`username`, `t_id`, `t_color`, `b_color`, `t_logo`, `b_text`, `t_size`, `totalprice`, `quantity`, `c_id`);
            $sql = "INSERT INTO `cart` (`username`, `t_id`, `t_color`, `b_color`, `t_logo`, `b_text`, `t_size`, `totalprice`, `quantity`) VALUES ('$username', '$tid', '$tcolor', '$bcolor', '$tlogo', '$btext', '$tsize', '$totalprice', '$quantity');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "T-Shirt added to cart";
                header("location: cart.php");
            } else {
                $_SESSION['message'] = "something wents wrong, T shirt not added to cart";
            }
        } else {
            $_SESSION['message'] = "Quantity is required";
        }
    } else {
        $_SESSION['message'] = "Login required to add products";
        header("location: login.php");
    }
}





// code for if cart is empty
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "empty":
            $sql = "DELETE FROM `cart` WHERE username='" . $_SESSION['username'] . "'";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = 'Your cart is cleared';
                header("location: cart.php");
            } else {
                $_SESSION['message'] = "something wents wrong";
            }
            break;

        case "remove":
            $cid = $_GET['code'];
            $sql = "DELETE FROM `cart` WHERE `c_id`='$cid'";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = 'One item in cart is deleted';
                header("location: cart.php");
            } else {
                $_SESSION['message'] = "something wents wrong";
            }
            break;
            case "drop":
                $tid = $_GET['code'];
                $sql = "DELETE FROM `tshirt` WHERE `t_id`='$tid'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['message'] = 'One tshirt is deleted';
                    header("location: adminTOptions.php");
                } else {
                    $_SESSION['message'] = "something wents wrong";
                }
                break;
    }
}



$username = "";
$email    = "";
$errors = array();

// connect to the database


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name =  mysqli_real_escape_string($conn, $_POST['name']);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO `users`(`username`, `email`, `password`, `name`, `address`) VALUES ('$username', '$email', '$password', '$name', '$addr')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['message'] = "Registered successfull";
            header('location: login.php');
        } else {
            $_SESSION['message'] = "Something wents wrong. Registration not complete.";
        }
    }
}





if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['message'] = "Login Successfully";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}



if (isset($_POST['productsave'])) {
    $username = $_SESSION['username'];

    $sql = "UPDATE `cart` SET `status` = 'confirmed' WHERE `cart`.`username` = '$username'";
    //$sql = "INSERT INTO users ('') VALUES('" . $names_str . "','" . $users_str . "')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "Your Product on the way";
    } else
        $_SESSION['message'] = "something wents wrong";
}




if (isset($_POST['login_admin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = true;
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['message'] = "Login Successfully";
            header('location: admin.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


if (isset($_POST['reg_admin'])) {
    if (isset($_SESSION['admin']) || $_SESSION['admin'] = true) {
        // receive all input values from the form
        $name =  mysqli_real_escape_string($conn, $_POST['name']);

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The passwords do not match");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM 'admin' WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1); //encrypt the password before saving in the database

            $query = "INSERT INTO `admin`(`username`, `email`, `password`, `name`) VALUES ('$username', '$email', '$password', '$name')";
            if (mysqli_query($conn, $query)) {
                $_SESSION['message'] = "Registered successfull";
                header('location: adminlogin.php');
            } else {
                $_SESSION['message'] = "Something wents wrong. Registration not complete.";
            }
        }
    } else {
        array_push($errors, "Only Admin can add another admin");
    }
}



if (isset($_POST['t_add'])) {
    $name =  mysqli_real_escape_string($conn, $_POST['t_name']);
    $code = mysqli_real_escape_string($conn, $_POST['t_code']);
    $img =$_POST['t_img'];
    $price = mysqli_real_escape_string($conn, $_POST['t_price']);
    

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) {
        array_push($errors, "T-shirt Name is required");
    }
    if (empty($img)) {
        array_push($errors, "T-shirt Image is required");
    }
    if (empty($price)) {
        array_push($errors, "T-shirt price is required");
    }
    if (count($errors) == 0) {

        $query = "INSERT INTO `tshirt`(`t_code`, `t_name`, `t_price`, `t_img`) VALUES ('$code', '$name', '$price', '$img')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['message'] = "T-shirt is added.";
            header('location: adminTOptions.php');
        } else {
            $_SESSION['message'] = "Something wents wrong. Registration not complete.";
        }
    }
} 


if(isset($_POST['t_update'])){
    $name =  mysqli_real_escape_string($conn, $_POST['t_name']);
    $price = mysqli_real_escape_string($conn, $_POST['t_price']);
    $img =$_POST['t_img'];
    $t_id = $_POST['t_id'];
    

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) {
        array_push($errors, "T-shirt Name is required");
    }
    if (empty($img)) {
        array_push($errors, "T-shirt Image is required");
    }
    if (empty($price)) {
        array_push($errors, "T-shirt price is required");
    }
    if (count($errors) == 0) {

        $query = "UPDATE `tshirt` SET `t_name`='$name',`t_price`='$price',`t_img`='$img' where `t_id`='$t_id'";
        if (mysqli_query($conn, $query)) {
            $_SESSION['message'] = "T-shirt is Updated.";
            header('location: adminTOptions.php');
        } else {
            $_SESSION['message'] = "Something wents wrong. Registration not complete.";
        }
    }
} 

?>
