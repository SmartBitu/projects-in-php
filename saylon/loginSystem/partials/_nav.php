<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://localhost/project/index.php">Abhi's Sylon</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <?php if($sessionStart=false){

      }
      if($sessionStart=true){ ?>
        <li class="nav-item">
        <a class="nav-link" href="http://localhost/project/users/dashboard.php" tabindex="-1">Dashboard</a>
      </li>
      <?php } ?>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/project/appoiment/order.php">Place order</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/project/loginSystem/login.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          login system
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/project/loginSystem/signup.php">Signup</a>
          <a class="dropdown-item" href="/project/loginSystem/login.php">Login</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/project/store/store.php" tabindex="-1">Store</a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
