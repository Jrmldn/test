<?php
require 'config.php';
if(empty($_SESSION["id"])) {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <link rel="icon" type="image/png" href="images/weblogo.jpg">
  <link rel="stylesheet" href="css/navbar-footer.css"/>
  <link rel="stylesheet" href="css/homepage.css" />
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
    <div class="landing-section">
      <div class="landing-title">
        <h1>
          <span class="highlight-text"> Elevate </span> Your Fashion Sense:
          Comfort Creates <span class="highlight-text"> Style </span>
        </h1>
        <p>
          Discover our essentials that blend comfortness with design.
        </p>
        <button id="exploreBtn">Explore Now</button>
      </div>
    </div>

    <div class="items-section">
      <video autoplay muted loop class="video-background">
        <source src="videos/bgvid1.mp4" type="video/mp4">
      </video>
      <div class="items-title">
        <h1>Items You Must Have</h1>
        <p>Here are the best items in our store, check it out now.</p>
      </div>

      <div class="items">
        <img src="images/item1.jpg" alt="image1">
        <div class="items-content">
          <h2>Adidas Gazelle</h2>
          <p>Familiar but always fresh, the iconic Adidas Gazelle.</p>
        </div>
      </div>

      <div class="items">
        <img src="images/item2.jpg" alt="image2">
        <div class="items-content">
          <h2>Converse Chuck Taylor All Star</h2>
          <p>The most iconic. Ever.</p>
        </div>
      </div>

      <div class="items">
        <img src="images/item3.jpg" alt="image3">
        <div class="items-content">
          <h2>Nike Lebron XXI EP</h2>
          <p>For everyday sports-wear, daily-use.</p>
        </div>
      </div>

      <div class="items">
        <img src="images/item4.jpg" alt="image4">
        <div class="items-content">
          <h2>Asics Skyhand OG</h2>
          <p>Asics is a brand known for comfortable shoes.</p>
        </div>
      </div>

      <div class="go-shop">
        <a href="shop.php"><button class="go-shop-btn">Go Shop for More</button></a>
      </div>
    </div>

    <div class="deal-section">
      <div class="deal-section-item">
        <div class="deal-section-contents">
          <h1>Limited-Time Deals!</h1>
          <p>Starting on <span class="deal-date">May 20, 2025</span>.</p>
          <p>Enjoy <span class="deal-discount">20%</span> off. Buy one item, get one for free!</p>
        </div>
        <img src="images/deal-item.jpg" alt="item1">
      </div>
    </div>

        <div class="why-special-section">
      <div class="why-special-title">
        <h1>Why Our Items Are Special?</h1>
      </div>

      <div class="why-special-item">
        <img src="images/lightbulb.jpg" alt="image">
        <div class="why-special-item-contents">
          <h2>SMART DESIGN</h2>
          <p>
            Aesthetic and practical for daily use.
          </p>
        </div>
      </div>

      <div class="why-special-item">
        <img src="images/checkbox.jpg" alt="image">
        <div class="why-special-item-contents">
          <h2>BUILT TO LAST</h2>
          <p>
            High-quality materials for long-term use.
          </p>
        </div>
      </div>

      <div class="why-special-item">
        <img src="images/box.jpg" alt="image">
        <div class="why-special-item-contents">
          <h2>SPACE OPTIMIZED</h2>
          <p>
            Compact Design, Maximum Comfort - No Wasted Space.
          </p>
        </div>
      </div>

      <div class="why-special-item">
        <img src="images/delivery.jpg" alt="image">
        <div class="why-special-item-contents">
          <h2>EASY SHOP</h2>
          <p>
            Fast shipping & easy returns.
          </p>
        </div>
      </div>
    </div>

    <div class="faq-section">
      <div class="faq-title">
        <h1>Frequently Asked Questions</h1>
      </div>
      <div class="faq-content">
        <details>
          <summary>How do I track my order?</summary>
          <p>You can track your order using the tracking link sent to your email.</p>
        </details>
        <hr>
        <details>
          <summary>What is your store return policy?</summary>
          <p>You can return any item within 30 days of purchase for a full refund.</p>
        </details>
        <hr>
        <details>
          <summary>How do I contact customer service?</summary>
          <p>You can reach us at our contact page.</p> 
        </details>
        <hr>
        <details>
          <summary>What payment methods do you accept?</summary>
          <p>We accept all major credit/debit cards (Visa, Mastercard, American Express)
            as well as digital wallets like 
            PayPal, Apple Pay, Google Pay, and bank transfers. 
            All payments are processed through secure, encrypted gateways for your protection.</p>
        </details>
        <hr>
        <details>
          <summary>How long does shipping take?</summary>
          <p>Standard shipping takes 3-5 business days within the country. 
            We offer expedited shipping (1-2 business days) for an additional fee. 
            International orders typically take 7-14 business days depending on the destination. 
            You'll receive tracking information as soon as your order ships.</p>
        </details>
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
  <script src="script/scroll.js"></script>

</body>
</html>