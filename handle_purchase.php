<?php
// Include database connection
require 'config.php';

// Process checkout when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION["id"])) {
    $userId = $_SESSION["id"];
    
    // Get customer name from database
    $result = mysqli_query($conn, "SELECT name FROM tb_user WHERE id = $userId");
    $user = mysqli_fetch_assoc($result);
    
    // Initialize purchase totals
    $totalAmount = 0;
    $totalQuantity = 0;
    $items = [];

    // Process each item in the cart
    foreach ($_POST['item_id'] as $i => $rawItemId) {
        $itemId = (int)$rawItemId;
        $quantity = (int)$_POST['quantity'][$i];
        
        // Get item details
        $product = mysqli_fetch_assoc(mysqli_query($conn, 
            "SELECT item_name, item_price FROM products WHERE product_id = $itemId"
        ));
        
        // Update the stock count
        mysqli_query($conn, "UPDATE products SET stock = stock - $quantity WHERE product_id = $itemId");
        
        // Calculate totals
        $totalAmount += $product['item_price'] * $quantity;
        $totalQuantity += $quantity;
        $items[] = $product['item_name'] . " (x$quantity)";
    }

    // Convert item list to string and save purchase
    $itemString = !empty($items) ? implode(', ', $items) : '';
    
    $stmt = mysqli_prepare($conn, 
        "INSERT INTO customer_purchase (user_id, name, item_name, total_amount, total_quantity) 
         VALUES (?, ?, ?, ?, ?)"
    );
     
    mysqli_stmt_bind_param($stmt, "issdi", 
        $userId, 
        $user['name'], 
        $itemString,
        $totalAmount, 
        $totalQuantity
    );
    mysqli_stmt_execute($stmt);

    // Redirect back to shop
    header('Location: shop.php?purchase=completed');
    exit;
}

header('Location: shop.php');
exit;


