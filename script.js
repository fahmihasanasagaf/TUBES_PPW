// Data produk
const products = {
    home: [
        {
            id: 1,
            name: 'Kursi Goyang',
            price: 1450000,
            image: 'https://via.placeholder.com/300x300?text=Kursi+Goyang',
            category: 'kursi',
            popular: true,
            recommended: true
        },
        {
            id: 2,
            name: 'Kursi Santai',
            price: 750000,
            image: 'https://via.placeholder.com/300x300?text=Kursi+Santai',
            category: 'kursi',
            popular: true,
            recommended: true
        },
        {
            id: 3,
            name: 'Ranjang Susun Tingkat',
            price: 2850000,
            image: 'https://via.placeholder.com/300x300?text=Ranjang+Susun',
            category: 'ranjang',
            popular: false,
            recommended: true
        },
        {
            id: 4,
            name: 'Ranjang Modern',
            price: 3950000,
            image: 'https://via.placeholder.com/300x300?text=Ranjang+Modern',
            category: 'ranjang',
            popular: true,
            recommended: false
        },
        {
            id: 5,
            name: 'Laci Modern Retro',
            price: 1350000,
            image: 'https://via.placeholder.com/300x300?text=Laci+Retro',
            category: 'meja',
            popular: true,
            recommended: true
        },
        {
            id: 6,
            name: 'Buffet Jati Laci',
            price: 2650000,
            image: 'https://via.placeholder.com/300x300?text=Buffet+Jati',
            category: 'meja',
            popular: false,
            recommended: false
        },
        {
            id: 7,
            name: 'Sofa Metal Feet',
            price: 2950000,
            image: 'https://via.placeholder.com/300x300?text=Sofa+Metal',
            category: 'sofa',
            popular: true,
            recommended: true
        },
        {
            id: 8,
            name: 'Lorenz Seater Sofa',
            price: 4250000,
            image: 'https://via.placeholder.com/300x300?text=Sofa+Lorenz',
            category: 'sofa',
            popular: false,
            recommended: true
        }
    ],
    kursi: [
        {
            id: 1,
            name: 'Kursi Kayu Jati',
            price: 400000,
            image: 'https://via.placeholder.com/300x300?text=Kursi+Kayu+Jati',
            description: 'Kursi Kayu Jati Elegan terbuat dari kayu jati berkualitas tinggi yang terkenal akan kekuatan dan ketahanannya.'
        },
        {
            id: 2,
            name: 'Kursi Rotan',
            price: 650000,
            image: 'https://via.placeholder.com/300x300?text=Kursi+Rotan',
            description: 'Kursi rotan dengan anyaman berkualitas tinggi yang kuat dan fleksibel.'
        },
        {
            id: 3,
            name: 'Kursi Ergonomis',
            price: 550000,
            image: 'https://via.placeholder.com/300x300?text=Kursi+Ergonomis',
            description: 'Kursi desain ergonomis yang dirancang khusus untuk kenyamanan duduk dalam waktu lama.'
        }
    ],
    sofa: [
        {
            id: 1,
            name: 'Sofa Santai',
            price: 450000,
            image: 'https://via.placeholder.com/300x300?text=Sofa+Santai',
            description: 'Sofa santai dengan desain minimalis dan nyaman untuk ruang keluarga.'
        },
        {
            id: 2,
            name: 'Sofa Metal Feet',
            price: 850000,
            image: 'https://via.placeholder.com/300x300?text=Sofa+Metal+Feet',
            description: 'Sofa modern dengan kaki metal yang kokoh dan stabil.'
        },
        {
            id: 3,
            name: 'Lorenz Seater Sofa',
            price: 950000,
            image: 'https://via.placeholder.com/300x300?text=Sofa+Lorenz',
            description: 'Sofa 3 seater dengan desain klasik elegan dan bantalan duduk extra tebal.'
        }
    ],
    meja: [
        {
            id: 1,
            name: 'Laci Modern Retro',
            price: 450000,
            image: 'https://via.placeholder.com/300x300?text=Laci+Retro',
            description: 'Laci modern dengan desain retro yang unik dan eye-catching.'
        },
        {
            id: 2,
            name: 'Buffet Jati Laci',
            price: 750000,
            image: 'https://via.placeholder.com/300x300?text=Buffet+Jati',
            description: 'Buffet kayu jati dengan 6 laci yang luas dan fungsional.'
        },
        {
            id: 3,
            name: 'Meja Kerja Minimalis',
            price: 550000,
            image: 'https://via.placeholder.com/300x300?text=Meja+Kerja',
            description: 'Meja kerja dengan desain minimalis modern yang cocok untuk home office.'
        }
    ],
    ranjang: [
        {
            id: 1,
            name: 'Ranjang Modern',
            price: 850000,
            image: 'https://via.placeholder.com/300x300?text=Ranjang+Modern',
            description: 'Ranjang dengan desain modern minimalis yang cocok untuk kamar tidur kontemporer.'
        },
        {
            id: 2,
            name: 'Ranjang Susun Tingkat',
            price: 1200000,
            image: 'https://via.placeholder.com/300x300?text=Ranjang+Susun',
            description: 'Ranjang susun tingkat yang praktis dan space-saving.'
        },
        {
            id: 3,
            name: 'Ranjang Minimalis',
            price: 650000,
            image: 'https://via.placeholder.com/300x300?text=Ranjang+Minimalis',
            description: 'Ranjang minimalis dengan desain simpel dan fungsional.'
        }
    ]
};

