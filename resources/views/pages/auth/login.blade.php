<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Kependudukan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('asset/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f1115, #1b1e22, #2a2d31);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
            color: #fff;
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

        .login-box {
            position: relative;
            background: rgba(28, 30, 34, 0.7);
            border-radius: 16px;
            padding: 45px 35px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.3);
            border: 1px solid rgba(255, 77, 77, 0.15);
            z-index: 10;
        }

        .login-box h3 {
            font-family: 'Oswald', sans-serif;
            color: #ff4d4d;
            text-align: center;
            font-weight: 700;
            margin-bottom: 25px;
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
        }

        .btn-primary {
            background-color: #ff4d4d;
            border: none;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #e63b3b;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-footer a {
            color: #ff4d4d;
            font-weight: 600;
            text-decoration: none;
        }

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
    <div class="login-box">
        <h3>LOGIN</h3>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="mb-4 password-wrapper">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="login-password"
                    placeholder="Masukkan password" required>

            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="login-footer">
            Belum punya akun? <a href="{{ route('signup') }}">Sign Up</a>
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
