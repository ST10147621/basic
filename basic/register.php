<?php 
 include "menu.php";

?>
 <style>
  
        .login-container {
            width: 1000%;
            max-width: 900px;
            display: flex;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-left: 15%;
            margin-right: 15%;
        }
        .social-login {
            width: 40%;
            background-color: #f1f1f1;
            padding: 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .social-login h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .social-login button {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .social-login button.google {
            background-color: #DB4437;
        }
        .social-login button.twitter {
            background-color: #1DA1F2;
        }
        .social-login i {
            margin-right: 10px;
        }
        .login-form {
            width: 60%;
            padding: 40px;
            display: flex;
            flex-direction: column;
        }
        .login-form h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }
        .login-form label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .login-form input {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
        }
        .login-form .forgot-password {
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            display: block;
            text-align: right;
        }
        .login-form .btn {
            padding: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-bottom: 20px;
        }
        .login-form .signup-link {
            text-align: center;
            font-size: 14px;
            color: #333;
        }
        .login-form .signup-link a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>


<div class="login-container" style="border:none;box-shadow:none">
    <!-- Social Media Login Section -->
    <div class="social-login" style="background-color: white;">
        <h2>Login with</h2>
        <button>
            <i class="fab fa-facebook-f"></i> Facebook
        </button>
        <button class="google">
            <i class="fab fa-google"></i> Google
        </button>
        <button class="twitter">
            <i class="fab fa-twitter"></i> Twitter
        </button>
    </div>

    <!-- Login Form Section -->
    <div class="login-form">
        <h1>
            <img src="images/logo11.png" height="30" width="40" alt="Logo" style="vertical-align: middle; margin-right: 10px;">
         <br> Register  
        </h1>
<!-- Signup Form -->
<form action="signup.php" method="post" style="text-align: start;gap:10px">
    <div class="row">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Name" required>
        </div>

        <div class="form-group"  style="margin-left:5px">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label for="calls">phone number</label>
            <input type="text" name="calls" placeholder="Enter phone Number" required>
        </div>

        <div class="form-group" style="margin-left:5px">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Password" required>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn-submit">Sign Up</button>
    </div>
</form>
        <!-- Signup Link -->
        <div class="signup-link">
            <p>Have an account? <a href="login">Login</a></p>
        </div>


    </div>
</div>

<!-- Font Awesome Icons (for social buttons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>