// Data riwayat pesanan
const orderHistory = [
    {
        id: 1,
        productName: 'Kursi Santai',
        price: 750000,
        image: 'https://via.placeholder.com/300x300?text=Kursi+Santai',
        orderDate: '2024-01-15',
        status: 'completed',
        statusText: 'Selesai'
    },
    {
        id: 2,
        productName: 'Sofa Metal Feet',
        price: 2950000,
        image: 'https://via.placeholder.com/300x300?text=Sofa+Metal',
        orderDate: '2024-01-10',
        status: 'shipped',
        statusText: 'Dikirim'
    },
    {
        id: 3,
        productName: 'Laci Modern Retro',
        price: 1350000,
        image: 'https://via.placeholder.com/300x300?text=Laci+Retro',
        orderDate: '2024-01-05',
        status: 'packed',
        statusText: 'Dikemas'
    },
    {
        id: 4,
        productName: 'Ranjang Modern',
        price: 3950000,
        image: 'https://via.placeholder.com/300x300?text=Ranjang+Modern',
        orderDate: '2024-01-01',
        status: 'unpaid',
        statusText: 'Belum Bayar'
    }
];

// Data notifikasi
const notifications = [
    {
        id: 1,
        title: 'Voucher 50% menunggumu',
        message: 'Jangan lewatkan promo eksklusif hari ini',
        time: '10:30 AM',
        date: '2024-01-15',
        read: false
    },
    {
        id: 2,
        title: 'Gratis Ongkir',
        message: 'Yuk checkout sekarang juga...',
        time: '09:15 AM',
        date: '2024-01-14',
        read: true
    },
    {
        id: 3,
        title: 'Pesanan Anda telah dikirim',
        message: 'Pesanan #12345 sedang dalam perjalanan',
        time: '14:20 PM',
        date: '2024-01-13',
        read: true
    }
];

// Data profil pengguna
let userProfile = {
    name: 'fahmi',
    phone: '081234567891',
    email: 's****2@gmail.com'
};

// Keranjang belanja
let cart = [];
let selectedPayment = '';
let currentCategory = '';
let currentOrderTab = 'all';
let currentEditField = '';

