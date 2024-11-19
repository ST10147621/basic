<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <?php session_start(); ?>
  <link href="style.css" rel="stylesheet">
  <title>Basic Couture</title>
  <style>
    body {
      background-color: white;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .menu_php_navbar {
      background-color: white; 
      padding: 10px 20px; 
      position: fixed; 
      top: 0; 
      left: 0; 
      right: 0; 
      z-index: 1000; 
    }
    .menu_php_navdiv {
      display: flex; 
      justify-content: space-between; 
      align-items: center; 
      width: 100%;
    }
    .menu_php_logo {
      font-size: 24px; 
      font-weight: bold; 
    }
    .menu_php_ul {
      list-style: none; 
      margin: 0; 
      padding: 0; 
      display: flex; 
      gap: 20px; 
      align-items: center; 
      justify-content: center; 
      flex: 1; 
    }
    .menu_php_a {
      text-decoration: none; 
      color: black; 
      font-size: 18px; 
      transition: color 0.3s;
    }
    .menu_php_a:hover {
      color: gray;
    }
    .menu_php_user-icon {
      border-radius: 50%; 
      width: 40px; 
      height: 40px;
    }

    @media (max-width: 768px) {
      .menu_php_navdiv {
        flex-direction: column; 
        align-items: center; 
      }
      .menu_php_ul {
        flex-direction: column; 
        width: 100%; 
        padding: 0; 
        gap: 10px; 
      }
      .menu_php_li {
        text-align: center; 
      }
    }
    /* Adding margin to the body to prevent content from hiding under the fixed navbar */
    body {
      padding-top: 60px; 
    }
  </style>
</head>

<body>

<!-- Navbar -->
<div class="menu_php_navbar">
    <div class="menu_php_navdiv">
        <div class="menu_php_logo">
            <a href="#" class="menu_php_a">
                <img src="images/logo11.png" height="30" width="40" alt="Logo"> BASIC COUTURE
            </a>
        </div>
        <ul class="menu_php_ul">
            <li class="menu_php_li"><a class="menu_php_a" href="index">Home</a></li>
            <li class="menu_php_li"><a class="menu_php_a" href="shop">Shop</a></li>
            <li class="menu_php_li"><a class="menu_php_a" href="contactus">Contact Us</a></li>
            <?php if (!empty($_SESSION['login_']) && $_SESSION['role'] == "user") { ?>
                <li class="menu_php_li"><a class="menu_php_a" href="history">History</a></li>
            <?php }else if (!empty($_SESSION['login_']) && $_SESSION['role'] == "admin") { 

?>
<li class="menu_php_li"><a class="menu_php_a" href="admin">Admin</a></li>
<?php

            } ?>
        </ul>
        <div style="margin-left: auto; display: flex; align-items: center;">
            <li style="position: relative;">
                <a href="cart.php" style="font-size: 32px; color: black; position: relative;">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </li>

            <?php  if (empty($_SESSION['login_'])) { ?>
                <li>
                    <button class="show-Signup" onclick="openForms()" style="padding: 10px 15px; background-color: black; color: white; border: none; cursor: pointer;">Sign Up</button>
                </li>
                <li>
                    <button class="show-login" onclick="openForm()" style="padding: 10px 15px; background-color: black; color: white; border: none; cursor: pointer;">Login</button>
                </li>
            <?php } else { ?>
                <li>
                <li>
            <li><?php echo $_SESSION['login_'].".. "; ?></li>
            <a href="javascript:void(0);" style="text-decoration: none; display: flex; align-items: center; justify-content: center;">
                <img src="https://www.w3schools.com/w3images/avatar2.png" alt="User Icon" class="menu_php_user-icon">
            </a>
            <div class="dropdown-content" style="display: none; position: absolute; right: 0; background-color: white; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1;">
            <br><br>  
            <br><br>  
            <a href="profile.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Profile</a>
                <a href="account-settings.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Account Settings</a>
                <a href="logout.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Logout</a>
            </div>
        </li>
            <?php } ?>
        </div>
    </div>
</div>
<div style="width: 100%;height:1rem"></div>
<!-- Font Awesome Icons (CDN) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="cart.js"></script>
<script>
    function openForm() {
        window.location.href = "login";
    }
    function openForms() {
        window.location.href = "register";
    }
    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

       // Toggle dropdown visibility
       const userIcon = document.querySelector('.menu_php_user-icon').parentElement;
    const dropdown = document.querySelector('.dropdown-content');

    userIcon.addEventListener('click', function() {
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', function(event) {
        if (!userIcon.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>
