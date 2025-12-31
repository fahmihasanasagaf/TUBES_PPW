<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <base href="/">
</head>
<body>
    <!-- Header/Navbar -->
    <nav @class(['navbar', 'navbar-expand-lg', 'app-header', 'sticky-top'])>
        <div @class(['container'])>
            <a @class(['navbar-brand', 'fw-bold']) href="home.html">A Mitra Furniture</a>
            <button @class(['navbar-toggler']) type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span @class(['navbar-toggler-icon'])></span>
            </button>
            <div @class(['collapse', 'navbar-collapse']) id="navbarNav">
                <ul @class(['navbar-nav', 'ms-auto'])>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="home.html">Home</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="cart.html">Keranjang</a>
                    </li>
                    <li @class(['nav-item'])>
                        <a @class(['nav-link']) href="profile.html">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="checkout-screen" @class(['screen', 'active'])>
        <div @class(['container', 'py-4'])>
            <h2 @class(['mb-4'])>CHECKOUT</h2>
            
            <!-- Address Section -->
            <div @class(['checkout-section'])>
                <div @class(['d-flex', 'align-items-start'])>
                    <i @class(['fas', 'fa-map-marker-alt', 'me-3', 'mt-1'])></i>
                    <div @class(['flex-grow-1'])>
                        <h6>GISELMA FIRMANSYAH | (+62) 857 3618 3301</h6>
                        <p @class(['mb-0', 'small'])>JALAN BUKIT TINGGI, NO. 21, RW 03/RW 02 PISANG KAPI.ING MERDEKA RT 02/04 WATUMAS PURWAKERJA, PURWOKERTO, TUNJUNGAN BANYUMAS, JAWA TENGAH, ID 53114</p>
                    </div>
                    <i @class(['fas', 'fa-chevron-right'])></i>
                </div>
            </div>
            
            <!-- Products Section -->
            <div @class(['checkout-section'])>
                <p @class(['text-muted', 'small'])>A Mitra Furniture Official Store</p>
                <div id="checkout-products">
                    <!-- Checkout products will be loaded here by JavaScript -->
                </div>
            </div>
            
            <!-- Payment Method Section -->
            <div @class(['checkout-section'])>
                <h5 @class(['mb-3'])>Metode Pembayaran</h5>
                
                <div @class(['payment-option']) onclick="selectPayment('transfer')">
                    <div @class(['d-flex', 'align-items-center'])>
                        <i @class(['fas', 'fa-university', 'me-3'])></i>
                        <div @class(['flex-grow-1'])>Transfer Bank</div>
                        <div @class(['payment-radio'])>
                            <div @class(['payment-circle']) id="transfer-circle"></div>
                        </div>
                    </div>
                    <!-- Opsi Transfer Bank (akan muncul ketika dipilih) -->
                    <div id="bank-options" @class(['payment-options', 'mt-3']) style="display: none;">
                        <h6 @class(['mb-3'])>Pilih Bank</h6>
                        <div @class(['bank-option']) id="bank-mandiri" onclick="selectBank('mandiri')">
                            <div @class(['d-flex', 'align-items-center'])>
                                <div @class(['bank-logo', 'me-3'])>
                                    <i @class(['fas', 'fa-landmark'])></i>
                                </div>
                                <div>
                                    <p @class(['mb-0', 'fw-bold'])>Mandiri</p>
                                    <p @class(['mb-0', 'text-muted', 'small'])>Bank Mandiri</p>
                                </div>
                            </div>
                        </div>
                        
                        <div @class(['bank-option']) id="bank-bni" onclick="selectBank('bni')">
                            <div @class(['d-flex', 'align-items-center'])>
                                <div @class(['bank-logo', 'me-3'])>
                                    <i @class(['fas', 'fa-university'])></i>
                                </div>
                                <div>
                                    <p @class(['mb-0', 'fw-bold'])>BNI</p>
                                    <p @class(['mb-0', 'text-muted', 'small'])>Bank Negara Indonesia</p>
                                </div>
                            </div>
                        </div>
                        
                        <div @class(['bank-option']) id="bank-bri" onclick="selectBank('bri')">
                            <div @class(['d-flex', 'align-items-center'])>
                                <div @class(['bank-logo', 'me-3'])>
                                    <i @class(['fas', 'fa-piggy-bank'])></i>
                                </div>
                                <div>
                                    <p @class(['mb-0', 'fw-bold'])>BRI</p>
                                    <p @class(['mb-0', 'text-muted', 'small'])>Bank Rakyat Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div @class(['payment-option']) onclick="selectPayment('ewallet')">
                    <div @class(['d-flex', 'align-items-center'])>
                        <i @class(['fas', 'fa-wallet', 'me-3'])></i>
                        <div @class(['flex-grow-1'])>E-Wallet</div>
                        <div @class(['payment-radio'])>
                            <div @class(['payment-circle']) id="ewallet-circle"></div>
                        </div>
                    </div>
                    <!-- Opsi E-Wallet (akan muncul ketika dipilih) -->
                    <div id="ewallet-options" @class(['payment-options', 'mt-3']) style="display: none;">
                        <h6 @class(['mb-3'])>Pilih E-Wallet</h6>
                        <div @class(['ewallet-option']) id="ewallet-gopay" onclick="selectEWallet('gopay')">
                            <div @class(['d-flex', 'align-items-center'])>
                                <div @class(['ewallet-logo', 'me-3'])>
                                    <i @class(['fab', 'fa-google'])></i>
                                </div>
                                <div>
                                    <p @class(['mb-0', 'fw-bold'])>GoPay</p>
                                    <p @class(['mb-0', 'text-muted', 'small'])>Dompet digital Gojek</p>
                                </div>
                            </div>
                        </div>
                        
                        <div @class(['ewallet-option']) id="ewallet-ovo" onclick="selectEWallet('ovo')">
                            <div @class(['d-flex', 'align-items-center'])>
                                <div @class(['ewallet-logo', 'me-3'])>
                                    <i @class(['fas', 'fa-mobile-alt'])></i>
                                </div>
                                <div>
                                    <p @class(['mb-0', 'fw-bold'])>OVO</p>
                                    <p @class(['mb-0', 'text-muted', 'small'])>Dompet digital OVO</p>
                                </div>
                            </div>
                        </div>
                        
                        <div @class(['ewallet-option']) id="ewallet-dana" onclick="selectEWallet('dana')">
                            <div @class(['d-flex', 'align-items-center'])>
                                <div @class(['ewallet-logo', 'me-3'])>
                                    <i @class(['fas', 'fa-credit-card'])></i>
                                </div>
                                <div>
                                    <p @class(['mb-0', 'fw-bold'])>DANA</p>
                                    <p @class(['mb-0', 'text-muted', 'small'])>Dompet digital DANA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div @class(['payment-option']) onclick="selectPayment('cod')">
                    <div @class(['d-flex', 'align-items-center'])>
                        <i @class(['fas', 'fa-money-bill', 'me-3'])></i>
                        <div @class(['flex-grow-1'])>COD (Cash on Delivery)</div>
                        <div @class(['payment-radio'])>
                            <div @class(['payment-circle']) id="cod-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Summary -->
            <div @class(['checkout-section'])>
                <h5 @class(['mb-3'])>Rincian Pembayaran</h5>
                
                <div @class(['d-flex', 'justify-content-between', 'mb-2'])>
                    <span>Subtotal Pesanan</span>
                    <span id="subtotal">Rp 0</span>
                </div>
                
                <div @class(['d-flex', 'justify-content-between', 'mb-2'])>
                    <span>Subtotal Pengiriman</span>
                    <span>Rp 0</span>
                </div>
                
                <hr>
                
                <div @class(['d-flex', 'justify-content-between', 'fw-bold'])>
                    <span>Total Pembayaran</span>
                    <span id="total-payment">Rp 0</span>
                </div>
            </div>

            

            <!-- Checkout button -->
           <button @class(['btn', 'btn-primary-custom', 'w-100', 'py-3']) onclick="return processPayment()">BUAT PESANAN</button>
        </div>
    </div>

    <!-- Modal Rekening Pembayaran -->
    <div @class(['modal', 'fade']) id="paymentAccountModal" tabindex="-1" aria-labelledby="paymentAccountLabel" aria-hidden="true">
        <div @class(['modal-dialog', 'modal-dialog-centered'])>
            <div @class(['modal-content'])>
                <div @class(['modal-header'])>
                    <h5 @class(['modal-title']) id="paymentAccountLabel">Informasi Pembayaran</h5>
                    <button type="button" @class(['btn-close']) data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div @class(['modal-body'])>
                    <div id="payment-account-content">
                        <!-- Content akan dimuat secara dinamis -->
                    </div>
                </div>
                <div @class(['modal-footer'])>
                    <button type="button" @class(['btn', 'btn-secondary']) data-bs-dismiss="modal">Tutup</button>
                    <button type="button" @class(['btn', 'btn-primary']) onclick="copyToClipboard()">Salin Nomor Rekening</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/script.js"></script>
</body>
</html>