// Format harga ke format Rupiah
function formatPrice(price) {
    return 'Rp ' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Animasi hover untuk welcome screen
function hoverCard(element) {
    element.style.transform = 'scale(1.05)';
    element.style.boxShadow = '0 15px 20px rgba(0,0,0,0.2)';
}

function unhoverCard(element) {
    element.style.transform = 'scale(1)';
    element.style.boxShadow = '0 6px 15px rgba(0,0,0,0.15)';
}

// Tampilkan screen tertentu
function showScreen(screenId) {
    // Sembunyikan semua screen
    document.querySelectorAll('.screen').forEach(screen => {
        screen.classList.remove('active');
    });
    
    // Update bottom navigation
    document.querySelectorAll('.bottom-nav-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Aktifkan screen yang dipilih
    document.getElementById(screenId).classList.add('active');
    
    // Jika menampilkan home screen, muat produk
    if (screenId === 'home-screen') {
        loadHomeProducts();
        document.querySelector('.bottom-nav-item:nth-child(1)').classList.add('active');
    }
    
    // Jika menampilkan cart screen, muat keranjang
    if (screenId === 'cart-screen') {
        loadCart();
        document.querySelector('.bottom-nav-item:nth-child(2)').classList.add('active');
    }
    
    // Jika menampilkan profile screen, muat profil
    if (screenId === 'profile-screen') {
        loadProfile();
        document.querySelector('.bottom-nav-item:nth-child(4)').classList.add('active');
    }
    
    // Jika menampilkan notification screen, muat notifikasi
    if (screenId === 'notification-screen') {
        loadNotifications();
        document.querySelector('.bottom-nav-item:nth-child(3)').classList.add('active');
    }
    
    // Jika menampilkan checkout screen, muat checkout
    if (screenId === 'checkout-screen') {
        loadCheckout();
    }
    
    // Jika menampilkan order history screen, muat riwayat pesanan
    if (screenId === 'order-history-screen') {
        loadOrderHistory();
    }
}

// Muat produk di home screen
function loadHomeProducts(filteredProducts = null) {
    const productsGrid = document.getElementById('products-grid');
    productsGrid.innerHTML = '';
    
    const productsToShow = filteredProducts || products.home;
    
    if (productsToShow.length === 0) {
        productsGrid.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <p>Produk tidak ditemukan</p>
            </div>
        `;
        return;
    }
    
    productsToShow.forEach(product => {
        const productCard = `
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}" class="product-image w-100">
                    <div class="p-3">
                        <h6 class="fw-bold">${product.name}</h6>
                        <p class="text-primary fw-bold mb-2">${formatPrice(product.price)}</p>
                        <button class="btn btn-primary-custom w-100" onclick="addToCart(${product.id})">+ Keranjang</button>
                    </div>
                </div>
            </div>
        `;
        productsGrid.innerHTML += productCard;
    });
}

// Filter produk berdasarkan kategori
function filterProducts(filter) {
    let filteredProducts = [];
    
    switch(filter) {
        case 'all':
            filteredProducts = products.home;
            break;
        case 'popular':
            filteredProducts = products.home.filter(product => product.popular);
            break;
        case 'recommended':
            filteredProducts = products.home.filter(product => product.recommended);
            break;
    }
    
    loadHomeProducts(filteredProducts);
}

// Pencarian produk
function searchProducts() {
    const searchTerm = document.getElementById('search-input').value.toLowerCase();
    
    if (searchTerm === '') {
        loadHomeProducts();
        return;
    }
    
    const filteredProducts = products.home.filter(product => 
        product.name.toLowerCase().includes(searchTerm)
    );
    
    loadHomeProducts(filteredProducts);
}

// Tampilkan kategori produk
function showCategory(category) {
    currentCategory = category;
    const categoryTitle = document.getElementById('category-title');
    
    // Set judul kategori
    switch(category) {
        case 'kursi':
            categoryTitle.textContent = 'KURSI';
            break;
        case 'sofa':
            categoryTitle.textContent = 'SOFA';
            break;
        case 'meja':
            categoryTitle.textContent = 'MEJA';
            break;
        case 'ranjang':
            categoryTitle.textContent = 'RANJANG';
            break;
    }
    
    // Muat produk kategori
    loadCategoryProducts(category);
    
    // Tampilkan screen kategori
    showScreen('category-screen');
}

// Muat produk berdasarkan kategori
function loadCategoryProducts(category) {
    const productsContainer = document.getElementById('category-products');
    productsContainer.innerHTML = '';
    
    products[category].forEach(product => {
        const productCard = `
            <div class="col-6 mb-3">
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}" class="product-image w-100">
                    <div class="p-2">
                        <h6 class="fw-bold">${product.name}</h6>
                        <p class="text-primary fw-bold mb-2">${formatPrice(product.price)}</p>
                        <button class="btn btn-primary-custom w-100" onclick="addToCart(${product.id})">+ Keranjang</button>
                    </div>
                </div>
            </div>
        `;
        productsContainer.innerHTML += productCard;
    });
}

// Tampilkan produk promo
function showPromoProducts() {
    // Filter produk yang memiliki diskon (contoh: harga di bawah 1 juta)
    const promoProducts = products.home.filter(product => product.price < 1000000);
    loadHomeProducts(promoProducts);
    showScreen('home-screen');
}

// Login dengan sosial media
function socialLogin(provider) {
    alert(`Login dengan ${provider} berhasil!`);
    showScreen('home-screen');
}

// Verifikasi kode OTP
function verifyCode() {
    alert('Kode berhasil diverifikasi!');
    showScreen('home-screen');
}

// Tambah produk ke keranjang
function addToCart(productId) {
    // Cari produk dari semua kategori
    let product = null;
    for (const category in products) {
        product = products[category].find(p => p.id === productId);
        if (product) break;
    }
    
    if (product) {
        // Cek apakah produk sudah ada di keranjang
        const existingItem = cart.find(item => item.id === productId);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                ...product,
                quantity: 1,
                isSelected: true
            });
        }
        
        // Tampilkan notifikasi
        showAlert(`${product.name} ditambahkan ke keranjang`, 'success');
        
        // Perbarui tampilan keranjang jika sedang dibuka
        if (document.getElementById('cart-screen').classList.contains('active')) {
            loadCart();
        }
    }
}

// Muat keranjang
function loadCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    cartItems.innerHTML = '';
    
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <p>Keranjang belanja Anda kosong</p>
            </div>
        `;
        cartTotal.textContent = 'Rp 0';
        return;
    }
    
    let total = 0;
    
    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += item.isSelected ? itemTotal : 0;
        
        const cartItem = `
            <div class="cart-item">
                <div class="d-flex align-items-center">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" ${item.isSelected ? 'checked' : ''} 
                               onchange="toggleCartItem(${index}, this.checked)">
                    </div>
                    <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    <div class="flex-grow-1">
                        <h6 class="mb-1">${item.name}</h6>
                        <p class="text-muted mb-1">${formatPrice(item.price)}</p>
                        <div class="quantity-controls">
                            <button class="quantity-btn" onclick="decreaseQuantity(${index})">-</button>
                            <span class="quantity-display mx-2">${item.quantity}</span>
                            <button class="quantity-btn" onclick="increaseQuantity(${index})">+</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        cartItems.innerHTML += cartItem;
    });
    
    cartTotal.textContent = formatPrice(total);
}

// Kurangi jumlah produk di keranjang
function decreaseQuantity(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity -= 1;
        loadCart();
    } else {
        // Hapus item jika quantity 0
        cart.splice(index, 1);
        loadCart();
    }
}

// Tambah jumlah produk di keranjang
function increaseQuantity(index) {
    cart[index].quantity += 1;
    loadCart();
}

// Toggle pilihan item di keranjang
function toggleCartItem(index, isSelected) {
    cart[index].isSelected = isSelected;
    loadCart();
}

// Toggle semua item di keranjang
function toggleSelectAll(isSelected) {
    cart.forEach(item => {
        item.isSelected = isSelected;
    });
    loadCart();
}

// Muat checkout
function loadCheckout() {
    const checkoutProducts = document.getElementById('checkout-products');
    const subtotalEl = document.getElementById('subtotal');
    const totalPaymentEl = document.getElementById('total-payment');
    
    checkoutProducts.innerHTML = '';
    
    let subtotal = 0;
    const selectedItems = cart.filter(item => item.isSelected);
    
    if (selectedItems.length === 0) {
        checkoutProducts.innerHTML = `
            <div class="text-center py-3">
                <p class="text-muted">Tidak ada produk yang dipilih</p>
            </div>
        `;
        subtotalEl.textContent = 'Rp 0';
        totalPaymentEl.textContent = 'Rp 0';
        return;
    }
    
    selectedItems.forEach(item => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;
        
        const productItem = `
            <div class="d-flex align-items-start mb-3">
                <img src="${item.image}" alt="${item.name}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">${item.name}</h6>
                    <p class="text-primary fw-bold mb-1">${formatPrice(item.price)}</p>
                </div>
                <span class="text-muted">X${item.quantity}</span>
            </div>
        `;
        checkoutProducts.innerHTML += productItem;
    });
    
    // Tambah total produk
    const totalItems = selectedItems.reduce((sum, item) => sum + item.quantity, 0);
    checkoutProducts.innerHTML += `
        <div class="d-flex justify-content-between mt-3 pt-3 border-top">
            <span>Total ${totalItems} Produk</span>
            <span>${formatPrice(subtotal)}</span>
        </div>
    `;
    
    subtotalEl.textContent = formatPrice(subtotal);
    totalPaymentEl.textContent = formatPrice(subtotal); // Asumsi biaya pengiriman 0
}

// Pilih metode pembayaran
function selectPayment(method) {
    selectedPayment = method;
    
    // Reset semua circle
    document.querySelectorAll('.payment-circle').forEach(circle => {
        circle.style.backgroundColor = '';
        circle.style.borderColor = '#ccc';
    });
    
    // Set circle yang dipilih
    const selectedCircle = document.getElementById(`${method}-circle`);
    selectedCircle.style.backgroundColor = '#2196F3';
    selectedCircle.style.borderColor = '#2196F3';
}

// Proses pembayaran
function processPayment() {
    const selectedItems = cart.filter(item => item.isSelected);
    
    if (selectedItems.length === 0) {
        showAlert('Pilih setidaknya satu produk untuk checkout', 'error');
        return;
    }
    
    if (!selectedPayment) {
        showAlert('Pilih metode pembayaran terlebih dahulu', 'error');
        return;
    }
    
    // Tampilkan screen pembayaran berhasil
    showScreen('payment-success-screen');
    
    // Kosongkan keranjang untuk item yang dipilih
    cart = cart.filter(item => !item.isSelected);
}

// Tampilkan riwayat pesanan
function showOrderHistory(status = 'all') {
    currentOrderTab = status;
    showScreen('order-history-screen');
    loadOrderHistory();
}

// Muat riwayat pesanan
function loadOrderHistory() {
    const orderContent = document.getElementById('order-history-content');
    orderContent.innerHTML = '';
    
    let filteredOrders = orderHistory;
    
    // Filter berdasarkan status jika bukan 'all'
    if (currentOrderTab !== 'all') {
        filteredOrders = orderHistory.filter(order => order.status === currentOrderTab);
    }
    
    if (filteredOrders.length === 0) {
        orderContent.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-shopping-bag"></i>
                <p>Belum ada pesanan</p>
            </div>
        `;
        return;
    }
    
    filteredOrders.forEach(order => {
        let statusClass = '';
        switch(order.status) {
            case 'unpaid':
                statusClass = 'status-unpaid';
                break;
            case 'packed':
                statusClass = 'status-packed';
                break;
            case 'shipped':
                statusClass = 'status-shipped';
                break;
            case 'completed':
                statusClass = 'status-rated';
                break;
        }
        
        const orderItem = `
            <div class="order-item">
                <div class="d-flex align-items-start">
                    <img src="${order.image}" alt="${order.productName}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">${order.productName}</h6>
                        <p class="text-primary fw-bold mb-1">${formatPrice(order.price)}</p>
                        <p class="text-muted small mb-1">Order: ${order.orderDate}</p>
                    </div>
                    <div class="order-status-badge ${statusClass}">
                        ${order.statusText}
                    </div>
                </div>
            </div>
        `;
        orderContent.innerHTML += orderItem;
    });
}

