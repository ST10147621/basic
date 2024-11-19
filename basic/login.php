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
            Login
        </h1>
<form action="check.php" method="post" style="text-align: start;">
        <!-- Email Input -->
        <label for="email" >Email</label>
        <input type="text" <?php if(!empty( $_SESSION['email_'] )){ echo "value='". $_SESSION['email_'] ."'"; } ;?> placeholder="Enter Email" name="email" required>

        <!-- Password Input -->
        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <!-- Remember Me and Forgot Password -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div><?php if(!empty( $_SESSION['email_'] )){ echo "<p style='color:red'>Incorrect username or password</p>"; } $_SESSION['email_'] ="";?>

        <!-- Submit Button -->
        <button type="submit" class="btn">Login</button>

        <!-- Signup Link -->
        <div class="signup-link">
            <p>Don't have an account? <a href="register">Sign up here</a></p>
        </div>
</form>
    </div>
</div>

<!-- Font Awesome Icons (for social buttons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>