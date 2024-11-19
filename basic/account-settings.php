<?php
include "menu.php"; 
include "conn.php"; 

// Check if the user is logged in
if (!isset($_SESSION['login_'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Check if the user has a saved billing address
$stmt = $conn->prepare("SELECT * FROM billing_address WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables for form fields
$billing_info = [];
if ($result->num_rows > 0) {
    $billing_info = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip = $_POST['zip'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    if ($result->num_rows > 0) {
        // Update existing billing address
        $stmt = $conn->prepare("UPDATE billing_address SET full_name = ?, email = ?, address = ?, city = ?, province = ?, zip = ?, card_name = ?, card_number = ?, exp_month = ?, exp_year = ?, cvv = ? WHERE user_id = ?");
        $stmt->bind_param("sssssssssssi", $full_name, $email, $address, $city, $province, $zip, $card_name, $card_number, $exp_month, $exp_year, $cvv, $user_id);
    } else {
        // Insert new billing address
        $stmt = $conn->prepare("INSERT INTO billing_address (user_id, full_name, email, address, city, province, zip, card_name, card_number, exp_month, exp_year, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssssssss", $user_id, $full_name, $email, $address, $city, $province, $zip, $card_name, $card_number, $exp_month, $exp_year, $cvv);
    }

    if ($stmt->execute()) {
      
    } else {
        echo "Error: " . $stmt->error; // Display error if something went wrong
    }
}

$stmt->close(); // Close previous statement
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Information</title>
    <link href="style.css" rel="stylesheet"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white; 
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 90%; 
            background: white; 
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-row {
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 20px; 
        }
        .form-group {
            flex: 1; 
            margin-right: 10px; 
        }
        .form-group:last-child {
            margin-right: 0; 
        }
        label {
            font-weight: bold;
            display: block; 
            margin-bottom: 5px; 
        }
        input[type="text"], input[type="email"], input[type="number"] {
            width: calc(100% - 12px); 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }
        .profile-table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
        }
        .profile-table td {
            padding: 10px; 
            vertical-align: top; 
            border: none; 
            font-size: 16px;
        }
        .hidden {
            display: none; 
        }
    </style>
</head>
<body>
    <div class="container" style="border:none;">
        <h1>Billing Address</h1>

        <?php if ($result->num_rows > 0) : ?>
            <h2>Your Saved Billing Information</h2>
            <table class="profile-table">
                <tr><td><strong>Full Name:</strong></td><td><?php echo htmlspecialchars($billing_info['full_name']); ?></td></tr>
                <tr><td><strong>Email:</strong></td><td><?php echo htmlspecialchars($billing_info['email']); ?></td></tr>
                <tr><td><strong>Address:</strong></td><td><?php echo htmlspecialchars($billing_info['address']); ?></td></tr>
                <tr><td><strong>City:</strong></td><td><?php echo htmlspecialchars($billing_info['city']); ?></td></tr>
                <tr><td><strong>Province:</strong></td><td><?php echo htmlspecialchars($billing_info['province']); ?></td></tr>
                <tr><td><strong>Zip:</strong></td><td><?php echo htmlspecialchars($billing_info['zip']); ?></td></tr>
                <tr><td><strong>Name on Card:</strong></td><td><?php echo htmlspecialchars($billing_info['card_name']); ?></td></tr>
                <tr><td><strong>Credit Card Number:</strong></td><td><?php echo htmlspecialchars($billing_info['card_number']); ?></td></tr>
                <tr><td><strong>Expiration Month:</strong></td><td><?php echo htmlspecialchars($billing_info['exp_month']); ?></td></tr>
                <tr><td><strong>Expiration Year:</strong></td><td><?php echo htmlspecialchars($billing_info['exp_year']); ?></td></tr>
                <tr><td><strong>CVV:</strong></td><td><?php echo htmlspecialchars($billing_info['cvv']); ?></td></tr>
            </table>
            <button style="width: 30%;" onclick="toggleForm()">Update Billing Information</button>
        <?php else : ?>
            
        <?php endif; ?>

        <form method="POST" id="billingForm" class="<?php echo $result->num_rows > 0 ? 'hidden' : ''; ?>">
            <h2><?php echo $result->num_rows > 0 ? 'Update Billing Information' : 'Enter Billing Information'; ?></h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['full_name']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['email']) : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['address']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['city']) : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="province">Province</label>
                    <input type="text" name="province" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['province']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" name="zip" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['zip']) : ''; ?>">
                </div>
            </div>
            <h2>Payment Information</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="card_name">Name on Card</label>
                    <input type="text" name="card_name" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['card_name']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="card_number">Credit Card Number</label>
                    <input type="number" name="card_number" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['card_number']) : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="exp_month">Expiration Month</label>
                    <input type="text" name="exp_month" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['exp_month']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="exp_year">Expiration Year</label>
                    <input type="text" name="exp_year" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['exp_year']) : ''; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" name="cvv" required value="<?php echo $result->num_rows > 0 ? htmlspecialchars($billing_info['cvv']) : ''; ?>">
                </div>
            </div>
            <button type="submit" style="width: 30%;"><?php echo $result->num_rows > 0 ? 'Update Billing Information' : 'Save Billing Information'; ?></button>
        </form>
    </div>

    <script>
        function toggleForm() {
            var form = document.getElementById('billingForm');
            form.classList.toggle('hidden'); // Toggle the hidden class
        }
    </script>
</body>
</html>
