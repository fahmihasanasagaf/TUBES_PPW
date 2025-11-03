// Home Page Functionality
class HomePage {
    constructor() {
        this.products = [];
        this.cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        this.init();
    }

    init() {
        this.loadProducts();
        this.attachEventListeners();
        this.updateCartCounter();
        this.loadUserData();
    }

    loadUserData() {
        const userName = localStorage.getItem('userName') || 'Pengguna';
        document.getElementById('userName').textContent = userName;
    }

    loadProducts() {
        // Sample products data
        this.products = [
            {
                id: 1,
                name: 'Sofa Modern Minimalis',
                price: 3500000,
                rating: 4.8,
                reviews: 120,
                icon: 'fas fa-couch',
                color: '#8B4513',
                category: 'sofa',
                isWishlist: false,
                badge: ''
            },
            {
                id: 2,
                name: 'Kursi Makan Kayu Jati',
                price: 1250000,
                rating: 4.9,
                reviews: 95,
                icon: 'fas fa-chair',
                color: '#A0522D',
                category: 'kursi',
                isWishlist: false,
                badge: ''
            },
            {
                id: 3,
                name: 'Kasur Spring Bed Premium',
                price: 5800000,
                rating: 5.0,
                reviews: 200,
                icon: 'fas fa-bed',
                color: '#CD853F',
                category: 'kasur',
                isWishlist: false,
                badge: 'Terlaris'
            },
            {
                id: 4,
                name: 'Lemari Pakaian 2 Pintu',
                price: 2800000,
                rating: 4.7,
                reviews: 80,
                icon: 'fas fa-door-open',
                color: '#D2B48C',
                category: 'lemari',
                isWishlist: false,
                badge: ''
            },
            {
                id: 5,
                name: 'Meja Makan Minimalis',
                price: 2200000,
                rating: 4.6,
                reviews: 65,
                icon: 'fas fa-table',
                color: '#8B4513',
                category: 'meja',
                isWishlist: false,
                badge: 'Baru'
            },
            {
                id: 6,
                name: 'Kursi Santai Rotan',
                price: 850000,
                rating: 4.5,
                reviews: 45,
                icon: 'fas fa-chair',
                color: '#D2691E',
                category: 'kursi',
                isWishlist: false,
                badge: ''
            }
        ];

        this.renderProducts();
    }

