<?php
// Database connection
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION["id"])) {
    echo "<p>Please login first to view your purchase history</p>";
    exit;
}

// Get user ID from session
$userId = $_SESSION["id"];

// Get user's purchase history
$sql = "SELECT * FROM customer_purchase 
        WHERE user_id = $userId 
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

// Show message if no purchases found
if (mysqli_num_rows($result) == 0) {
    echo "<p>You haven't made any purchases yet</p>";
    exit;
}

// Display purchases
while ($row = mysqli_fetch_array($result)) { ?>
    <div class="cart-item">
        <div class="cart-item-details">
            <p class="purchase-items"><?= $row['item_name'] ?></p>
            <p class="purchase-quantity">Quantity: <?= $row['total_quantity'] ?></p> 
            <p class="purchase-total">Total: ₱<?= $row['total_amount'] ?></p>
            <p class="purchase-date"><?= date('M d, Y', strtotime($row['created_at'])) ?></p>
        </div>
    </div>
<?php }
?>