<?php
include "menu.php"; 
include "conn.php"; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['login_'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch saved billing address for the user
$stmt = $conn->prepare("SELECT * FROM billing_address WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$billing_info = [];
if ($result->num_rows > 0) {
    $billing_info = $result->fetch_assoc();
}

// Example: Fetching cart items from the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Calculate the total amount from the cart
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity']; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="Checkout">
        <h1>Checkout<h4>Note *Your banking details will not be saved , due to right protection of our company*</h4></h1>
    </div>

    <div class="row" style="width:100%">
        <div class="col-75">
            <div class="container">
                <form method="post" action="action_page.php">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Percy Karabo" 
                                   value="<?php echo isset($billing_info['full_name']) ? htmlspecialchars($billing_info['full_name']) : ''; ?>" required>
                            
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="Percy@example.com" 
                                   value="<?php echo isset($billing_info['email']) ? htmlspecialchars($billing_info['email']) : ''; ?>" required>
                            
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="9 Nombhela Cres Vosloorus" 
                                   value="<?php echo isset($billing_info['address']) ? htmlspecialchars($billing_info['address']) : ''; ?>" required>
                            
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Johannesburg" 
                                   value="<?php echo isset($billing_info['city']) ? htmlspecialchars($billing_info['city']) : ''; ?>" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">Province</label>
                                    <input type="text" id="state" name="state" placeholder="Gauteng" 
                                           value="<?php echo isset($billing_info['province']) ? htmlspecialchars($billing_info['province']) : ''; ?>" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="1431" 
                                           value="<?php echo isset($billing_info['zip']) ? htmlspecialchars($billing_info['zip']) : ''; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" value="<?php echo isset($billing_info['card_name']) ?>" name="cardname" placeholder="John More Doe" required>
                            
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" value="<?php echo isset($billing_info['card_number']) ?>" placeholder="1111-2222-3333-4444" required>
                            
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September" value="<?php echo isset($billing_info['exp_month']) ?>" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" value="<?php echo isset($billing_info['exp_year']) ?>" name="expyear" placeholder="2025" required>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" value="<?php echo isset($billing_info['cvv']) ?>" placeholder="352" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-25">
                        <div class="container">
                            <h4>Cart
                                <span class="price" style="color:black">
                                    <i style="color:red" class="fa fa-shopping-cart"></i>
                                    <b><?php echo count($cart); ?></b>
                                </span>
                            </h4>
                            <?php foreach ($cart as $item): ?>
                                <p><a><?php echo htmlspecialchars($item['title']); ?></a> <span class="price">R<?php echo htmlspecialchars($item['price']); ?></span></p>
                            <?php endforeach; ?>
                            <hr>
                            <p>Total <span class="price" style="color:black"><b>R<?php echo $total; ?></b></span></p>
                            <div style="width: 100%;"></div> <!-- Confirm Purchase pop up -->
                            <button class="show-confirm" onclick="openCForm()">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <script>
            // You can add any necessary JavaScript here
        </script>
    </div>
</body>
</html>
