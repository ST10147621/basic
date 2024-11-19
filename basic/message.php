<?php
// Include the database connection file
include "conn.php";

// SQL query to fetch data from the 'message' table
$sql = "SELECT name, email, message FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";

    // Fetch and display each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No messages found.";
}

// Close the database connection
$conn->close();
?>
