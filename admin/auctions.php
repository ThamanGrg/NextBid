<?php
include('../php/connection.php');
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Auctions</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Item Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['item_ID']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['item_title']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['product_category']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                    if ($row['status'] == 'pending') {
                                        echo "<td><a href='../php/auctionAction.php?id=". $row['item_ID'] . "&action=accept'>Accept</a>/<a href='../php/auctionAction.php?id=". $row['item_ID'] . "&action=reject'>Reject</a></td>";
                                    } elseif ($row['status'] == 'accepted') {
                                        echo "<td><a href='../php/auctionAction.php?id=". $row['item_ID'] . "&action=delete'>Delete</a></td>";
                                    }
                                    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>

<?php
$conn->close();
?>