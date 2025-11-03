// Password toggle functionality
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = event.currentTarget.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}

// Password strength checker
function checkPasswordStrength(password) {
    let strength = 0;
    let feedback = '';

    if (password.length >= 8) strength++;
    if (password.match(/[a-z]+/)) strength++;
    if (password.match(/[A-Z]+/)) strength++;
    if (password.match(/[0-9]+/)) strength++;
    if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength++;

    const strengthBar = document.getElementById('passwordStrength');
    const feedbackElement = document.getElementById('passwordFeedback');

    if (!strengthBar || !feedbackElement) return;

    strengthBar.className = 'strength-fill';
    
    switch(strength) {
        case 0:
        case 1:
        case 2:
            strengthBar.classList.add('strength-weak');
            feedback = 'Kata sandi lemah';
            feedbackElement.style.color = '#ff4757';
            break;
        case 3:
        case 4:
            strengthBar.classList.add('strength-medium');
            feedback = 'Kata sandi cukup';
            feedbackElement.style.color = '#ffa502';
            break;
        case 5:
            strengthBar.classList.add('strength-strong');
            feedback = 'Kata sandi kuat';
            feedbackElement.style.color = '#2ed573';
            break;
    }

    feedbackElement.textContent = feedback;
}

// Confirm password validation
function validatePassword() {
    const password = document.getElementById('registerPassword')?.value;
    const confirmPassword = document.getElementById('confirmPassword')?.value;
    const feedbackElement = document.getElementById('confirmFeedback');

    if (!feedbackElement) return true;

    if (password !== confirmPassword) {
        feedbackElement.textContent = 'Kata sandi tidak cocok';
        return false;
    } else {
        feedbackElement.textContent = '';
        return true;
    }
}

// Social login handler
function socialLogin(provider) {
    showLoading();
    setTimeout(() => {
        hideLoading();
        showNotification(`Login dengan ${provider} berhasil!`);
        // Redirect to home page after social login
        setTimeout(() => {
            window.location.href = 'home.html';
        }, 1500);
    }, 2000);
}

// Forgot password functionality
function resetPassword() {
    const email = document.getElementById('resetEmail')?.value;
    if (!email) {
        showNotification('Masukkan email terlebih dahulu', 'error');
        return;
    }

    showLoading();
    setTimeout(() => {
        hideLoading();
        const modal = bootstrap.Modal.getInstance(document.getElementById('forgotPasswordModal'));
        if (modal) modal.hide();
        showNotification('Link reset password telah dikirim ke email Anda');
    }, 2000);
}

// Notification system
function showNotification(message, type = 'success') {
    // Remove existing notifications
    const existingToasts = document.querySelectorAll('.notification-toast');
    existingToasts.forEach(toast => toast.remove());

    const toast = document.createElement('div');
    toast.className = `notification-toast ${type}`;
    toast.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} 
                me-2 ${type === 'success' ? 'text-success' : 'text-danger'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 100);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 300);
    }, 3000);
}

// Loading spinner
function showLoading() {
    let spinner = document.querySelector('.loading-spinner');
    if (!spinner) {
        spinner = document.createElement('div');
        spinner.className = 'loading-spinner';
        document.body.appendChild(spinner);
    }
    spinner.style.display = 'block';
}

function hideLoading() {
    const spinner = document.querySelector('.loading-spinner');
    if (spinner) {
        spinner.style.display = 'none';
    }
}

// Form validation and handlers
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - initializing forms');

    // Password strength real-time checking
    const passwordInput = document.getElementById('registerPassword');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            checkPasswordStrength(this.value);
        });
    }

    // Confirm password real-time validation
    const confirmInput = document.getElementById('confirmPassword');
    if (confirmInput) {
        confirmInput.addEventListener('input', validatePassword);
    }

    // Forgot password modal
    const forgotPasswordLink = document.getElementById('forgotPassword');
    if (forgotPasswordLink) {
        forgotPasswordLink.addEventListener('click', function(e) {
            e.preventDefault();
            const modalElement = document.getElementById('forgotPasswordModal');
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        });
    }

    // Login form
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        console.log('Login form found');
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Login form submitted');
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showNotification('Login berhasil!');
                setTimeout(() => {
                    window.location.href = 'home.html';
                }, 1500);
            }, 2000);
        });
    }

    // Register form
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        console.log('Register form found');
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Register form submitted');
            
            if (!validatePassword()) {
                showNotification('Konfirmasi kata sandi tidak cocok', 'error');
                return;
            }

            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showNotification('Pendaftaran berhasil! Mengarahkan ke verifikasi...');
                setTimeout(() => {
                    window.location.href = 'verification.html';
                }, 1500);
            }, 2000);
        });
    }

    // Verification form
    const verificationForm = document.getElementById('verificationForm');
    if (verificationForm) {
        console.log('Verification form found');
        verificationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Verification form submitted');
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showNotification('Verifikasi berhasil!');
                setTimeout(() => {
                    window.location.href = 'home.html';
                }, 1500);
            }, 2000);
        });

        // OTP Input Auto Focus
        const otpInputs = document.querySelectorAll('.otp-input');
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });
            
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });
    }

    // Home page functionality
    if (document.querySelector('.home-container')) {
        initializeHomePage();
    }
});

// Home page functionality
function initializeHomePage() {
    console.log('Initializing home page');
    
    // Wishlist toggle
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
            const icon = this.querySelector('i');
            if (this.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                showNotification('Ditambahkan ke wishlist');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                showNotification('Dihapus dari wishlist');
            }
        });
    });

    // Add to cart
    document.querySelectorAll('.btn-add-cart').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check"></i>';
            this.style.background = '#2ed573';
            
            showNotification('Produk ditambahkan ke keranjang');
            
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.style.background = '';
            }, 1500);
        });
    });

    // Category click
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            showNotification(`Filter kategori: ${category}`);
        });
    });

    // Update cart counter
    updateCartCounter();
}

// Local storage for user data
function saveUserData(key, data) {
    localStorage.setItem(key, JSON.stringify(data));
}

function getUserData(key) {
    const data = localStorage.getItem(key);
    return data ? JSON.parse(data) : null;
}

// Cart item counter
function updateCartCounter() {
    const cartItems = getUserData('cartItems') || [];
    const cartBadges = document.querySelectorAll('.badge');
    cartBadges.forEach(badge => {
        const iconBtn = badge.closest('.icon-btn');
        if (iconBtn && iconBtn.querySelector('.fa-shopping-cart')) {
            badge.textContent = cartItems.length > 0 ? cartItems.length : '0';
        }
    });
}