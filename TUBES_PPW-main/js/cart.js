// Cart functionality
class CartManager {
    constructor() {
        this.cartItems = this.getCartItems();
        this.init();
    }

    init() {
        this.renderCartItems();
        this.attachEventListeners();
        this.calculateTotal();
        this.updateCartCounter();
    }

    getCartItems() {
        // Default cart items jika kosong
        const savedItems = JSON.parse(localStorage.getItem('cartItems'));
        if (savedItems && savedItems.length > 0) {
            return savedItems;
        } else {
            // Sample data untuk demo
            return [
                {
                    id: '1',
                    name: 'Sofa Modern Minimalis',
                    variant: 'Warna: Abu-abu, Ukuran: L',
                    price: 3500000,
                    quantity: 1,
                    selected: true,
                    icon: 'fas fa-couch',
                    color: '#8B4513'
                },
                {
                    id: '2', 
                    name: 'Kursi Makan Kayu Jati',
                    variant: 'Warna: Natural, Set: 4 pcs',
                    price: 1250000,
                    quantity: 2,
                    selected: true,
                    icon: 'fas fa-chair',
                    color: '#A0522D'
                },
                {
                    id: '3',
                    name: 'Meja Makan Kayu Solid', 
                    variant: 'Warna: Coklat, Kapasitas: 6 orang',
                    price: 4200000,
                    quantity: 1,
                    selected: false,
                    icon: 'fas fa-table',
                    color: '#CD853F'
                }
            ];
        }
    }

    saveCartItems() {
        localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
    }

    renderCartItems() {
        const cartContainer = document.querySelector('.cart-items');
        if (!cartContainer) return;

        if (this.cartItems.length === 0) {
            cartContainer.innerHTML = `
                <div class="empty-cart text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Keranjang belanja Anda kosong</p>
                    <button class="btn btn-primary" onclick="location.href='home.html'">Mulai Belanja</button>
                </div>
            `;
            return;
        }

        cartContainer.innerHTML = this.cartItems.map(item => `
            <div class="cart-item" data-id="${item.id}">
                <div class="item-checkbox">
                    <input type="checkbox" class="cart-checkbox" ${item.selected ? 'checked' : ''}>
                </div>
                <div class="item-image">
                    <i class="${item.icon}" style="font-size: 3rem; color: ${item.color};"></i>
                </div>
                <div class="item-details">
                    <h4>${item.name}</h4>
                    <p class="item-variant">${item.variant}</p>
                    <div class="item-bottom">
                        <span class="item-price">${this.formatPrice(item.price)}</span>
                        <div class="quantity-control">
                            <button class="qty-btn minus">-</button>
                            <input type="number" value="${item.quantity}" min="1" readonly>
                            <button class="qty-btn plus">+</button>
                        </div>
                    </div>
                </div>
                <button class="delete-btn">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `).join('');
    }

    attachEventListeners() {
        // Quantity controls
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('qty-btn')) {
                const itemElement = e.target.closest('.cart-item');
                const input = itemElement.querySelector('.quantity-control input');
                let value = parseInt(input.value);
                
                if (e.target.classList.contains('plus')) {
                    value++;
                } else if (e.target.classList.contains('minus') && value > 1) {
                    value--;
                }
                
                input.value = value;
                this.updateItemQuantity(itemElement.dataset.id, value);
            }
        });

        // Delete items
        document.addEventListener('click', (e) => {
            if (e.target.closest('.delete-btn')) {
                const itemElement = e.target.closest('.cart-item');
                this.removeItem(itemElement.dataset.id);
            }
        });

        // Checkboxes
        document.addEventListener('change', (e) => {
            if (e.target.classList.contains('cart-checkbox')) {
                const itemElement = e.target.closest('.cart-item');
                this.toggleItemSelection(itemElement.dataset.id, e.target.checked);
            }
        });

        // Select all
        const selectAll = document.getElementById('selectAll');
        if (selectAll) {
            selectAll.addEventListener('change', (e) => {
                this.toggleSelectAll(e.target.checked);
            });
        }

        // Checkout
        const checkoutBtn = document.querySelector('.btn-checkout');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', () => {
                this.checkout();
            });
        }
    }

    updateItemQuantity(itemId, quantity) {
        const item = this.cartItems.find(item => item.id === itemId);
        if (item) {
            item.quantity = quantity;
            this.saveCartItems();
            this.calculateTotal();
        }
    }

    removeItem(itemId) {
        if (confirm('Hapus item ini dari keranjang?')) {
            this.cartItems = this.cartItems.filter(item => item.id !== itemId);
            this.saveCartItems();
            this.renderCartItems();
            this.calculateTotal();
            this.updateCartCounter();
            showNotification('Item dihapus dari keranjang');
        }
    }

    toggleItemSelection(itemId, selected) {
        const item = this.cartItems.find(item => item.id === itemId);
        if (item) {
            item.selected = selected;
            this.saveCartItems();
            this.calculateTotal();
        }
    }

    toggleSelectAll(selected) {
        this.cartItems.forEach(item => item.selected = selected);
        this.saveCartItems();
        this.renderCartItems();
        this.calculateTotal();
    }

    calculateTotal() {
        const selectedItems = this.cartItems.filter(item => item.selected);
        const subtotal = selectedItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const shipping = selectedItems.length > 0 ? 15000 : 0;
        const total = subtotal + shipping;

        document.querySelectorAll('.subtotal').forEach(el => {
            el.textContent = this.formatPrice(subtotal);
        });
        document.querySelectorAll('.shipping').forEach(el => {
            el.textContent = this.formatPrice(shipping);
        });
        document.querySelectorAll('.total').forEach(el => {
            el.textContent = this.formatPrice(total);
        });

        const checkoutTotal = document.querySelector('.checkout-total');
        if (checkoutTotal) {
            checkoutTotal.textContent = this.formatPrice(total);
        }

        const checkoutBtn = document.querySelector('.btn-checkout');
        if (checkoutBtn) {
            checkoutBtn.disabled = selectedItems.length === 0;
            if (selectedItems.length === 0) {
                checkoutBtn.style.opacity = '0.6';
                checkoutBtn.style.cursor = 'not-allowed';
            } else {
                checkoutBtn.style.opacity = '1';
                checkoutBtn.style.cursor = 'pointer';
            }
        }
    }

    checkout() {
        const selectedItems = this.cartItems.filter(item => item.selected);
        if (selectedItems.length === 0) {
            showNotification('Pilih minimal satu item untuk checkout', 'error');
            return;
        }

        showLoading();
        setTimeout(() => {
            hideLoading();
            showNotification('Checkout berhasil! Pesanan sedang diproses.');
            
            // Remove selected items from cart
            this.cartItems = this.cartItems.filter(item => !item.selected);
            this.saveCartItems();
            this.renderCartItems();
            this.calculateTotal();
            this.updateCartCounter();
        }, 2000);
    }

    formatPrice(price) {
        return 'Rp ' + price.toLocaleString('id-ID');
    }

    updateCartCounter() {
        const totalItems = this.cartItems.reduce((sum, item) => sum + item.quantity, 0);
        const cartBadges = document.querySelectorAll('.badge');
        cartBadges.forEach(badge => {
            const iconBtn = badge.closest('.icon-btn');
            if (iconBtn && iconBtn.querySelector('.fa-shopping-cart')) {
                badge.textContent = totalItems > 0 ? totalItems : '0';
            }
        });
        
        // Save to localStorage for other pages
        localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
    }
}

// Initialize cart when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.cart-items')) {
        new CartManager();
    }
});