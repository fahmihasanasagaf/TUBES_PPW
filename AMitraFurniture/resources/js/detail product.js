const productDetail = {
    1: {
        id: 1,
        name: "Kursi Kayu Jati",
        price: "Rp.400.000",
        image: "assets/images/kursikayujati.jpeg",
        description: "Kursi ini terbuat dari kayu jati berkualitas tinggi yang terkenal akan kekuatan dan ketahanannya terhadap rayap serta cuaca.",
        specs: [
            { label: "Bahan", value: "Kayu Jati Solid" },
            { label: "Finishing", value: "Natural / Gloss" },
            { label: "Dimensi", value: "45 cm (lebar) x 45 cm (panjang) x 85 cm (tinggi)" },
            { label: "Warna", value: "Cokelat Kayu Natural" },
            { label: "Kapasitas Beban", value: "Hingga 120 kg" }
        ],
        features: [
            "Material kuat dan tahan lama",
            "Warna alami cocok untuk berbagai interior",
            "Permukaan halus dan nyaman saat digunakan"
        ]
    },
    2: {
        id: 2,
        name: "Kursi Rotan",
        price: "Rp.650.000",
        image: "assets/images/kursirotan.jpeg",
        description: "Kursi rotan dengan anyaman berkualitas tinggi yang ringan namun kuat dan fleksibel.",
        specs: [
            { label: "Bahan", value: "Rotan Alami" },
            { label: "Finishing", value: "Laminasi Tahan Cuaca" },
            { label: "Dimensi", value: "50 cm (lebar) x 55 cm (panjang) x 90 cm (tinggi)" },
            { label: "Warna", value: "Cokelat Muda" },
            { label: "Kapasitas Beban", value: "Hingga 100 kg" }
        ],
        features: [
            "Desain klasik yang elegan",
            "Ringan dan mudah dipindahkan",
            "Bantalan empuk untuk kenyamanan ekstra"
        ]
    },
    3: {
        id: 3,
        name: "Kursi Ergonomis",
        price: "Rp.550.000",
        image: "assets/images/Kursi.png",
        description: "Kursi desain ergonomis yang dirancang khusus untuk kenyamanan duduk dalam waktu lama.",
        specs: [
            { label: "Bahan", value: "Kain Mesh & Rangka Besi" },
            { label: "Finishing", value: "Powder Coating" },
            { label: "Dimensi", value: "60 cm (lebar) x 60 cm (panjang) x 110 cm (tinggi)" },
            { label: "Warna", value: "Cokelat dan Abu-abu" },
            { label: "Kapasitas Beban", value: "Hingga 130 kg" }
        ],
        features: [
            "Desain ergonomis untuk kenyamanan maksimal",
            "Sandaran punggung yang dapat disesuaikan",
            "Bantalan duduk empuk dan breathable"
        ]
    },
    4: {
        id: 4,
        name: "Kursi Goyang",
        price: "Rp.1.450.000",
        image: "assets/images/kursigoyang.jpeg",
        description: "Kursi goyang terbuat dari kayu mahoni berkualitas tinggi dengan tampilan klasik dan elegan.",
        specs: [
            { label: "Bahan", value: "Kayu Mahoni Solid" },
            { label: "Finishing", value: "Glossy" },
            { label: "Dimensi", value: "70 cm (lebar) x 90 cm (panjang) x 100 cm (tinggi)" },
            { label: "Warna", value: "Cokelat Tua" },
            { label: "Kapasitas Beban", value: "Hingga 150 kg" }
        ],
        features: [
            "Material kayu mahoni berkualitas tinggi",
            "Desain ergonomis untuk kenyamanan maksimal",
            "Finishing halus yang melindungi kayu"
        ]
    },
    5: {
        id: 5,
        name: "Kursi Santai",
        price: "Rp.750.000",
        image: "assets/images/kursisantai.jpeg",
        description: "Kursi santai dirancang untuk memberikan kenyamanan maksimal saat bersantai di rumah.",
        specs: [
            { label: "Bahan", value: "Kain Velvet & Rangka Kayu" },
            { label: "Finishing", value: "Cat Duco" },
            { label: "Dimensi", value: "65 cm (lebar) x 75 cm (panjang) x 85 cm (tinggi)" },
            { label: "Warna", value: "Cokelat" },
            { label: "Kapasitas Beban", value: "Hingga 120 kg" }
        ],
        features: [
            "Bantalan empuk untuk kenyamanan maksimal",
            "Desain stylish yang cocok untuk berbagai interior",
            "Material berkualitas tinggi untuk daya tahan jangka panjang"
        ]
    },
    6: {
        id: 6,
        name: "Kursi Kayu Mahoni",
        price: "Rp.850.000",
        image: "assets/images/kursikayumahoni.jpeg",
        description: "Kursi terbuat dari kayu mahoni solid yang terkenal akan kekuatan dan keindahan alaminya.",
        specs: [
            { label: "Bahan", value: "Kayu Mahoni Solid" },
            { label: "Finishing", value: "Glossy" },
            { label: "Dimensi", value: "50 cm (lebar) x 50 cm (panjang) x 90 cm (tinggi)" },
            { label: "Warna", value: "Cokelat Tua" },
            { label: "Kapasitas Beban", value: "Hingga 130 kg" }
        ],
        features: [
            "Material kuat dan tahan lama",
            "Warna mewah cocok untuk berbagai interior",
            "Permukaan halus dan nyaman saat digunakan"
        ]
    },
    7: {
        id: 7,
        name: "Elbow Chair",
        price: "Rp.950.000",
        image: "assets/images/Elbow Chair.jpeg",
        description: "Kursi elbow chair dirancang dengan sandaran tangan yang melengkung untuk kenyamanan ekstra.",
        specs: [
            { label: "Bahan", value: "Kain Linen & Rangka Kayu" },
            { label: "Finishing", value: "Cat Duco" },
            { label: "Dimensi", value: "60 cm (lebar) x 65 cm (panjang) x 85 cm (tinggi)" },
            { label: "Warna", value: "Abu-abu" },
            { label: "Kapasitas Beban", value: "Hingga 120 kg" }
        ],
        features: [
            "Desain dengan sandaran tangan untuk kenyamanan ekstra",
            "Bantalan empuk untuk kenyamanan maksimal",
            "Material berkualitas tinggi untuk daya tahan jangka panjang"
        ]
    }
};

