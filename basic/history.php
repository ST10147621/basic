<?php  

include "menu.php";

?>

<?php
include "conn.php"; 

// Delete order if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    echo "<script>window.location.href='history';</script>";
}

// Retrieve orders from the database
$query = "SELECT * FROM orders WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION['email']); // Get orders for logged in user based on email
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

    <h1>My Orders</h1>

    <table>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>

        <?php
        // Check if any orders exist
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td><img src='" . $row['product_image'] . "' width='50' height='50'></td>";
                echo "<td>" . $row['product_size'] . "</td>";
                echo "<td>R" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>R" . $row['total'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td><a class='delete-btn' href='history?delete_id=" . $row['order_id'] . "' onclick='return confirm(\"Are you sure you want to delete this order?\");'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No orders found.</td></tr>";
        }
        ?>
    </table>

</body>
</html>
