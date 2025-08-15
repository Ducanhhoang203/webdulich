    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(to right, #fbc2eb, #a6c1ee);
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .login-container {
                background-color: #ffffff;
                padding: 30px 40px;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
            }

            .login-container h2 {
                text-align: center;
                margin-bottom: 25px;
                color: #333;
            }

            .alert-success {
                background-color: #d4edda;
                color: #155724;
                padding: 10px 15px;
                border: 1px solid #c3e6cb;
                border-radius: 6px;
                margin-bottom: 15px;
                font-size: 14px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .form-group input {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 15px;
                transition: border 0.3s;
            }

            .form-group input:focus {
                border-color: #5c9ded;
                outline: none;
            }

            .submit-btn {
                width: 100%;
                padding: 12px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .submit-btn:hover {
                background-color: #0056b3;
            }

            .register-link {
                text-align: center;
                margin-top: 20px;
            }

            .register-link a {
                color: #28a745;
                text-decoration: none;
                transition: color 0.3s;
            }

            .register-link a:hover {
                color: #1e7e34;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2>Đăng nhập</h2>
            <?php 
            $message =Session::get('message');
            if ($message) {
                echo $message;
                Session::get('messeage',null);
            }
            ?>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

          <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="form-group">
                    <input type="email" name="admin_email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="admin_password" placeholder="Mật khẩu" required>
                </div>

                <button type="submit" class="submit-btn">Đăng nhập</button>
            </form>

           
        </div>
    </body>
    </html>
