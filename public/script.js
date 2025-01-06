let cart = {};
let totalItems = 0;
let totalPrice = 0;

function addToCart(id, name, price) {
    if (!cart[id]) {
        cart[id] = {
            id: id,
            name: name,
            quantity: 0,
            price: price
        };
    }
    cart[id].quantity++;
    totalItems++;
    totalPrice += price;
    updateCounter(id);
    updateCartPopup();
}

function updateCounter(id) {
    document.getElementById(`counter-${id}`).textContent = cart[id].quantity;
}

function updateCartPopup() {
    let popup = document.getElementById('cartPopup');
    
    if (totalItems === 0) {
        if (popup) {
            popup.remove();
        }
        return;
    }
    
    if (!popup) {
        popup = createCartPopup();
    }
    
    let cartItemsHtml = Object.entries(cart)
        .filter(([_, item]) => item.quantity > 0)
        .map(([id, item]) => `
            <div class="cart-item">
                <span>${item.name}</span>
                <div class="d-flex align-items-center gap-2">
                    <span>${item.quantity}x</span>
                    <span>Rp. ${item.price * item.quantity}</span>
                </div>
            </div>
        `).join('');

    popup.innerHTML = `
        <h5>Keranjang Belanja</h5>
        <div class="cart-items">
            ${cartItemsHtml}
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="mb-0">Total Item: ${totalItems}</p>
                <p class="mb-0">Total: Rp. ${totalPrice}</p>
            </div>
            <button class="btn btn-primary" onclick="goToKonfirmasi()">
                Konfirmasi Pembelian
            </button>
        </div>
    `;
}

function createCartPopup() {
    const popup = document.createElement('div');
    popup.id = 'cartPopup';
    popup.className = 'cart-popup';
    document.body.appendChild(popup);
    return popup;
}

function showQuantityControls(id, name, price) {
    document.getElementById(`controls-${id}`).style.display = 'flex';
    document.getElementById(`button-${id}`).style.display = 'none';
    
    if (!cart[id]) {
        cart[id] = {
            id: id,
            name: name,
            quantity: 1,
            price: price
        };
        updateQuantityDisplay(id);
        updateCartTotal();
    }
}

function increaseQuantity(id) {
    cart[id].quantity++;
    updateQuantityDisplay(id);
    updateCartTotal();
}

function decreaseQuantity(id) {
    if (cart[id].quantity > 0) {
        cart[id].quantity--;
        
        if (cart[id].quantity === 0) {
            // Reset to button view
            document.getElementById(`controls-${id}`).style.display = 'none';
            document.getElementById(`button-${id}`).style.display = 'block';
            delete cart[id]; // Remove item from cart
        } else {
            updateQuantityDisplay(id);
        }
        updateCartTotal();
    }
}


function updateQuantityDisplay(id) {
    document.getElementById(`quantity-${id}`).textContent = cart[id].quantity;
}

function updateCartTotal() {
    totalItems = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
    totalPrice = Object.values(cart).reduce((sum, item) => sum + (item.price * item.quantity), 0);
    updateCartPopup();
}

function goToKonfirmasi() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  const formData = new FormData();
  formData.append('cartItems', JSON.stringify(cart));
  formData.append('totalPrice', totalPrice);
  formData.append('_token', csrfToken);

  const form = document.createElement('form');
  form.method = 'post';
  form.action = '/pemesanan/store';

  for (const [key, value] of formData) {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = key;
    input.value = value;
    form.appendChild(input);
  }

  document.body.appendChild(form);
  form.submit();
}
