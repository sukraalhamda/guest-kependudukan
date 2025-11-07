<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up - Kependudukan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('asset/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('asset/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: linear-gradient(135deg, #0f1115, #1b1e22, #2a2d31);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .particle {
            position: absolute;
            background: rgba(255, 77, 77, 0.4);
            border-radius: 50%;
            filter: blur(10px);
            animation: float 10s infinite ease-in-out;
        }

        .particle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 15%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            width: 100px;
            height: 100px;
            bottom: 15%;
            right: 10%;
            animation-delay: 2s;
        }

        .particle:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 40%;
            right: 25%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
                opacity: 0.6;
            }

            50% {
                transform: translateY(-25px);
                opacity: 1;
            }
        }

        .signup-box {
            position: relative;
            background: rgba(28, 30, 34, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 45px 35px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.3);
            border: 1px solid rgba(255, 77, 77, 0.15);
            z-index: 10;
            animation: fadeIn 1.2s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .signup-box h3 {
            font-family: 'Oswald', sans-serif;
            color: #ff4d4d;
            text-align: center;
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        .form-control {
            background: #232528;
            border: none;
            color: #fff;
            border-radius: 8px;
        }

        .form-control:focus {
            background: #2a2d31;
            box-shadow: 0 0 0 2px #ff4d4d;
            color: #fff;
        }

        .btn-primary {
            background-color: #ff4d4d;
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e63b3b;
            transform: translateY(-2px);
        }

        .signup-footer {
            text-align: center;
            margin-top: 20px;
            color: #ccc;
        }

        .signup-footer a {
            color: #ff4d4d;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-footer a:hover {
            text-decoration: underline;
        }

        /* === Password eye icon === */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            font-size: 18px;
        }

        .toggle-password:hover {
            color: #ff4d4d;
        }
    </style>
</head>

<body>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>

    <div class="signup-box">
        <h3>SIGN UP</h3>

        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3 password-wrapper">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="signup-password"
                    placeholder="Buat password" required>
            </div>

            <div class="mb-4 password-wrapper">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="signup-confirm"
                    placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>

        <div class="signup-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', () => {
                const input = document.querySelector(icon.dataset.target);
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                icon.classList.toggle('bi-eye');
            });
        });
    </script>
</body>

</html>
