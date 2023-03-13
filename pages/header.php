<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lobster"
    />
    <link rel="stylesheet" href="/salad-bar/css/header.css" type="text/css" />
    <link rel="stylesheet" href="/salad-bar/css/footer.css" type="text/css" />
    <link rel="stylesheet" href="/salad-bar/css/home.css" type="text/css" />
    <title>Salad Bar</title>
    <link rel="icon" type="image/x-icon" href="/salad-bar/media/image/leaf.png" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="/salad-bar/index.php"
          >Salad Bar <i class="fa fa-leaf"></i
        ></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav"> 
            <li class="nav-item">
              <a class="nav-link" href="/salad-bar/pages/salads.php">Salads</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/salad-bar/pages/smoothies.php">Smoothies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/salad-bar/pages/soups.php">Soups</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/salad-bar/pages/aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/salad-bar/pages/contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <?php if (isset($_SESSION["id"])) {
                echo '
              <div class="dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">' .
                  $_SESSION["firstname"] .
                  ' <i class="fa fa-user"></i></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/salad-bar/pages/data.php">Data</a></li>
                  <li><a class="dropdown-item" href="/salad-bar/pages/orders.php">Orders</a></li>
                  <li><a class="dropdown-item" href="/salad-bar/pages/basket.php">Basket <i class="fa fa-shopping-basket"></i></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/salad-bar/operations/logout.php">Log Out</a></li>
                </ul>
              </div>';
              } else {
                echo '<a class="nav-link" href="/salad-bar/pages//loginSignup.php">Log In <i class="fa fa-user"></i></a>';
              } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>
