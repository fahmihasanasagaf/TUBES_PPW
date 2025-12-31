// Data produk
const products = {
    home: [
        {
            id: 1,
            name: 'Kursi Goyang',
            price: 1450000,
            image: 'assets/images/kursigoyang.jpeg',
            category: 'kursi',
            popular: true,
            recommended: true
        },
        {
            id: 2,
            name: 'Kursi Santai',
            price: 750000,
            image: 'assets/images/kursisantai.jpeg',
            category: 'kursi',
            popular: true,
            recommended: true
        },
        {
            id: 3,
            name: 'Ranjang Susun Tingkat',
            price: 2850000,
            image: 'assets/images/dan3.jpg',
            category: 'ranjang',
            popular: false,
            recommended: true
        },
        {
            id: 4,
            name: 'Ranjang Modern',
            price: 3950000,
            image: 'assets/images/ranjang minimalis.jpeg',
            category: 'ranjang',
            popular: true,
            recommended: false
        },
        {
            id: 5,
            name: 'Laci Modern Retro',
            price: 1350000,
            image: 'assets/images/laci meja.jpg',
            category: 'meja',
            popular: true,
            recommended: true
        },
        {
            id: 6,
            name: 'Buffet Jati Laci',
            price: 2650000,
            image: 'assets/images/dan6.jpg',
            category: 'meja',
            popular: false,
            recommended: false
        },
        {
            id: 7,
            name: 'Sofa Metal Feet',
            price: 2950000,
            image: 'assets/images/dan8.jpg',
            category: 'sofa',
            popular: true,
            recommended: true
        },
        {
            id: 8,
            name: 'Lorenz Seater Sofa',
            price: 4250000,
            image: 'assets/images/dan7.jpg',
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
            image: 'assets/images/kursikayujati.jpeg',
            description: 'Kursi Kayu Jati Elegan terbuat dari kayu jati berkualitas tinggi yang terkenal akan kekuatan dan ketahanannya.'
        },
        {
            id: 2,
            name: 'Kursi Rotan',
            price: 650000,
            image: 'assets/images/kursirotan.jpeg',
            description: 'Kursi rotan dengan anyaman berkualitas tinggi yang kuat dan fleksibel.'
        },
        {
            id: 3,
            name: 'Kursi Ergonomis',
            price: 550000,
            image: 'assets/images/Kursi.png',
            description: 'Kursi desain ergonomis yang dirancang khusus untuk kenyamanan duduk dalam waktu lama.'
        },
        {
            id: 4,
            name: 'Kursi Goyang',
            price: 1450000,
            image: 'assets/images/kursigoyang.jpeg',    
            description: 'Kursi goyang klasik dengan desain elegan dan nyaman untuk bersantai.'

        },
        {
            id: 5,
            name: 'Kursi Santai',
            price: 750000,
            image: 'assets/images/kursisantai.jpeg',
            description: 'Kursi santai dengan bantalan empuk dan desain modern yang cocok untuk ruang tamu.'
        },
        {
            id: 6,
            name: 'Kursi Kayu Mahoni',
            price: 850000,
            image: 'assets/images/kursikayumahoni.jpeg',
            description: 'Kursi kayu mahoni dengan finishing halus dan desain klasik yang menawan.'
        },
        {
            id: 7,
            name: 'Elbow Chair ',
            price: 950000,
            image: 'assets/images/Elbow Chair.jpeg',
            description: 'Kursi elbow chair dengan sandaran tangan yang nyaman dan desain minimalis.'
        },

    ],
    sofa: [
        {
            id: 1,
            name: 'Sofa Santai',
            price: 450000,
            image: 'assets/images/sofasantai.jpeg',
            description: 'Sofa santai dengan desain minimalis dan nyaman untuk ruang keluarga.'
        },
        {
            id: 2,
            name: 'Sofa Metal Feet',
            price: 850000,
            image: 'assets/images/dan8.jpg',
            description: 'Sofa modern dengan kaki metal yang kokoh dan stabil.'
        },
        {
            id: 3,
            name: 'Lorenz Seater Sofa',
            price: 950000,
            image: 'assets/images/dan7.jpg',
            description: 'Sofa 3 seater dengan desain klasik elegan dan bantalan duduk extra tebal.'
        }
    ],
    meja: [
        {
            id: 1,
            name: 'Laci Modern Retro',
            price: 450000,
            image: 'assets/images/laci meja.jpg',
            description: 'Laci modern dengan desain retro yang unik dan eye-catching.'
        },
        {
            id: 2,
            name: 'Buffet Jati Laci',
            price: 750000,
            image: 'assets/images/dan6.jpg',
            description: 'Buffet kayu jati dengan 6 laci yang luas dan fungsional.'
        },
        {
            id: 3,
            name: 'Meja Kerja Minimalis',
            price: 550000,
            image: 'assets/images/meja kerja minimalis.jpeg',
            description: 'Meja kerja dengan desain minimalis modern yang cocok untuk home office.'
        }
    ],
    ranjang: [
        {
            id: 1,
            name: 'Ranjang Modern',
            price: 850000,
            image: 'assets/images/ranjang minimalis.jpeg',
            description: 'Ranjang dengan desain modern minimalis yang cocok untuk kamar tidur kontemporer.'
        },
        {
            id: 2,
            name: 'Ranjang Susun Tingkat',
            price: 1200000,
            image: 'assets/images/dan3.jpg',
            description: 'Ranjang susun tingkat yang praktis dan space-saving.'
        },
        {
            id: 3,
            name: 'Ranjang Minimalis',
            price: 650000,
            image: 'assets/images/dan4.jpg',
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
        image: 'assets/images/kursisantai.jpeg',
        orderDate: '2024-01-15',
        status: 'completed',
        statusText: 'Selesai'
    },
    {
        id: 2,
        productName: 'Sofa Metal Feet',
        price: 2950000,
        image: 'assets/images/dan8.jpg',
        orderDate: '2024-01-10',
        status: 'shipped',
        statusText: 'Dikirim'
    },
    {
        id: 3,
        productName: 'Laci Modern Retro',
        price: 1350000,
        image: 'assets/images/laci meja.jpg',
        orderDate: '2024-01-05',
        status: 'packed',
        statusText: 'Dikemas'
    },
    {
        id: 4,
        productName: 'Ranjang Modern',
        price: 3950000,
        image: 'assets/images/ranjang minimalis.jpeg',
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
let cart = JSON.parse(localStorage.getItem('cart')) || [];
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

// Simpan keranjang ke localStorage
function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Muat produk di home screen
function loadHomeProducts(filteredProducts = null) {
    const productsGrid = document.getElementById('products-grid');
    if (!productsGrid) return;
    
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
                <div class="product-card" onclick="goToProductDetail(${product.id})" style="cursor: pointer;">
                    <img src="${product.image}" alt="${product.name}" class="product-image w-100">
                    <div class="p-3">
                        <h6 class="fw-bold">${product.name}</h6>
                        <p class="text-primary fw-bold mb-2">${formatPrice(product.price)}</p>
                        <button class="btn btn-primary-custom w-100" onclick="event.stopPropagation(); addToCart(${product.id})">+ Keranjang</button>
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

// Muat produk berdasarkan kategori
function loadCategoryProducts(category) {
    const productsContainer = document.getElementById('category-products');
    if (!productsContainer) return;
    
    productsContainer.innerHTML = '';
    
    products[category].forEach(product => {
        const productCard = `
            <div class="col-6 mb-3">
                <div class="product-card" onclick="goToProductDetail(${product.id})" style="cursor: pointer;">
                    <img src="${product.image}" alt="${product.name}" class="product-image w-100">
                    <div class="p-2">
                        <h6 class="fw-bold">${product.name}</h6>
                        <p class="text-primary fw-bold mb-2">${formatPrice(product.price)}</p>
                        <button class="btn btn-primary-custom w-100" onclick="event.stopPropagation(); addToCart(${product.id})">+ Keranjang</button>
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
}

// Login dengan sosial media
function socialLogin(provider) {
    alert(`Login dengan ${provider} berhasil!`);
    window.location.href = 'home.html';
}

// Verifikasi kode OTP
function verifyCode() {
    alert('Kode berhasil diverifikasi!');
    window.location.href = 'home.html';
}
//detail produk
function productDetail(productId) {
    window.location.href = `product-detail.html?id=${productId}`;
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
        
        // Simpan ke localStorage
        saveCartToLocalStorage();
        
        // Tampilkan notifikasi
        showAlert(`${product.name} ditambahkan ke keranjang`, 'success');
        
        // Perbarui tampilan keranjang jika sedang dibuka
        if (window.location.pathname.includes('cart.html')) {
            loadCart();
        }
    }
}

// Muat keranjang
function loadCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    if (!cartItems) return;
    
    cartItems.innerHTML = '';
    
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <p>Keranjang belanja Anda kosong</p>
            </div>
        `;
        if (cartTotal) cartTotal.textContent = 'Rp 0';
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
    
    if (cartTotal) cartTotal.textContent = formatPrice(total);
}

// Kurangi jumlah produk di keranjang
function decreaseQuantity(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity -= 1;
    } else {
        // Hapus item jika quantity 0
        cart.splice(index, 1);
    }
    saveCartToLocalStorage();
    loadCart();
}

// Tambah jumlah produk di keranjang
function increaseQuantity(index) {
    cart[index].quantity += 1;
    saveCartToLocalStorage();
    loadCart();
}

// Toggle pilihan item di keranjang
function toggleCartItem(index, isSelected) {
    cart[index].isSelected = isSelected;
    saveCartToLocalStorage();
    loadCart();
}

// Toggle semua item di keranjang
function toggleSelectAll(isSelected) {
    cart.forEach(item => {
        item.isSelected = isSelected;
    });
    saveCartToLocalStorage();
    loadCart();
}

// Muat checkout
function loadCheckout() {
    const checkoutProducts = document.getElementById('checkout-products');
    const subtotalEl = document.getElementById('subtotal');
    const totalPaymentEl = document.getElementById('total-payment');
    
    if (!checkoutProducts) return;
    
    checkoutProducts.innerHTML = '';
    
    let subtotal = 0;
    const selectedItems = cart.filter(item => item.isSelected);
    
    if (selectedItems.length === 0) {
        checkoutProducts.innerHTML = `
            <div class="text-center py-3">
                <p class="text-muted">Tidak ada produk yang dipilih</p>
            </div>
        `;
        if (subtotalEl) subtotalEl.textContent = 'Rp 0';
        if (totalPaymentEl) totalPaymentEl.textContent = 'Rp 0';
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
    
    if (subtotalEl) subtotalEl.textContent = formatPrice(subtotal);
    if (totalPaymentEl) totalPaymentEl.textContent = formatPrice(subtotal);
}

// Pilih metode pembayaran utama
function selectPayment(method) {
    selectedPayment = method;
    
    // Reset semua circle utama
    document.querySelectorAll('.payment-circle').forEach(circle => {
        circle.style.backgroundColor = '';
        circle.style.borderColor = '#ccc';
    });
    
    // Set circle yang dipilih
    const selectedCircle = document.getElementById(`${method}-circle`);
    if (selectedCircle) {
        selectedCircle.style.backgroundColor = '#2196F3';
        selectedCircle.style.borderColor = '#2196F3';
    }
    
    // Sembunyikan semua opsi pembayaran
    const bankOptions = document.getElementById('bank-options');
    const ewalletOptions = document.getElementById('ewallet-options');
    
    if (bankOptions) bankOptions.style.display = 'none';
    if (ewalletOptions) ewalletOptions.style.display = 'none';
    
    // Reset pilihan bank/ewallet sebelumnya
    document.querySelectorAll('.bank-option').forEach(option => {
        option.classList.remove('selected');
    });
    document.querySelectorAll('.ewallet-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    // Tampilkan opsi yang sesuai
    if (method === 'transfer' && bankOptions) {
        bankOptions.style.display = 'block';
    } else if (method === 'ewallet' && ewalletOptions) {
        ewalletOptions.style.display = 'block';
    }
}

// Data rekening pembayaran
const bankAccounts = {
    mandiri: {
        name: 'Bank Mandiri',
        accountNumber: '1234567890',
        accountName: 'PT A Mitra Furniture',
        bankCode: '008'
    },
    bni: {
        name: 'Bank Negara Indonesia',
        accountNumber: '0987654321',
        accountName: 'PT A Mitra Furniture',
        bankCode: '009'
    },
    bri: {
        name: 'Bank Rakyat Indonesia',
        accountNumber: '1122334455',
        accountName: 'PT A Mitra Furniture',
        bankCode: '002'
    }
};

const ewalletAccounts = {
    gopay: {
        name: 'GoPay',
        phoneNumber: '+62812345678',
        accountName: 'A Mitra Furniture'
    },
    ovo: {
        name: 'OVO',
        phoneNumber: '+62812345679',
        accountName: 'A Mitra Furniture'
    },
    dana: {
        name: 'DANA',
        phoneNumber: '+62812345680',
        accountName: 'A Mitra Furniture'
    }
};

// Pilih bank tertentu dan tampilkan rekening
function selectBank(bank) {
    // Reset semua pilihan bank
    document.querySelectorAll('.bank-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    // Set pilihan bank yang dipilih
    const selectedBank = document.getElementById(`bank-${bank}`);
    if (selectedBank) {
        selectedBank.classList.add('selected');
        selectedPayment = `transfer-${bank}`;
        
        // Tampilkan modal dengan rekening pembayaran
        showPaymentAccount('bank', bank);
    }
}

// Pilih e-wallet tertentu dan tampilkan rekening
function selectEWallet(wallet) {
    // Reset semua pilihan e-wallet
    document.querySelectorAll('.ewallet-option').forEach(option => {
        option.classList.remove('selected');
    });
    
    // Set pilihan e-wallet yang dipilih
    const selectedWallet = document.getElementById(`ewallet-${wallet}`);
    if (selectedWallet) {
        selectedWallet.classList.add('selected');
        selectedPayment = `ewallet-${wallet}`;
        
        // Tampilkan modal dengan rekening pembayaran
        showPaymentAccount('ewallet', wallet);
    }
}

// Fungsi untuk menampilkan informasi rekening pembayaran
function showPaymentAccount(type, method) {
    const contentDiv = document.getElementById('payment-account-content');
    let htmlContent = '';
    
    if (type === 'bank') {
        const account = bankAccounts[method];
        if (account) {
            htmlContent = `
                <div class="payment-account-info">
                    <h6 class="mb-3">${account.name}</h6>
                    
                    <div class="account-detail mb-3">
                        <p class="text-muted small mb-1">Nomor Rekening:</p>
                        <div class="d-flex align-items-center gap-2">
                            <input type="text" class="form-control" id="account-number" value="${account.accountNumber}" readonly>
                            <button class="btn btn-sm btn-outline-primary" onclick="copyAccountNumber()">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="account-detail mb-3">
                        <p class="text-muted small mb-1">Atas Nama:</p>
                        <p class="mb-0 fw-bold">${account.accountName}</p>
                    </div>
                    
                    <div class="alert alert-info small" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        Silahkan transfer sesuai dengan nominal yang tertera di atas. Perlu waktu beberapa menit hingga pembayaran terverifikasi.
                    </div>
                </div>
            `;
        }
    } else if (type === 'ewallet') {
        const account = ewalletAccounts[method];
        if (account) {
            htmlContent = `
                <div class="payment-account-info">
                    <h6 class="mb-3">${account.name}</h6>
                    
                    <div class="account-detail mb-3">
                        <p class="text-muted small mb-1">Nomor Telepon:</p>
                        <div class="d-flex align-items-center gap-2">
                            <input type="text" class="form-control" id="account-number" value="${account.phoneNumber}" readonly>
                            <button class="btn btn-sm btn-outline-primary" onclick="copyAccountNumber()">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="account-detail mb-3">
                        <p class="text-muted small mb-1">Atas Nama:</p>
                        <p class="mb-0 fw-bold">${account.accountName}</p>
                    </div>
                    
                    <div class="alert alert-info small" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        Silahkan transfer sesuai dengan nominal yang tertera. Pembayaran akan langsung terverifikasi setelah transfer berhasil.
                    </div>
                </div>
            `;
        }
    }
    
    if (htmlContent) {
        contentDiv.innerHTML = htmlContent;
        
        // Tampilkan modal
        const modal = new bootstrap.Modal(document.getElementById('paymentAccountModal'));
        modal.show();
    }
}

// Fungsi untuk copy nomor rekening/telepon
function copyAccountNumber() {
    const accountInput = document.getElementById('account-number');
    if (accountInput) {
        accountInput.select();
        document.execCommand('copy');
        
        // Tampilkan notifikasi sukses
        const btn = event.target.closest('button');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(() => {
            btn.innerHTML = originalHTML;
        }, 2000);
    }
}

// Fungsi untuk copy ke clipboard
function copyToClipboard() {
    const accountInput = document.getElementById('account-number');
    if (accountInput) {
        accountInput.select();
        document.execCommand('copy');
        
        // Tampilkan alert
        alert('Nomor berhasil disalin ke clipboard!');
    }
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
    
    // Validasi untuk transfer bank dan e-wallet
    if (selectedPayment.startsWith('transfer-') && !document.querySelector('.bank-option.selected')) {
        showAlert('Pilih bank terlebih dahulu', 'error');
        return;
    }
    
    if (selectedPayment.startsWith('ewallet-') && !document.querySelector('.ewallet-option.selected')) {
        showAlert('Pilih e-wallet terlebih dahulu', 'error');
        return;
    }

        console.log('Redirecting to payment-succes.html');
    
    // Redirect ke halaman pembayaran berhasil
    window.location.href = 'payment-succes.html';
    
    // Kosongkan keranjang untuk item yang dipilih
    cart = cart.filter(item => !item.isSelected);
    saveCartToLocalStorage();
}

// Muat riwayat pesanan
function loadOrderHistory() {
    const orderContent = document.getElementById('order-history-content');
    if (!orderContent) return;
    
    orderContent.innerHTML = '';
    
    let filteredOrders = orderHistory;
    
    // Dapatkan filter dari URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const filter = urlParams.get('filter') || currentOrderTab;
    
    // Filter berdasarkan status jika bukan 'all'
    if (filter !== 'all') {
        filteredOrders = orderHistory.filter(order => order.status === filter);
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
    if (!notificationList) return;
    
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
    const profileName = document.getElementById('profile-name');
    const profilePhone = document.getElementById('profile-phone');
    const profileEmail = document.getElementById('profile-email');
    
    if (profileName) profileName.textContent = `Nama ${userProfile.name}`;
    if (profilePhone) profilePhone.textContent = `No.Handphone ${userProfile.phone.substring(0, 2)}******${userProfile.phone.substring(userProfile.phone.length - 2)}`;
    if (profileEmail) profileEmail.textContent = `Email ${userProfile.email.substring(0, 1)}****${userProfile.email.substring(userProfile.email.indexOf('@'))}`;
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

// Muat produk Beli Lagi
function loadBuyAgainProducts(productsList) {
    const buyAgainContainer = document.getElementById('buy-again-products');
    if (!buyAgainContainer) return;
    
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

// Muat produk Favorit
function loadFavoriteProducts(productsList) {
    const favoritesContainer = document.getElementById('favorites-products');
    if (!favoritesContainer) return;
    
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

// Inisialisasi berdasarkan halaman saat ini
document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname.split('/').pop();
    
    switch(currentPage) {
        case 'index.html':
        case '':
            // Welcome page - tidak perlu inisialisasi khusus
            break;
        case 'home.html':
            loadHomeProducts();
            break;
        case 'cart.html':
            loadCart();
            break;
        case 'checkout.html':
            loadCheckout();
            break;
        case 'profile.html':
            loadProfile();
            break;
        case 'order-history.html':
            loadOrderHistory();
            break;
        case 'notification.html':
            loadNotifications();
            break;
        case 'category.html':
            // Load category products based on URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get('type');
            if (category && products[category]) {
                loadCategoryProducts(category);
                
                // Set category title
                const categoryTitle = document.getElementById('category-title');
                if (categoryTitle) {
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
                }
            }
            break;
        case 'buy-again.html':
            // Filter produk yang pernah dibeli (contoh: produk dengan ID 1, 2, 3)
            const buyAgainProducts = products.home.filter(product => [1, 2, 3].includes(product.id));
            loadBuyAgainProducts(buyAgainProducts);
            break;
        case 'favorites.html':
            // Filter produk favorit (contoh: produk dengan ID 4, 5, 6)
            const favoriteProducts = products.home.filter(product => [4, 5, 6].includes(product.id));
            loadFavoriteProducts(favoriteProducts);
            break;
    }
    
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
});

// Fungsi untuk navigate ke halaman product detail
function goToProductDetail(productId) {
    window.location.href = `product-detail.html?id=${productId}`;
}

// Event listener untuk form login
document.getElementById('login-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    window.location.href = 'verify.html';
});

// Event listener untuk form register
document.getElementById('register-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    window.location.href = 'verify.html';
});