// Fungsi untuk mendapatkan ID produk dari URL
function getProductIdFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    return parseInt(id);
}

// Fungsi untuk menampilkan detail produk
function displayProductDetail(productId) {
    const product = productDetail[productId];
    
    if (!product) {
        document.getElementById('product-detail-container').innerHTML = '<h3 class="text-center">Produk tidak ditemukan</h3>';
        return;
    }

    const productsToshow = `
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="${product.image}" alt="${product.name}" class="img-fluid rounded product-image" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <h2 class="product-name fw-bold">${product.name}</h2>
                
                <!-- Rating Section -->
                <div class="rating-section">
                    <div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="fw-bold">4.5</span>
                    <span class="review-count">(128 ulasan)</span>
                </div>

                <!-- Price Section -->
                <h3 class="text-danger price-tag fw-bold mb-3">${product.price}</h3>
                
                <!-- Seller Info -->
                <div class="seller-info">
                    <div class="d-flex align-items-center mb-2">
                        <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                            <i class="fas fa-store fa-2x text-muted"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">A Mitra Furniture</p>
                            <p class="mb-0 text-muted small">Toko Resmi</p>
                        </div>
                    </div>
                    <span class="seller-badge">✓ Resmi</span>
                </div>
                
                <!-- Description -->
                <h5 class="mt-4 fw-bold">Deskripsi Produk</h5>
                <p class="product-description text-muted">${product.description}</p>
                
                <!-- Specifications -->
                <h5 class="mt-4 fw-bold">Spesifikasi</h5>
                <ul class="specs-list">
                    ${product.specs.map(spec => `<li><strong>${spec.label}:</strong> ${spec.value}</li>`).join('')}
                </ul>
                
                <!-- Features -->
                <h5 class="mt-4 fw-bold">Fitur Unggulan</h5>
                <ul class="features-list">
                    ${product.features.map(feature => `<li><i class="fas fa-check text-success me-2"></i> ${feature}</li>`).join('')}
                </ul>
                
                <!-- Quantity Selector -->
                <div class="quantity-selector mt-4">
                    <label class="fw-bold">Jumlah:</label>
                    <button class="qty-btn" onclick="decreaseQty()">-</button>
                    <input type="number" id="quantity" class="qty-input" value="1" min="1" max="99">
                    <button class="qty-btn" onclick="increaseQty()">+</button>
                </div>
            </div>
        </div>
    `;  
    
    document.getElementById('product-detail-container').innerHTML = productsToshow;
    loadRelatedProducts(productId);
}

