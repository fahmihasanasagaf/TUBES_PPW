class HomePage {
  constructor() {
    this.products = [];
    this.init();
  }

  async init() {
    console.log("Initializing home page");

    this.loadProducts();
    this.renderProducts();
    this.attachEventListeners();
  }

  loadProducts() {
    // Daftar produk dengan gambar
    this.products = [
      {
        id: 1,
        name: "Sofa Modern Minimalis",
        price: 3500000,
        rating: 4.8,
        reviews: 120,
        icon: "fas fa-couch",
        color: "#8B4513",
        category: "sofa",
        isWishlist: false,
        badge: "",
        image: "./images/produk1.jpg"
      },
      {
        id: 2,
        name: "Kursi Makan Kayu Jati",
        price: 1250000,
        rating: 4.9,
        reviews: 95,
        icon: "fas fa-chair",
        color: "#A0522D",
        category: "kursi",
        isWishlist: false,
        badge: "",
        image: "./images/produk2.jpg"
      },
      {
        id: 3,
        name: "Kasur Spring Bed Premium",
        price: 5800000,
        rating: 5.0,
        reviews: 200,
        icon: "fas fa-bed",
        color: "#CD853F",
        category: "kasur",
        isWishlist: false,
        badge: "Terlaris",
        image: "./images/produk3.jpg"
      },
      {
        id: 4,
        name: "Lemari Pakaian 2 Pintu",
        price: 2800000,
        rating: 4.7,
        reviews: 80,
        icon: "fas fa-door-open",
        color: "#D2B48C",
        category: "lemari",
        isWishlist: false,
        badge: "",
        image: "./images/produk4.jpg"
      },
      {
        id: 5,
        name: "Meja Makan Minimalis",
        price: 2200000,
        rating: 4.6,
        reviews: 65,
        icon: "fas fa-table",
        color: "#8B4513",
        category: "meja",
        isWishlist: false,
        badge: "Baru",
        image: "./images/produk5.jpg"
      },
      {
        id: 6,
        name: "Kursi Santai Rotan",
        price: 850000,
        rating: 4.5,
        reviews: 45,
        icon: "fas fa-chair",
        color: "#D2691E",
        category: "kursi",
        isWishlist: false,
        badge: "",
        image: "./images/produk6.jpg"
      }
    ];
  }

  renderProducts() {
    const productsGrid = document.getElementById("productsGrid");
    if (!productsGrid) return;

    productsGrid.innerHTML = this.products
      .map(
        (product) => `
      <div class="product-card" data-id="${product.id}">
        <div class="product-image">
          ${
            product.image
              ? `<img src="${product.image}" alt="${product.name}" class="product-img">`
              : `<i class="${product.icon}" style="font-size:4rem; color:${product.color};"></i>`
          }
          <button class="wishlist-btn ${
            product.isWishlist ? "active" : ""
          }" data-id="${product.id}">
            <i class="${product.isWishlist ? "fas" : "far"} fa-heart"></i>
          </button>
          ${
            product.badge
              ? `<span class="product-badge">${product.badge}</span>`
              : ""
          }
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
    `
      )
      .join("");
  }

  attachEventListeners() {
    const productsGrid = document.getElementById("productsGrid");
    if (!productsGrid) return;

    // Event toggle wishlist
    productsGrid.addEventListener("click", (e) => {
      const btn = e.target.closest(".wishlist-btn");
      if (btn) {
        const id = parseInt(btn.dataset.id);
        this.toggleWishlist(id);
      }

      const addCartBtn = e.target.closest(".btn-add-cart");
      if (addCartBtn) {
        const id = parseInt(addCartBtn.dataset.id);
        this.addToCart(id);
      }
    });
  }

  toggleWishlist(id) {
    const product = this.products.find((p) => p.id === id);
    if (product) {
      product.isWishlist = !product.isWishlist;
      this.renderProducts(); // re-render untuk update ikon hati
    }
  }

  addToCart(id) {
    const product = this.products.find((p) => p.id === id);
    if (product) {
      alert(`${product.name} berhasil ditambahkan ke keranjang!`);
    }
  }

  formatPrice(price) {
    return "Rp " + price.toLocaleString("id-ID");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new HomePage();
});
