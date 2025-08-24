const elements = {
    itemBox: document.querySelector(".item-box"),
    cartList: document.querySelector(".cart-list"),
    itemMenu: document.querySelector(".cart-menu"),
    itemCount: document.querySelector(".count"),
    totalPrice: document.querySelector(".total")
};

let cart = [], products = [];

async function fetchProducts() {
    try {
        const response = await fetch('get_products.php');
        products = await response.json();
        renderProducts();
    } catch {
        elements.itemBox.innerHTML = '<p>Error loading products</p>';
    }
}

function renderProducts() {
    elements.itemBox.innerHTML = products.map((item, index) => `
        <div class="content">
            <img src="${item.item_img}" alt="${item.item_name}"/>
            <h1>${item.item_name}</h1>
            <p class="item-price">
                ₱ ${item.item_price} 
                <button class="btn" onclick="addToCart(${index})" ${item.stock ? '' : 'disabled'}>
                    ${item.stock ? 'Add to cart' : 'Out of Stock'}
                </button>
            </p>
        </div>
    `).join("");
}

function addToCart(index) {
    const product = products[index];
    if (!product.stock) return;

    const existingItem = cart.find(item => item.product_id === product.product_id);
    if (existingItem && existingItem.quantity >= product.stock) {
        alert('No more stock available');
        return;
    }

    existingItem 
        ? existingItem.quantity++ 
        : cart.push({ ...product, quantity: 1 });
    
    updateCart();
}

function updateCart() {
    const total = cart.reduce((sum, { item_price, quantity }) => sum + item_price * quantity, 0);
    elements.itemCount.textContent = cart.reduce((sum, { quantity }) => sum + quantity, 0);
    elements.totalPrice.textContent = `₱ ${total}`;
    
    elements.itemMenu.innerHTML = cart.length 
        ? cart.map((item, index) => `
            <li class="cart-item">
                <div class="cart-item-content">
                    <img src="${item.item_img}" class="cart-item-image"/>
                    <div class="cart-item-details">
                        <p class="cart-item-name">${item.item_name}</p>
                        <p class="cart-item-price">₱ ${item.item_price}</p>
                        <p class="cart-item-quantity">Quantity: ${item.quantity}</p>
                    </div>
                </div>
                <img src="images/trash.jpg" onclick="removeItem(${index})" class="delete-icon"/>
            </li>
        `).join("")
        : "Your cart is empty";
}

function removeItem(index) {
    cart.splice(index, 1);
    updateCart();
}

function checkout() {
    if (!cart.length) {
        alert('Your cart is empty!');
        return;
    }

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'handle_purchase.php';

    cart.forEach(({ product_id, quantity }) => {
        form.appendChild(Object.assign(document.createElement('input'), {
            type: 'hidden',
            name: 'item_id[]',
            value: product_id
        }));
        form.appendChild(Object.assign(document.createElement('input'), {
            type: 'hidden',
            name: 'quantity[]',
            value: quantity
        }));
    });

    document.body.appendChild(form);
    form.submit();
}

document.addEventListener('DOMContentLoaded', fetchProducts);
document.querySelector('.cart-notify').addEventListener('click', () => 
    elements.cartList.classList.toggle('active'));