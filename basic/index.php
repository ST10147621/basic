<?php 
 include "menu.php";

?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop All New Arrivals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div style="text-align: center; background-color: white; padding: 20px;">
        <p style="font-size: 24px; font-weight: bold;">Shop All New Arrivals</p>
        <img src="images/logo.jpg" style="margin-top: 10px; max-width: 100px;">


       <p style="width: 100%;text-align:center;width:70%;margin-left:15%;margin-right:15%"> Discover the ultimate shopping experience with our system, where quality meets convenience! Our carefully curated selection of stylish items is designed to cater to your unique taste and lifestyle. With user-friendly navigation, you can effortlessly browse through a diverse range of products, making it easy to find exactly what you’re looking for. Plus, enjoy secure payment options and fast delivery, ensuring your purchases arrive at your doorstep in no time. Don’t miss out on exclusive deals and offers that provide exceptional value. Join our community of satisfied customers and elevate your shopping experience today—shop with us and see the difference!
      <br><br> <button style="background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                        <a href="shop.php" style="color: white; text-decoration: none;">Explore</a>
                    </button>
    
    
    
    </p>
    
    
    </div>


    
        
            <div style="display: flex; justify-content: space-around;">
                
                <!-- Column 1 -->
                <div style="text-align: center; width: 50%; padding: 20px;">
                    <h2 style="font-size: 24px; margin-bottom: 20px;">Everyday Skateboarding Apparel</h2>
                    <p style="margin-bottom: 20px;">Your One Stop OG Apparel Store</p>
                  
                </div>
            </div>
      
      
    <!-- Product Section -->
    <div style="padding: 50px 0;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-around;">
                
            

                <!-- Product Items (Columns 2 to 4) -->
                <!-- Column 2 -->
                <div style="text-align: center; width: 25%; padding: 20px;">
                    <a onclick="showPopup('BASIC PATTERN TSHIRT', 'images/prod1.jpg', 'R250')" style="text-decoration: none;">
                        <img src="images/prod1.jpg" height="290" width="210" style="border-radius: 10px;">
                        <h3 style="font-size: 18px; margin: 10px 0;">BASIC PATTERN TSHIRT</h3>
                        <strong style="font-size: 16px;">R250</strong>
              <br> <button style="background-color: black; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                        <a href="shop" style="color: white; text-decoration: none;">Explore</a>
                    </button>     </a>
                    
                </div>

                <!-- Column 3 -->
                <div style="text-align: center; width: 25%; padding: 20px;">
                    <a onclick="showPopup('BLACK AND RED JACKET', 'images/prod2.jpg', 'R400')" style="text-decoration: none;">
                        <img src="images/prod2.jpg" height="290" width="210" style="border-radius: 10px;">
                        <h3 style="font-size: 18px; margin: 10px 0;">BLACK AND RED JACKET</h3>
                        <strong style="font-size: 16px;">R400</strong>
                  <br> <button style="background-color: black; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                        <a href="shop" style="color: white; text-decoration: none;">Explore</a>
                    </button>      </a>
                </div>

                <!-- Column 4 -->
                <div style="text-align: center; width: 25%; padding: 20px;">
                    <a onclick="showPopup('BASIC SWEATER', 'images/Prod3.jpg', 'R350')" style="text-decoration: none;">
                        <img src="images/Prod3.jpg" height="290" width="210" style="border-radius: 10px;">
                        <h3 style="font-size: 18px; margin: 10px 0;">BASIC SWEATER</h3>
                        <strong style="font-size: 16px;">R350</strong>
                        <br> <button style="background-color: black; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                        <a href="shop" style="color: white; text-decoration: none;">Explore</a>
                    </button>     </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup for Product Details -->
    <div id="popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8);">
        <div style="background-color: white; margin: 100px auto; padding: 20px; width: 50%; border-radius: 10px;">
            <span onclick="closePopup()" style="cursor: pointer; float: right; font-size: 24px;">&times;</span>
            <div id="popup-image" style="text-align: center; margin-bottom: 20px;"></div>
            <div id="popup-details" style="text-align: center;">
                <h2 id="popup-title" style="font-size: 24px;"></h2>
                <p id="popup-price" style="font-size: 20px;"></p>
                <form id="size-form" style="margin-bottom: 20px;">
                    <label style="margin-right: 10px;"><input type="radio" name="size" value="S"> Small (S)</label>
                    <label style="margin-right: 10px;"><input type="radio" name="size" value="M"> Medium (M)</label>
                    <label style="margin-right: 10px;"><input type="radio" name="size" value="L"> Large (L)</label>
                    <label><input type="radio" name="size" value="XL"> Extra Large (XL)</label>
                </form>
                <button onclick="addToCart()" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer;">Add to Cart</button>
                <button onclick="closePopup()" style="background-color: #6c757d; color: white; padding: 10px 20px; border: none; cursor: pointer;">Continue Shopping</button>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div style="background-color: #f8f9fa; padding: 50px 0;">
        <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 24px; margin-bottom: 30px;">Why Choose Us</h2>
            <p><strong>Until the end of life, no one wants to be an NPC. Write your own story, live your own life.</strong></p>
            
            <div style="display: flex; justify-content: space-around; margin-top: 40px;">
                <!-- Feature 1 -->
                <div style="width: 23%; text-align: center;">
                    <img src="images/truck.svg" alt="Fast Shipping" style="max-width: 80px;">
                    <h3 style="font-size: 18px; margin-top: 10px;">Fast & Free Shipping</h3>
                    <p style="font-size: 14px;">Efficiency and affordability for seamless shopping.</p>
                </div>

                <!-- Feature 2 -->
                <div style="width: 23%; text-align: center;">
                    <img src="images/bag.svg" alt="Easy to Shop" style="max-width: 80px;">
                    <h3 style="font-size: 18px; margin-top: 10px;">Easy to Shop</h3>
                    <p style="font-size: 14px;">User-friendly, clean, and minimalist interface.</p>
                </div>

                <!-- Feature 3 -->
                <div style="width: 23%; text-align: center;">
                    <img src="images/support.svg" alt="24/7 Support" style="max-width: 80px;">
                    <h3 style="font-size: 18px; margin-top: 10px;">24/7 Support</h3>
                    <p style="font-size: 14px;">Round-the-clock assistance to all users.</p>
                </div>

                <!-- Feature 4 -->
                <div style="width: 23%; text-align: center;">
                    <img src="images/return.svg" alt="Hassle-Free Returns" style="max-width: 80px;">
                    <h3 style="font-size: 18px; margin-top: 10px;">Hassle-Free Returns</h3>
                    <p style="font-size: 14px;">Effortless returns for a worry-free experience.</p>
                </div>
            </div>
        </div>
    </div>

  <?php 
include "footer.php";

?>

</body>
</html>