    renderProducts() {
        const productsGrid = document.getElementById('productsGrid');
        if (!productsGrid) return;

        productsGrid.innerHTML = this.products.map(product => `
            <div class="product-card" data-id="${product.id}">
                <div class="product-image">
                    <i class="${product.icon}" style="font-size: 4rem; color: ${product.color};"></i>
                    <button class="wishlist-btn ${product.isWishlist ? 'active' : ''}" data-id="${product.id}">
                        <i class="${product.isWishlist ? 'fas' : 'far'} fa-heart"></i>
                    </button>
                    ${product.badge ? `<span class="product-badge">${product.badge}</span>` : ''}
                </div>
                <div class="product-info">
                    <h4>${product.name}</h4>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <span>${product.rating} (${product.reviews})</span>
                    </div>
                    <div class="product-price">
                        <span class="price">${this.formatPrice(product.price)}</span>
                        <button class="btn-add-cart" data-id="${product.id}">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    attachEventListeners() {
        // Header icons
        document.getElementById('notificationBtn')?.addEventListener('click', () => this.showNotifications());
        document.getElementById('cartBtn')?.addEventListener('click', () => this.goToCart());

        // Search functionality
        document.getElementById('searchInput')?.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                this.handleSearch();
            }
        });

        // Filter button
        document.getElementById('filterBtn')?.addEventListener('click', () => this.showFilterModal());
        document.getElementById('applyFilter')?.addEventListener('click', () => this.applyFilters());

        // Categories
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', (e) => {
                const category = e.currentTarget.getAttribute('data-category');
                this.filterByCategory(category);
            });
        });

        // See all links
        document.getElementById('seeAllCategories')?.addEventListener('click', (e) => {
            e.preventDefault();
            this.showAllCategories();
        });

        document.getElementById('seeAllProducts')?.addEventListener('click', (e) => {
            e.preventDefault();
            this.showAllProducts();
        });

        // Promo button
        document.getElementById('promoBtn')?.addEventListener('click', () => this.applyPromo());

        // Bottom navigation
        document.getElementById('homeNav')?.addEventListener('click', () => this.navigate('home'));
        document.getElementById('searchNav')?.addEventListener('click', () => this.navigate('search'));
        document.getElementById('cartNav')?.addEventListener('click', () => this.navigate('cart'));
        document.getElementById('profileNav')?.addEventListener('click', () => this.navigate('profile'));

        // Dynamic product events
        this.attachProductEvents();
    }

    attachProductEvents() {
        // Wishlist buttons
        document.addEventListener('click', (e) => {
            if (e.target.closest('.wishlist-btn')) {
                const btn = e.target.closest('.wishlist-btn');
                this.toggleWishlist(btn.dataset.id);
            }

            if (e.target.closest('.btn-add-cart')) {
                const btn = e.target.closest('.btn-add-cart');
                this.addToCart(btn.dataset.id);
            }

            if (e.target.closest('.product-card') && !e.target.closest('.wishlist-btn') && !e.target.closest('.btn-add-cart')) {
                const card = e.target.closest('.product-card');
                this.showProductDetail(card.dataset.id);
            }
        });
    }

    toggleWishlist(productId) {
        const product = this.products.find(p => p.id == productId);
        if (product) {
            product.isWishlist = !product.isWishlist;
            this.renderProducts();
            this.attachProductEvents();
            
            const message = product.isWishlist ? 'Ditambahkan ke wishlist' : 'Dihapus dari wishlist';
            showNotification(message);
        }
    }

    addToCart(productId) {
        const product = this.products.find(p => p.id == productId);
        if (product) {
            const existingItem = this.cartItems.find(item => item.id == productId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                this.cartItems.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    quantity: 1,
                    selected: true,
                    icon: product.icon,
                    color: product.color,
                    variant: 'Standard'
                });
            }
            
            localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
            this.updateCartCounter();
            
            const btn = document.querySelector(`.btn-add-cart[data-id="${productId}"]`);
            if (btn) {
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check"></i>';
                btn.style.background = '#2ed573';
                
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.style.background = '';
                }, 1500);
            }
            
            showNotification(`${product.name} ditambahkan ke keranjang`);
        }
    }

    showProductDetail(productId) {
        const product = this.products.find(p => p.id == productId);
        if (product) {
            showNotification(`Membuka detail: ${product.name}`);
            // Di sini bisa redirect ke halaman detail produk
        }
    }

    handleSearch() {
        const searchTerm = document.getElementById('searchInput').value;
        if (searchTerm.trim()) {
            showNotification(`Mencari: "${searchTerm}"`);
            // Implementasi search logic di sini
        }
    }

    showFilterModal() {
        const modal = new bootstrap.Modal(document.getElementById('filterModal'));
        modal.show();
    }

    applyFilters() {
        const selectedCategories = Array.from(document.querySelectorAll('input[name="category"]:checked'))
            .map(cb => cb.value);
        const priceRange = document.getElementById('priceRange').value;
        const rating = document.querySelector('input[name="rating"]:checked')?.value;

        let message = 'Filter diterapkan: ';
        if (selectedCategories.length > 0) {
            message += `Kategori: ${selectedCategories.join(', ')} `;
        }
        if (priceRange > 0) {
            message += `Harga max: ${this.formatPrice(priceRange)} `;
        }
        if (rating) {
            message += `Rating: ${rating}+ `;
        }

        showNotification(message);
        
        const modal = bootstrap.Modal.getInstance(document.getElementById('filterModal'));
        modal.hide();
    }

    filterByCategory(category) {
        showNotification(`Filter kategori: ${this.getCategoryName(category)}`);
        // Implementasi filter by category di sini
    }

    getCategoryName(category) {
        const categories = {
            'sofa': 'Sofa',
            'kursi': 'Kursi',
            'kasur': 'Kasur',
            'meja': 'Meja',
            'lemari': 'Lemari'
        };
        return categories[category] || category;
    }

    showAllCategories() {
        showNotification('Membuka semua kategori');
        // Redirect ke halaman kategori
    }

    showAllProducts() {
        showNotification('Membuka semua produk');
        // Redirect ke halaman semua produk
    }

    applyPromo() {
        showNotification('Promo diskon 50% diterapkan!');
        // Logic untuk apply promo code
    }

    showNotifications() {
        const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
        modal.show();
    }

    goToCart() {
        window.location.href = 'cart.html';
    }

    navigate(page) {
        switch(page) {
            case 'home':
                // Already on home
                break;
            case 'search':
                document.getElementById('searchInput').focus();
                break;
            case 'cart':
                this.goToCart();
                break;
            case 'profile':
                showNotification('Membuka halaman profil');
                // Redirect ke halaman profil
                break;
        }
    }

    updateCartCounter() {
        const totalItems = this.cartItems.reduce((sum, item) => sum + item.quantity, 0);
        const cartCount = document.getElementById('cartCount');
        if (cartCount) {
            cartCount.textContent = totalItems;
        }
    }

    formatPrice(price) {
        return 'Rp ' + parseInt(price).toLocaleString('id-ID');
    }
}

// Initialize home page when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new HomePage();
    
    // Price range display
    const priceRange = document.getElementById('priceRange');
    const selectedPrice = document.getElementById('selectedPrice');
    
    if (priceRange && selectedPrice) {
        priceRange.addEventListener('input', function() {
            selectedPrice.textContent = 'Rp ' + parseInt(this.value).toLocaleString('id-ID');
        });
    }
});