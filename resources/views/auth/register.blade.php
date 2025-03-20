<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Slip Tracker - Login</title>

    <!-- FontAwesome for eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- JavaScript file (deferred for better performance) -->
    <script src="{{ asset('js/script.js') }}" defer></script>

    <style>
        /* General Fixes */
        body {
            background: linear-gradient(to right, #cfe2ff, #74a8fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
         /* box na white sa login */
        .container-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Move container wrapper to the left */
            padding: 3rem;
            width: 85%;
            max-width: 1200px;
            margin-right: 600px;
        }

        /* Login Container */
        .login-container {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            width: 400px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 2;
        }

        /* Floating Labels */
        .input-container {
            position: relative;
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .input-container label {
            position: absolute;
            top: 14px;
            left: 15px;
            background: white;
            padding: 0 5px;
            font-weight: 500;
            font-size: 13px;
            color: gray;
            transition: all 0.3s ease-in-out;
            pointer-events: none;
        }

        .input-container input {
            width: 100%;
            padding: 12px;
            padding-left: 15px;
            font-size: 16px;
            border: 2px solid #41779C;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        /* Label Moves Up When Typing */
        .input-container input:focus + label,
        .input-container input:not(:placeholder-shown) + label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: black;
            font-weight: bold;
        }

        /* Password Field & Eye Icon */
        .password-wrapper {
            position: relative;
            width: 100%;
        }

        .password-wrapper input {
            width: 100%;
            padding-right: 40px; /* Space for eye icon */
            border: 2px solid #41779C;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            padding: 12px;
        }

        .password-wrapper .btn-eye {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .password-wrapper .btn-eye i {
            font-size: 18px;
            color: #41779C;
        }

        /* Button Styling */
        .login-btn {
            width: 100%;
            background-color: #004aad;
            color: white;
            border-radius: 12px;
            padding: 12px;
            font-weight: bold;
            margin-top: 20px;
            transition: all 0.3s ease-in-out;
            opacity: 1; /* Fully visible */
            transform: none;
        }

        .login-btn:hover {
            background-color: #1e4f70;
            transform: scale(1.05);
        }

        /* Design Section Fix */
        .design-section {
            position: absolute;
            top: -1px;
            right: 0;
            width: 50vw;
            height: 100vh;
            background: url('/images/4.png') no-repeat center center/cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <div class="login-container">
            <h4 class="mb-3" style="color: #41779C; font-weight: 750; font-family: 'Poppins', sans-serif; font-size: 25px;">LOG IN YOUR ACCOUNT</h4>
            <p class="text-muted" style="color: #41779C !important; font-family: 'Poppins', sans-serif; font-size: 21px;">Effortlessly request online!</p>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3 text-center input-container">
                    <input type="text" name="username" id="username" class="form-control" required placeholder=" ">
                    <label for="username">Username</label>
                </div>
                <div class="mb-3 text-center input-container">
                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" class="form-control" required placeholder=" ">
                        <label for="password">Password</label>
                        <button type="button" id="togglePassword" class="btn-eye">
                            <i class="fa fa-eye"></i>
                        </button>  
                    </div>
                </div>
                <button type="submit" class="btn login-btn">LOGIN</button>
            </form>
            <p class="text-muted small mt-2">By <span style="color: #41779C; font-weight: bold;">Provincial Government of Misamis Oriental</span></p>
        </div>
        <div class="design-section">
            <div class="wave-layer"></div>
            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                <img src="/images/logo.png" alt="Misamis Oriental Seal" class="logo mb-3" style="max-width: 300px; margin-right: -200px;">
                <div class="design-text">
                    <h2 class="fw-bold text-center" style="font-family: 'Inter', sans-serif;  margin-right: -200px;">Supply Slip Tracker</h2>
                    <p class="text-center" style="font-family: 'Inter', sans-serif; margin-right: -200px;">Keeping Supplies on Track</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var passwordInput = document.getElementById("password");
            var icon = document.getElementById("togglePassword").querySelector("i");
    
            // Ensure the correct icon on page load
            passwordInput.type = "password"; // Keep password hidden initially
            icon.classList.replace("fa-eye", "fa-eye-slash"); // Set the initial icon to hidden eye
    
            document.getElementById("togglePassword").addEventListener("click", function () {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    passwordInput.type = "password";
                    icon.classList.replace("fa-eye", "fa-eye-slash");
                }
            });
        });
    </script>
    
</body>
</html>
