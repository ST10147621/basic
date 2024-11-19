<?php 
include "conn.php"; // Include database connection file
session_start();
// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $total = 0;

    // Loop through each item in the cart
    foreach ($_SESSION['cart'] as $cartItem) {

        $image = $cartItem['image'];
        $name =  $cartItem['title'];
        $size =  $cartItem['size'];
        $price = $cartItem['price'];
        $quantity =  $cartItem['quantity'];
        $item_total = $price * $quantity;
        $total += $item_total;


        $query ="select * from products where title='$name'";
$done = mysqli_query($conn,$query);
$collect = mysqli_fetch_assoc($done);
$collect["total_added"];
$totals = $collect["total_added"] - $quantity;
if($totals<0 || $totals==0){
$totals =0;
}
$querys ="update products set total_added=$totals where title='$name'";
 mysqli_query($conn,$querys);
        // Get the user's email from session
        $email =  $_SESSION['email'];

        // SQL query to insert order data into the 'orders' table
        $sql = "INSERT INTO orders (email, product_name, product_image, product_size, price, quantity, total) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters to prevent SQL injection
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssdii", $email, $name, $image, $size, $price, $quantity, $item_total);

            // Execute the statement and check for success
            if ($stmt->execute()) {
                echo "<script>window.location.href='history';</script>";
            } else {
               echo "<script>window.location.href='history';</script>";
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            echo "<script>window.location.href='history';</script>";
        }
    }

    // After inserting all cart items, you can clear the cart session if necessary
    unset($_SESSION['cart']);


} else {
    echo "<script>window.location.href='history';</script>";
}

?>