// Switch tab riwayat pesanan
function switchOrderTab(tab) {
    currentOrderTab = tab;
    loadOrderHistory();
}

// Muat notifikasi
function loadNotifications() {
    const notificationList = document.getElementById('notification-list');
    notificationList.innerHTML = '';
    
    if (notifications.length === 0) {
        notificationList.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-bell"></i>
                <p>Tidak ada notifikasi</p>
            </div>
        `;
        return;
    }
    
    notifications.forEach(notification => {
        const notificationItem = `
            <div class="notification-item ${notification.read ? '' : 'unread'}">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5 class="mb-1">${notification.title}</h5>
                        <p class="mb-1">${notification.message}</p>
                        <div class="notification-time">${notification.time} • ${notification.date}</div>
                    </div>
                    ${!notification.read ? '<span class="badge bg-primary">Baru</span>' : ''}
                </div>
            </div>
        `;
        notificationList.innerHTML += notificationItem;
    });
}

// Muat profil
function loadProfile() {
    document.getElementById('profile-name').textContent = `Nama ${userProfile.name}`;
    document.getElementById('profile-phone').textContent = `No.Handphone ${userProfile.phone.substring(0, 2)}******${userProfile.phone.substring(userProfile.phone.length - 2)}`;
    document.getElementById('profile-email').textContent = `Email ${userProfile.email.substring(0, 1)}****${userProfile.email.substring(userProfile.email.indexOf('@'))}`;
}

// Edit profil
function editProfile(field) {
    currentEditField = field;
    const modal = new bootstrap.Modal(document.getElementById('editProfileModal'));
    
    let fieldLabel = '';
    let currentValue = '';
    
    switch(field) {
        case 'name':
            fieldLabel = 'Nama';
            currentValue = userProfile.name;
            break;
        case 'phone':
            fieldLabel = 'No. Handphone';
            currentValue = userProfile.phone;
            break;
        case 'email':
            fieldLabel = 'Email';
            currentValue = userProfile.email;
            break;
    }
    
    document.getElementById('editProfileModalTitle').textContent = `Edit ${fieldLabel}`;
    document.getElementById('editFieldLabel').textContent = fieldLabel;
    document.getElementById('editFieldInput').value = currentValue;
    
    modal.show();
}

// Simpan field profil
function saveProfileField() {
    const newValue = document.getElementById('editFieldInput').value;
    
    if (!newValue) {
        showAlert('Field tidak boleh kosong', 'error');
        return;
    }
    
    userProfile[currentEditField] = newValue;
    
    // Tutup modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
    modal.hide();
    
    // Perbarui tampilan profil
    loadProfile();
    
    showAlert(`${currentEditField === 'name' ? 'Nama' : currentEditField === 'phone' ? 'No. Handphone' : 'Email'} berhasil diubah`, 'success');
}

// Simpan profil
function saveProfile() {
    showAlert('Profil berhasil disimpan', 'success');
}

// Tampilkan Beli Lagi
function showBuyAgain() {
    // Filter produk yang pernah dibeli (contoh: produk dengan ID 1, 2, 3)
    const buyAgainProducts = products.home.filter(product => [1, 2, 3].includes(product.id));
    loadBuyAgainProducts(buyAgainProducts);
    showScreen('buy-again-screen');
}

// Muat produk Beli Lagi
function loadBuyAgainProducts(productsList) {
    const buyAgainContainer = document.getElementById('buy-again-products');
    buyAgainContainer.innerHTML = '';
    
    productsList.forEach(product => {
        const productCard = `
            <div class="col-6 mb-3">
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}" class="product-image w-100">
                    <div class="p-2">
                        <h6 class="fw-bold">${product.name}</h6>
                        <p class="text-primary fw-bold mb-2">${formatPrice(product.price)}</p>
                        <button class="btn btn-primary-custom w-100" onclick="addToCart(${product.id})">+ Keranjang</button>
                    </div>
                </div>
            </div>
        `;
        buyAgainContainer.innerHTML += productCard;
    });
}

// Tampilkan Favorit
function showFavorites() {
    // Filter produk favorit (contoh: produk dengan ID 4, 5, 6)
    const favoriteProducts = products.home.filter(product => [4, 5, 6].includes(product.id));
    loadFavoriteProducts(favoriteProducts);
    showScreen('favorites-screen');
}

// Muat produk Favorit
function loadFavoriteProducts(productsList) {
    const favoritesContainer = document.getElementById('favorites-products');
    favoritesContainer.innerHTML = '';
    
    productsList.forEach(product => {
        const productCard = `
            <div class="col-6 mb-3">
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}" class="product-image w-100">
                    <div class="p-2">
                        <h6 class="fw-bold">${product.name}</h6>
                        <p class="text-primary fw-bold mb-2">${formatPrice(product.price)}</p>
                        <button class="btn btn-primary-custom w-100" onclick="addToCart(${product.id})">+ Keranjang</button>
                    </div>
                </div>
            </div>
        `;
        favoritesContainer.innerHTML += productCard;
    });
}

// Kirim pesan customer service
function sendCustomerMessage() {
    const problem = document.getElementById('problem-select').value;
    const message = document.getElementById('customer-message').value;
    
    if (!problem) {
        showAlert('Silakan pilih jenis kendala', 'error');
        return;
    }
    
    if (!message) {
        showAlert('Silakan tulis pesan', 'error');
        return;
    }
    
    // Reset form
    document.getElementById('problem-select').value = '';
    document.getElementById('customer-message').value = '';
    
    showAlert('Pesan terkirim ke Customer Service', 'success');
}

// Tampilkan alert
function showAlert(message, type) {
    // Buat elemen alert
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'error' ? 'danger' : 'success'} alert-dismissible fade show position-fixed`;
    alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 1050; min-width: 300px;';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Tambahkan ke body
    document.body.appendChild(alertDiv);
    
    // Hapus otomatis setelah 3 detik
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.parentNode.removeChild(alertDiv);
        }
    }, 3000);
}

// Event listener untuk form login
document.getElementById('login-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    showScreen('verify-screen');
});

// Event listener untuk form register
document.getElementById('register-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    showScreen('verify-screen');
});

// Event listener untuk input verifikasi OTP
document.querySelectorAll('.verification-input').forEach((input, index, inputs) => {
    input.addEventListener('input', function() {
        if (this.value.length === 1 && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
    });
    
    input.addEventListener('keydown', function(e) {
        if (e.key === 'Backspace' && this.value.length === 0 && index > 0) {
            inputs[index - 1].focus();
        }
    });
});

// Inisialisasi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    loadHomeProducts();
    loadProfile();
});