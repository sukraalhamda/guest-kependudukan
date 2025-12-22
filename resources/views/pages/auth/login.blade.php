<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Sistem Kependudukan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('asset/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #dc3545;
            --primary-dark: #c82333;
            --primary-light: #ff6b6b;
            --dark: #121212;
            --dark-light: #1e1e1e;
            --gray: #2d2d2d;
            --gray-light: #3d3d3d;
            --text: #f8f9fa;
            --text-light: #adb5bd;
            --border: #444;
            --glass: rgba(30, 30, 30, 0.9);
            --success: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            color: var(--text);
            background: linear-gradient(135deg, var(--dark), var(--dark-light), var(--gray));
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
            overflow: hidden;
        }

        @keyframes gradientMove {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .split-container {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        /* Left Side - Logo */
        .logo-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
            position: relative;
            overflow: hidden;
        }

        .logo-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(220, 53, 69, 0.1), transparent);
            z-index: -1;
        }

        .logo-wrapper {
            text-align: center;
            animation: fadeInUp 1s ease;
        }

        .main-logo {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 0 0 2px rgba(255, 255, 255, 0.1),
                0 0 40px rgba(220, 53, 69, 0.4);
            border: 4px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .main-logo:hover {
            transform: scale(1.05);
            box-shadow:
                0 30px 60px rgba(0, 0, 0, 0.5),
                0 0 0 3px rgba(255, 255, 255, 0.15),
                0 0 60px rgba(220, 53, 69, 0.6);
        }

        .logo-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(45deg, var(--text), var(--primary-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .logo-subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 400px;
            line-height: 1.6;
        }

        /* Right Side - Forms */
        .form-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: rgba(18, 18, 18, 0.8);
            backdrop-filter: blur(10px);
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            animation: fadeInRight 1s ease;
        }

        /* Tab Navigation */
        .form-tabs {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .tab-btn {
            flex: 1;
            padding: 15px;
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .tab-btn.active {
            color: var(--text);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary);
            border-radius: 3px 3px 0 0;
        }

        .tab-btn:hover:not(.active) {
            color: var(--primary-light);
            background: rgba(220, 53, 69, 0.1);
        }

        /* Form Styling */
        .form-card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 35px;
            width: 100%;
            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                0 0 20px rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: transform 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-3px);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .form-header p {
            color: var(--text-light);
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .form-label.required::after {
            content: " *";
            color: var(--primary);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            background: rgba(45, 45, 45, 0.7);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            padding: 14px 15px 14px 45px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(61, 61, 61, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.2);
            outline: none;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.85rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-light);
        }

        .remember-me input[type="checkbox"] {
            accent-color: var(--primary);
            width: 14px;
            height: 14px;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            background: var(--primary);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            padding: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit:disabled {
            background: var(--gray);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .split-container {
                flex-direction: column;
            }

            .logo-side {
                padding: 30px;
                min-height: 40vh;
            }

            .form-side {
                padding: 30px;
                min-height: 60vh;
            }

            .main-logo {
                width: 200px;
                height: 200px;
            }

            .logo-title {
                font-size: 2rem;
            }

            .logo-subtitle {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .logo-side {
                padding: 20px;
            }

            .form-side {
                padding: 20px;
            }

            .form-container {
                padding: 15px;
            }

            .form-card {
                padding: 30px 25px;
            }

            .main-logo {
                width: 150px;
                height: 150px;
            }

            .logo-title {
                font-size: 1.75rem;
            }
        }

        /* Loading effect */
        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="split-container">
        <!-- Left Side - Logo -->
        <div class="logo-side">
            <div class="logo-wrapper">
                <img src="{{ asset('asset/img/LogoKotak.png') }}" alt="Logo Sistem Kependudukan" class="main-logo">
                <h1 class="logo-title">SISTEM KEPENDUDUKAN</h1>
                <p class="logo-subtitle">
                    Sistem informasi terintegrasi untuk pengelolaan data kependudukan yang aman, akurat, dan efisien.
                </p>
            </div>
        </div>

        <!-- Right Side - Forms -->
        <div class="form-side">
            <div class="form-container">
                <!-- Tab Navigation -->
                <div class="form-tabs">
                    <button class="tab-btn active" id="loginTab">MASUK</button>
                    <button class="tab-btn" id="signupTab">DAFTAR</button>
                </div>

                <!-- Login Form -->
                <div id="loginFormContainer" class="form-card">
                    <div class="form-header">
                        <h2>Selamat Datang</h2>
                        <p>Masuk ke akun Anda untuk melanjutkan</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                        @csrf

                        @if ($errors->any() && request()->route()->getName() == 'login')
                            <div class="alert"
                                style="background: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.3); color: #ff8a8a; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Email atau password salah</span>
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" name="email" class="form-control" placeholder="contoh@email.com"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password" id="loginPassword" class="form-control"
                                    placeholder="Masukkan password" required>
                                <button type="button" class="password-toggle" id="toggleLoginPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="remember-forgot">
                            <label class="remember-me">
                                <input type="checkbox" name="remember">
                                <span>Ingat saya</span>
                            </label>
                            <a href="#" class="forgot-password">Lupa password?</a>
                        </div>

                        <button type="submit" class="btn-submit" id="loginButton">
                            <span id="loginButtonText">Masuk</span>
                            <div class="loading" id="loginLoading"></div>
                        </button>
                    </form>
                </div>

                <!-- Signup Form -->
                <div id="signupFormContainer" class="form-card" style="display: none;">
                    <div class="form-header">
                        <h2>Buat Akun Baru</h2>
                        <p>Daftar untuk mengakses sistem kependudukan</p>
                    </div>

                    <form action="{{ route('signup') }}" method="POST" id="signupForm">
                        @csrf

                        @if ($errors->any() && request()->route()->getName() == 'signup')
                            <div class="alert"
                                style="background: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.3); color: #ff8a8a; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        @if (session('success') && request()->route()->getName() == 'signup')
                            <div class="alert"
                                style="background: rgba(40, 167, 69, 0.1); border-color: rgba(40, 167, 69, 0.3); color: #8affaa; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="form-label required">Nama Lengkap</label>
                            <div class="input-group">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Email</label>
                            <div class="input-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" name="email" class="form-control"
                                    placeholder="contoh@email.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password" id="signupPassword" class="form-control"
                                    placeholder="Minimal 8 karakter" required>
                                <button type="button" class="password-toggle" id="toggleSignupPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Konfirmasi Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password_confirmation" id="confirmPassword"
                                    class="form-control" placeholder="Ulangi password" required>
                                <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="role" value="user">

                        <button type="submit" class="btn-submit" id="signupButton">
                            <span id="signupButtonText">Daftar</span>
                            <div class="loading" id="signupLoading"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab Switching
        const loginTab = document.getElementById('loginTab');
        const signupTab = document.getElementById('signupTab');
        const loginFormContainer = document.getElementById('loginFormContainer');
        const signupFormContainer = document.getElementById('signupFormContainer');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('active');
            signupTab.classList.remove('active');
            loginFormContainer.style.display = 'block';
            signupFormContainer.style.display = 'none';
            loginFormContainer.style.animation = 'slideIn 0.3s ease';
        });

        signupTab.addEventListener('click', () => {
            signupTab.classList.add('active');
            loginTab.classList.remove('active');
            signupFormContainer.style.display = 'block';
            loginFormContainer.style.display = 'none';
            signupFormContainer.style.animation = 'slideIn 0.3s ease';
        });

        // Password visibility toggle
        const toggleLoginPassword = document.getElementById('toggleLoginPassword');
        const toggleSignupPassword = document.getElementById('toggleSignupPassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const loginPassword = document.getElementById('loginPassword');
        const signupPassword = document.getElementById('signupPassword');
        const confirmPassword = document.getElementById('confirmPassword');

        function setupPasswordToggle(toggleBtn, passwordInput) {
            toggleBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        }

        setupPasswordToggle(toggleLoginPassword, loginPassword);
        setupPasswordToggle(toggleSignupPassword, signupPassword);
        setupPasswordToggle(toggleConfirmPassword, confirmPassword);

        // Form submission with loading state
        const loginForm = document.getElementById('loginForm');
        const signupForm = document.getElementById('signupForm');
        const loginButton = document.getElementById('loginButton');
        const signupButton = document.getElementById('signupButton');
        const loginButtonText = document.getElementById('loginButtonText');
        const signupButtonText = document.getElementById('signupButtonText');
        const loginLoading = document.getElementById('loginLoading');
        const signupLoading = document.getElementById('signupLoading');

        loginForm.addEventListener('submit', function(e) {
            const email = this.querySelector('input[name="email"]');
            const password = this.querySelector('input[name="password"]');

            // Basic validation
            if (!email.value.trim() || !password.value.trim()) {
                e.preventDefault();
                showError(email, 'Harap isi semua field');
                return;
            }

            // Show loading state
            loginButtonText.style.opacity = '0.5';
            loginLoading.style.display = 'block';
            loginButton.disabled = true;
        });

        signupForm.addEventListener('submit', function(e) {
            const name = this.querySelector('input[name="name"]');
            const email = this.querySelector('input[name="email"]');
            const password = this.querySelector('input[name="password"]');
            const confirm = this.querySelector('input[name="password_confirmation"]');

            // Basic validation
            if (!name.value.trim() || !email.value.trim() || !password.value.trim() || !confirm.value.trim()) {
                e.preventDefault();
                showError(name, 'Harap isi semua field');
                return;
            }

            // Password validation
            if (password.value !== confirm.value) {
                e.preventDefault();
                showError(confirm, 'Password tidak cocok');
                return;
            }

            // Show loading state
            signupButtonText.style.opacity = '0.5';
            signupLoading.style.display = 'block';
            signupButton.disabled = true;
        });

        function showError(input, message) {
            // Create error element
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message';
            errorDiv.style.color = 'var(--primary)';
            errorDiv.style.fontSize = '0.8rem';
            errorDiv.style.marginTop = '5px';
            errorDiv.style.display = 'flex';
            errorDiv.style.alignItems = 'center';
            errorDiv.style.gap = '5px';
            errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;

            input.parentElement.parentElement.appendChild(errorDiv);

            // Remove error after 3 seconds
            setTimeout(() => {
                if (errorDiv.parentElement) {
                    errorDiv.remove();
                }
            }, 3000);
        }

        // Auto remove alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        if (alert.parentElement) {
                            alert.remove();
                        }
                    }, 300);
                }, 5000);
            });

            // Check URL for active tab
            const path = window.location.pathname;
            if (path.includes('signup') || (window.location.search.includes('tab=signup'))) {
                signupTab.click();
            }
        });
    </script>
</body>

</html>
