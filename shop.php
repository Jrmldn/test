<?php
require 'config.php';
if (empty($_SESSION["id"])) {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>
    <link rel="icon" type="image/png" href="images/weblogo.jpg">
    <link rel="stylesheet" href="css/navbar-footer.css" />
    <link rel="stylesheet" href="css/shop.css" />
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="logo"><img src="images/logo.jpeg" alt="logo" /></div>
            <div class="hamburgericon" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="links" id="navLinks">
                <a href="homepage.php"><strong>Home</strong></a>
                <a href="shop.php"><strong>Products</strong></a>
                <a href="logout.php" class="logoutbtn"><strong>Log Out</strong></a>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <nav class="header">
                <a class="logo"><strong>SHOP-LIST</strong></a>
                <div class="cart-group">
                    <button class="transaction-btn" onclick="openModal()">Transactions</button>
                    <div class="cart-notify">
                        <img src="images/cart.jpg" alt="cart">
                        <span class="count">0</span>
                    </div>
                </div>
            </nav>
            <div class="item-box"></div>
            <div class="cart-list">
                <ul class="cart-menu"></ul>                <div class="total-box">
                    <span>Total</span>
                    <span class="total">₱ 0</span>
                </div>
                <button class="checkout-btn" onclick="checkout()">Check Out</button>
            </div>
        </div>
        <div id="transactionModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Transaction History</h2>
                <div class="transaction-list">
                    
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Jonard Inc.</p>
        <br>
        <p>
            Follow us on: <a href="https://www.facebook.com/">Facebook</a> |
            <a href="https://x.com/">Twitter</a> |
            <a href="https://www.instagram.com/">Instagram</a>
        </p>
    </footer>
    <script src="script/hamburger-icon.js"></script>
    <script src="script/add-to-cart.js"></script>
    <script src="script/transaction-modal.js"></script>
</body>
</html>