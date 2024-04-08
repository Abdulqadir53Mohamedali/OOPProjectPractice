
<?php session_start()?>


<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F7E5C8;">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
    <a id="logo" class="navbar-brand mx-3" href="#" style="color:#e8611e; font-size: 24px; font-weight: 700;">LOGO</a>
      <ul class="navbar-nav align-items-center">
        <li class="nav-item">
          <a style= "color:#471F3A;font-size: 18px; font-weight: 500;"class=" mx-3 nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a  style= "color:#471F3A; font-size: 18px; font-weight: 500;"class=" mx-3 nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Discover
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">educational content</a></li>
            <li><a class="dropdown-item" href="#">attractions & facilities </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a style= "color:#471F3A; font-size: 18px; font-weight: 500;"id = "tickets" class=" mx-3 nav-link" href="#">Zoo tickets</a>
        </li>
        <li class="nav-item">
          <a style= "color:#471F3A; font-size: 18px; font-weight: 500;"id = "hotel" class=" mx-3 nav-link" href="/practice/hotelLandingPage.php">Hotel</a>
        </li>
        <li class="nav-item">
          <a style= "color:#471F3A; font-size: 18px; font-weight: 500;"id = "about us" class=" mx-3 nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a style= "color:#471F3A; font-size: 18px; font-weight: 500;"id = "lr" class=" mx-3 nav-link" href="#">Loyalty rewards</a>
        </li>
        <li class="nav-item dropdown">
        <a id="profile" class="nav-link dropdown-toggle ms-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#e8611e; font-size: 24px; font-weight: 700;">
            PROFILE
          </a>
          <ul class="dropdown-menu">
            <?php if (empty($_SESSION['user_logged_in'])){?>
              <li><a class="dropdown-item" href="/practice/register.php">Register</a></li>
              <li><a class="dropdown-item" href="/practice/login.php">Login</a></li>
            <?php } ?>

            <?php if (!empty($_SESSION['user_logged_in'])){?>
              <li><a class="dropdown-item" href="/classes/logout.php">Logout</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- 
    me auto if you wan tto move the logo to the start 
    ms auto to move profile to the end
 -->