<div class="fixed-top">
    <header class="topbar">
        <div class="container col-sm-11">
            <div class="row">
                <!-- social icon-->
                <div class="col-sm-12">
                <?php if (isset($_SESSION['message'])) {
                    echo '<p style="color:white;">' . $_SESSION['message'] .'</p>';
                                                unset($_SESSION['message']);
                                            } ?>
                    <ul class="social-network">
                        <li><a class="waves-effect waves-dark" href="https://www.facebook.com/akshay.bavkar.779"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
        <div class="container col-sm-11">
            <a class="navbar-brand" href="index.php" style="text-transform: uppercase;"> T-Mart.COM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/tmart/index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <?php

                        if (!isset($_SESSION['success']) || $_SESSION['success'] != true) {
                            echo '
    <a href="http://localhost/tmart/login.php">
    <button class="btn btn-warning my-sm-0" type="button"> Login </button></a>';
                        } else {
                            echo '
    <a href="http://localhost/tmart/logout.php">
    <button class="btn btn-danger my-sm-0" type="button"> logout </button></a>';
                        } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