// Fungsi untuk load produk sejenis
function loadRelatedProducts(currentProductId) {
    const container = document.getElementById('related-products-container');
    if (!container) return;
    
    let relatedProducts = [];
    for (let id in productDetail) {
        if (parseInt(id) !== currentProductId) {
            relatedProducts.push({...productDetail[id], id: parseInt(id)});
        }
    }
    
    relatedProducts = relatedProducts.slice(0, 4);
    
    let html = '';
    relatedProducts.forEach(product => {
        html += `
            <div class="col-6 col-md-3 mb-3">
                <div class="product-card-small" onclick="goToProductDetail(${product.id})">
                    <img src="${product.image}" alt="${product.name}">
                    <div class="p-2">
                        <p class="fw-bold small mb-1">${product.name}</p>
                        <p class="text-danger fw-bold small">${product.price}</p>
                    </div>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
}

// Fungsi untuk increase quantity
function increaseQty() {
    const qtyInput = document.getElementById('quantity');
    let currentQty = parseInt(qtyInput.value);
    if (currentQty < 99) {
        qtyInput.value = currentQty + 1;
    }
}

// Fungsi untuk decrease quantity
function decreaseQty() {
    const qtyInput = document.getElementById('quantity');
    let currentQty = parseInt(qtyInput.value);
    if (currentQty > 1) {
        qtyInput.value = currentQty - 1;
    }
}

// Fungsi untuk menambahkan produk ke keranjang
function addToCart(productId) {
    const quantity = parseInt(document.getElementById('quantity')?.value) || 1;
    const product = productDetail[productId];
    
    if (!product) {
        alert('Produk tidak ditemukan');
        return;
    }
    
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            id: productId,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: quantity
        });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    showSuccessModal(`${quantity}x ${product.name} ditambahkan ke keranjang`);
}

// Fungsi untuk membeli sekarang
function buyNow(productId) {
    const quantity = parseInt(document.getElementById('quantity')?.value) || 1;
    const product = productDetail[productId];
    
    if (!product) {
        alert('Produk tidak ditemukan');
        return;
    }
    
    let checkoutItems = JSON.parse(localStorage.getItem('checkoutItems')) || [];
    const existingItem = checkoutItems.find(item => item.id === productId);
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        checkoutItems.push({
            id: productId,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: quantity
        });
    }
    
    localStorage.setItem('checkoutItems', JSON.stringify(checkoutItems));
    window.location.href = 'checkout.html';
}

// Fungsi untuk menampilkan modal sukses
function showSuccessModal(message) {
    const modal = document.getElementById('success-modal');
    document.getElementById('modal-message').textContent = message;
    modal.classList.add('active');
}

// Fungsi untuk menutup modal
function closeModal() {
    const modal = document.getElementById('success-modal');
    modal.classList.remove('active');
}

// Fungsi untuk navigate ke halaman product detail
function goToProductDetail(productId) {
    window.location.href = `product-detail.html?id=${productId}`;
}

// Fungsi untuk navigate ke cart
function goToCart() {
    window.location.href = 'cart.html';
}

// Fungsi untuk kembali ke halaman sebelumnya
function goBack() {
    window.history.back();
}

// Event listener saat DOM loaded
document.addEventListener('DOMContentLoaded', function() {
    const productId = getProductIdFromURL();
    
    if (!productId) {
        document.getElementById('product-detail-container').innerHTML = '<h3 class="text-center">Produk tidak ditemukan</h3>';
        return;
    }
    
    displayProductDetail(productId);
    
    const backBtn = document.querySelector('.btn-back');
    if (backBtn) {
        backBtn.addEventListener('click', goBack);
    }
    
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            addToCart(productId);
        });
    }
    
    const buyNowBtn = document.querySelector('.buy-now-btn');
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function() {
            buyNow(productId);
        });
    }
    
    const modal = document.getElementById('success-modal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }
});
