<?php

include "menu.php";



if(isset($_POST['stores'])){

    include "conn.php";

$name =    $_POST['name'];
$email = $_POST['email'];
$message =$_POST['message'];


$query="insert into messages values(null,'$name','$email','$message')";

mysqli_query($conn,$query);

echo "<script>window.location.href='contactus.php';</script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: white;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 36px;
        }

        .contact {
            background-color: #fff;
            padding: 40px;
            width: 80%;
            margin: 0 auto;
            border-radius: 8px;
          
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        /* Contact Form on the left */
        .form-column {
            flex: 1 1 55%;
            padding-right: 20px;
        }

        .contact-form {
            background-color: #fafafa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        }

        .contact-form h2 {
            margin-bottom: 20px;
            color: #444;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .contact-form button {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #4cae4c;
        }

        /* Social Media Links on the right */
        .social-column {
            flex: 1 1 40%;
            padding-left: 20px;
            text-align: center;
        }

        .social-column .column1 {
            margin-bottom: 20px;
        }

        .social-column h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #444;
        }

        .social-column img {
            border-radius: 8px;
            width: 100%;
            max-width: 210px;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .social-column img:hover {
            transform: scale(1.05);
        }

        .social-column a {
            text-decoration: none;
            color: inherit;
        }

        /* Media Queries for responsive design */
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .form-column, .social-column {
                flex: 1 1 100%;
                padding: 0;
            }

            .form-column {
                margin-bottom: 30px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="contact">
        <h1>Contact Us</h1>
        <div class="row">
            <!-- Left Column (Contact Form) -->
            <div class="form-column">
                <div class="contact-form">
                    <h2>Send us a message</h2>
                    <form action="contactus.php" method="POST">
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Your Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Your Message:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>

                        <input  name="stores" value="send message" type="submit" >
                    </form>
                </div>
            </div>

            <!-- Right Column (Social Media Links) -->
<div class="social-column" style="background-color: white; padding: 20px; border-radius: 10px; ">
    <ul style="list-style: none; padding: 0; margin: 0;">
        <li style="margin-bottom: 20px; text-align: center;">
            <h2 style="font-family: Arial, sans-serif; font-size: 1.2em; margin-bottom: 10px;">Facebook:</h2>
            <a href="https://www.facebook.com/TrendyClothingZAR?mibextid=ZbWKwL" target="_blank">
                <img src="images/fbimg.jpg" alt="Facebook" style="width: 50px; height: 50px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
            </a>
        </li>
        <li style="margin-bottom: 20px; text-align: center;">
            <h2 style="font-family: Arial, sans-serif; font-size: 1.2em; margin-bottom: 10px;">Twitter:</h2>
            <a href="https://twitter.com/TrendyClothingZAR" target="_blank">
                <img src="images/ximg.jpg" alt="Twitter" style="width: 50px; height: 50px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
            </a>
        </li>
        <li style="margin-bottom: 20px; text-align: center;">
            <h2 style="font-family: Arial, sans-serif; font-size: 1.2em; margin-bottom: 10px;">Instagram:</h2>
            <a href="https://www.instagram.com/bvsic_couture?igsh=NTRwbXppaDNub3h6" target="_blank">
                <img src="images/igimg.jpg" alt="Instagram" style="width: 50px; height: 50px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
            </a>
        </li>
    </ul>
    <p style="text-align: center; font-family: Arial, sans-serif; font-size: 1em; color: #333;">Click on the images above to visit our social media pages</p>
</div>

        </div>
    </div>
</body>
</html>
