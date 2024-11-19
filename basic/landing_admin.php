<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Clothing Store - Income Report</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .scrollable {
            max-height: 400px; /* Set a fixed height for the div */
            overflow-y: auto; /* Enable vertical scrolling */
            margin-top: 20px;
            border: 1px solid #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .filter {
            margin-bottom: 20px;
        }

        .datepicker {
            width: 150px;
            padding: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hey,  <?php session_start(); echo $_SESSION['login_']; ?></h1>
    </header>
    <div class="container">
        <h2>Income Report</h2>

        <form method="GET" class="filter">
            <label for="timeframe">Select Time Frame:</label>
            <select name="timeframe" id="timeframe" onchange="this.form.submit()">
                <option value="daily" <?= (isset($_GET['timeframe']) && $_GET['timeframe'] == 'daily') ? 'selected' : ''; ?>>Daily</option>
                <option value="weekly" <?= (isset($_GET['timeframe']) && $_GET['timeframe'] == 'weekly') ? 'selected' : ''; ?>>Weekly</option>
                <option value="monthly" <?= (isset($_GET['timeframe']) && $_GET['timeframe'] == 'monthly') ? 'selected' : ''; ?>>Monthly</option>
                <option value="yearly" <?= (isset($_GET['timeframe']) && $_GET['timeframe'] == 'yearly') ? 'selected' : ''; ?>>Yearly</option>
                <option value="all" <?= (isset($_GET['timeframe']) && $_GET['timeframe'] == 'all') ? 'selected' : ''; ?>>All Time</option>
            </select>

            <label for="startDate">Start Date:</label>
            <input type="text" name="startDate" id="startDate" class="datepicker" value="<?= htmlspecialchars($_GET['startDate'] ?? '') ?>">
            <label for="endDate">End Date:</label>
            <input type="text" name="endDate" id="endDate" class="datepicker" value="<?= htmlspecialchars($_GET['endDate'] ?? '') ?>">
            <input type="submit" value="Filter">
        </form>

        <?php
        include "conn.php"; // Database connection

        // Initialize timeframe and dates
        $timeframe = $_GET['timeframe'] ?? 'daily';
        $startDate = $_GET['startDate'] ?? date('Y-m-d', strtotime('-1 month')); // Default to last month
        $endDate = $_GET['endDate'] ?? date('Y-m-d'); // Default to today

        // Base query for total income
        $query = "SELECT SUM(total) AS income FROM orders";
        $conditions = [];

        // Determine query conditions based on timeframe
        switch ($timeframe) {
            case 'daily':
                $conditions[] = "DATE(order_date) = CURDATE()";
                break;
            case 'weekly':
                $conditions[] = "YEARWEEK(order_date, 1) = YEARWEEK(CURDATE(), 1)";
                break;
            case 'monthly':
                $conditions[] = "MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
                break;
            case 'yearly':
                $conditions[] = "YEAR(order_date) = YEAR(CURDATE())";
                break;
            case 'all':
                // No conditions needed for all time
                break;
        }

        // Check if a custom date range is provided
        if (!empty($startDate) && !empty($endDate)) {
            $conditions[] = "order_date BETWEEN ? AND ?";
        }

        // Build the final query
        if (count($conditions) > 0) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        // Prepare and execute the statement for total income
        $stmt = $conn->prepare($query);
        if (count($conditions) > 0 && end($conditions) === "order_date BETWEEN ? AND ?") {
            $stmt->bind_param('ss', $startDate, $endDate);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $income = $result->fetch_assoc()['income'] ?? 0;

        // Display total income
        echo "<h3>Total Income: R" . number_format($income, 2) . "</h3>";
        ?>

        <h4>Order Details</h4>
        <div class="scrollable">
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
                </tr>

                <?php
                // Retrieve order details based on the selected timeframe and date range
                $query = "SELECT * FROM orders";
                $conditions = [];

                // Determine conditions for order details query
                switch ($timeframe) {
                    case 'daily':
                        $conditions[] = "DATE(order_date) = CURDATE()";
                        break;
                    case 'weekly':
                        $conditions[] = "YEARWEEK(order_date, 1) = YEARWEEK(CURDATE(), 1)";
                        break;
                    case 'monthly':
                        $conditions[] = "MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
                        break;
                    case 'yearly':
                        $conditions[] = "YEAR(order_date) = YEAR(CURDATE())";
                        break;
                    case 'all':
                        // No conditions needed for all time
                        break;
                }

                // Check if a custom date range is provided
                if (!empty($startDate) && !empty($endDate)) {
                    $conditions[] = "order_date BETWEEN ? AND ?";
                }

                // Build the final query for order details
                if (count($conditions) > 0) {
                    $query .= " WHERE " . implode(" AND ", $conditions);
                }

                // Prepare and execute the statement for order details
                $stmt = $conn->prepare($query);
                if (count($conditions) > 0 && end($conditions) === "order_date BETWEEN ? AND ?") {
                    $stmt->bind_param('ss', $startDate, $endDate);
                }
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if any orders exist
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td><img src='" . $row['product_image'] . "' width='50' height='50'></td>";
                        echo "<td>" . $row['product_size'] . "</td>";
                        echo "<td>R" . number_format($row['price'], 2) . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>R" . number_format($row['total'], 2) . "</td>";
                        echo "<td>" . $row['order_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found for the selected timeframe or date range.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#startDate, #endDate").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</body>
</html>
