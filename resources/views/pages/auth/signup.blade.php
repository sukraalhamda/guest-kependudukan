<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Daftar - Sistem Kependudukan</title>
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
            overflow-x: hidden;
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
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
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
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(45deg, var(--text), var(--primary-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .logo-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 400px;
            line-height: 1.6;
        }

        /* Right Side - Signup Form */
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
            max-width: 450px;
            animation: fadeInRight 1s ease;
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

        .form-control.is-invalid {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.2);
        }

        .form-control.is-valid {
            border-color: var(--success);
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.2);
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

        .invalid-feedback {
            display: none;
            color: var(--primary);
            font-size: 0.8rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .strength-meter {
            height: 4px;
            background: var(--gray);
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .strength-meter-fill {
            height: 100%;
            width: 0%;
            background: var(--primary);
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .strength-meter-fill.weak {
            width: 33%;
            background: var(--primary);
        }

        .strength-meter-fill.medium {
            width: 66%;
            background: #ffc107;
        }

        .strength-meter-fill.strong {
            width: 100%;
            background: var(--success);
        }

        .password-requirements {
            margin-top: 5px;
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .password-requirements ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .password-requirements li {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 3px;
        }

        .requirement-icon {
            color: var(--text-light);
            font-size: 0.7rem;
        }

        .requirement-icon.valid {
            color: var(--success);
        }

        .requirement-icon.invalid {
            color: var(--text-light);
        }

        .btn-signup {
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
            margin-top: 20px;
        }

        .btn-signup:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-signup:active {
            transform: translateY(0);
        }

        .btn-signup:disabled {
            background: var(--gray);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .signup-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .signup-footer a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup-footer a:hover {
            color: var(--primary-light);
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff8a8a;
            font-size: 0.9rem;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border-color: rgba(40, 167, 69, 0.3);
            color: #8affaa;
        }

        .alert i {
            font-size: 1rem;
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

        /* Responsive */
        @media (max-width: 992px) {
            .split-container {
                flex-direction: column;
                height: auto;
                min-height: 100vh;
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
                width: 180px;
                height: 180px;
            }

            .logo-title {
                font-size: 1.8rem;
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

            .form-card {
                padding: 30px 25px;
            }

            .main-logo {
                width: 140px;
                height: 140px;
            }

            .logo-title {
                font-size: 1.5rem;
            }

            .form-header h2 {
                font-size: 1.5rem;
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
                    Bergabung dengan sistem informasi terpadu untuk pengelolaan data kependudukan yang aman dan
                    terpercaya.
                </p>
            </div>
        </div>

        <!-- Right Side - Signup Form -->
        <div class="form-side">
            <div class="form-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2>Buat Akun Baru</h2>
                        <p>Daftar untuk mengakses sistem kependudukan</p>
                    </div>

                    <form action="{{ route('signup') }}" method="POST" id="signupForm">
                        @csrf

                        @if ($errors->any())
                            <div class="alert">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="form-label required">Nama Lengkap</label>
                            <div class="input-group">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="invalid-feedback" id="name-error">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Nama harus diisi</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Email</label>
                            <div class="input-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="contoh@email.com" required>
                            </div>
                            <div class="invalid-feedback" id="email-error">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Email tidak valid</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Minimal 8 karakter" required>
                                <button type="button" class="password-toggle" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="strength-meter">
                                <div class="strength-meter-fill" id="strength-meter-fill"></div>
                            </div>
                            <div class="password-requirements">
                                <ul>
                                    <li>
                                        <i class="fas fa-circle requirement-icon invalid" id="req-length"></i>
                                        <span>Minimal 8 karakter</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-circle requirement-icon invalid" id="req-uppercase"></i>
                                        <span>Mengandung huruf besar</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-circle requirement-icon invalid" id="req-number"></i>
                                        <span>Mengandung angka</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="invalid-feedback" id="password-error">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Password tidak memenuhi syarat</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Konfirmasi Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="confirmPassword" placeholder="Ulangi password" required>
                                <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="confirm-error">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Password tidak cocok</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                            </select>

                            <small class="text-muted d-block">Pilih <b>Admin</b> untuk akses penuh, <b>User</b> hanya
                                bisa melihat data</small>
                        </div>


                        <button type="submit" class="btn-signup" id="signupButton" disabled>
                            <span id="buttonText">Daftar</span>
                            <div class="loading" id="loadingSpinner"></div>
                        </button>
                    </form>

                    <!-- FOOTER -->
                    <div class="signup-footer">
                        Sudah punya akun? <a href="{{ route('login') }}">Masuk disini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirmPassword');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        // Form elements
        const signupForm = document.getElementById('signupForm');
        const signupButton = document.getElementById('signupButton');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        // Input validation
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');

        // Password strength
        const strengthMeter = document.getElementById('strength-meter-fill');
        const reqLength = document.getElementById('req-length');
        const reqUppercase = document.getElementById('req-uppercase');
        const reqNumber = document.getElementById('req-number');

        // Validation flags
        let isValidName = false;
        let isValidEmail = false;
        let isValidPassword = false;
        let isValidConfirm = false;

        // Real-time validation
        nameInput.addEventListener('input', validateName);
        emailInput.addEventListener('input', validateEmail);
        passwordInput.addEventListener('input', validatePassword);
        confirmInput.addEventListener('input', validateConfirmPassword);

        function validateName() {
            const value = nameInput.value.trim();
            const errorElement = document.getElementById('name-error');

            if (value.length < 2) {
                nameInput.classList.add('is-invalid');
                errorElement.style.display = 'flex';
                isValidName = false;
            } else {
                nameInput.classList.remove('is-invalid');
                nameInput.classList.add('is-valid');
                errorElement.style.display = 'none';
                isValidName = true;
            }
            updateSignupButton();
        }

        function validateEmail() {
            const value = emailInput.value.trim();
            const errorElement = document.getElementById('email-error');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(value)) {
                emailInput.classList.add('is-invalid');
                errorElement.style.display = 'flex';
                isValidEmail = false;
            } else {
                emailInput.classList.remove('is-invalid');
                emailInput.classList.add('is-valid');
                errorElement.style.display = 'none';
                isValidEmail = true;
            }
            updateSignupButton();
        }

        function validatePassword() {
            const value = passwordInput.value;
            const errorElement = document.getElementById('password-error');

            // Check requirements
            const hasLength = value.length >= 8;
            const hasUppercase = /[A-Z]/.test(value);
            const hasNumber = /\d/.test(value);

            // Update requirement icons
            reqLength.classList.toggle('valid', hasLength);
            reqLength.classList.toggle('invalid', !hasLength);
            reqUppercase.classList.toggle('valid', hasUppercase);
            reqUppercase.classList.toggle('invalid', !hasUppercase);
            reqNumber.classList.toggle('valid', hasNumber);
            reqNumber.classList.toggle('invalid', !hasNumber);

            // Calculate strength
            let strength = 0;
            if (hasLength) strength++;
            if (hasUppercase) strength++;
            if (hasNumber) strength++;

            // Update strength meter
            strengthMeter.className = 'strength-meter-fill';
            if (strength === 0) {
                strengthMeter.classList.remove('weak', 'medium', 'strong');
            } else if (strength === 1) {
                strengthMeter.classList.add('weak');
            } else if (strength === 2) {
                strengthMeter.classList.add('medium');
            } else {
                strengthMeter.classList.add('strong');
            }

            // Validate password
            if (hasLength && hasUppercase && hasNumber) {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
                errorElement.style.display = 'none';
                isValidPassword = true;
            } else {
                passwordInput.classList.add('is-invalid');
                passwordInput.classList.remove('is-valid');
                errorElement.style.display = 'flex';
                isValidPassword = false;
            }

            // Re-validate confirmation
            validateConfirmPassword();
            updateSignupButton();
        }

        function validateConfirmPassword() {
            const value = confirmInput.value;
            const passwordValue = passwordInput.value;
            const errorElement = document.getElementById('confirm-error');

            if (value === '' || passwordValue === '') {
                confirmInput.classList.remove('is-invalid', 'is-valid');
                errorElement.style.display = 'none';
                isValidConfirm = false;
            } else if (value === passwordValue && isValidPassword) {
                confirmInput.classList.remove('is-invalid');
                confirmInput.classList.add('is-valid');
                errorElement.style.display = 'none';
                isValidConfirm = true;
            } else {
                confirmInput.classList.add('is-invalid');
                confirmInput.classList.remove('is-valid');
                errorElement.style.display = 'flex';
                isValidConfirm = false;
            }
            updateSignupButton();
        }

        function updateSignupButton() {
            if (isValidName && isValidEmail && isValidPassword && isValidConfirm) {
                signupButton.disabled = false;
            } else {
                signupButton.disabled = true;
            }
        }

        // Form submission
        signupForm.addEventListener('submit', function(e) {
            // Final validation
            validateName();
            validateEmail();
            validatePassword();
            validateConfirmPassword();

            if (!isValidName || !isValidEmail || !isValidPassword || !isValidConfirm) {
                e.preventDefault();
                return;
            }

            // Show loading state
            buttonText.style.opacity = '0.5';
            loadingSpinner.style.display = 'block';
            signupButton.disabled = true;
        });

        // Initialize validation
        document.addEventListener('DOMContentLoaded', function() {
            validateName();
            validateEmail();
            validatePassword();
            validateConfirmPassword();

            // Auto remove alerts
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
        });
    </script>
</body>

</html>
