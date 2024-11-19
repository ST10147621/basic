<?php
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

// SQL query to fetch products
$sql = "SELECT id, title, image_url, price, total_added FROM products";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $products[] = array(
            "id" => $row["id"],
            "title" => $row["title"],
            "image_url" => $row["image_url"],
            "price" => $row["price"],
            "total_added" => $row["total_added"]
        );
    }
}

// Close connection
$conn->close();

// Return JSON response
echo json_encode($products);
?>
