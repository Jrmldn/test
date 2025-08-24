<?php
// Connect to database
require 'config.php';

// Map products to image numbers
$imageMap = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];

// Get in-stock products
$result = mysqli_query($conn, "SELECT * FROM products WHERE stock > 0");

// Get all rows
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Prepare product list
$products = [];

// Process each product
foreach($rows as $row) {
    // Get image number
    $imgNum = $imageMap[$row['product_id'] - 1];
    
    // Add product details
    $products[] = [
        'product_id' => $row['product_id'],
        'item_name' => $row['item_name'],
        'item_price' => floatval($row['item_price']),
        'stock' => (int)$row['stock'],
        'item_img' => 'images/item' . $imgNum . '.jpg'
    ];
}

// Set JSON header
header('Content-Type: application/json');

// Output products
echo json_encode($products);
