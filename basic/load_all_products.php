<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-item">
                  <div style="border-bottom-left-radius: 100px; width:10rem; background-color:black; color:white; position:absolute">' . 
                  ($row["total_added"] > 0 ? 'available ' . $row["total_added"] : 'Out of Stock') . '</div>
                     
                  <img src="' . $row["image_url"] . '" class="product-thumbnail">
                 
                  <h3 class="product-title">' . $row["title"] . '</h3>
                              
                  <strong class="product-price">R' . $row["price"] . '</strong><br>
                  
                  <h3 style="width:100%; display:flex; text-align:center; margin-left:25%; margin-right:25%">Size: 
                      <label><input name="size" type="radio" value="S"> S</label> |  
                      <label><input name="size" type="radio" value="M"> M</label> |  
                      <label><input name="size" type="radio" value="L"> L</label>
                  </h3>
                  
                  <button style="width:100%" class="add-to-cart" data-title="' . $row["title"] . '" data-price="' . $row["price"] . '" data-image="' . $row["image_url"] . '">Add to Cart</button>
              </div>';
    }
    
} else {
    echo '<p>No products found.</p>';
}

$conn->close();
?>
