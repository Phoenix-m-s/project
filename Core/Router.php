<?php
// Router.php

namespace Core;
use App\Database\Database;

class Router
{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function loginForm()
    {
        // کد HTML برای فرم لاگین با استفاده از Bootstrap 5
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Login</title>
            <!-- Bootstrap 5 CSS -->
             <link href="../app/Views/assets/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <h2>Login</h2>
                <form action="/dashboard" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <!-- Bootstrap 5 JS (for proper functionality) -->
            <script src="../app/Views/js/bootstrap.min.js"></script>
        </body>
        </html>';
    }

    public function registerForm()
    {
        // کد HTML برای فرم ثبت‌نام با استفاده از Bootstrap 5
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Register</title>
            <!-- Bootstrap 5 CSS -->
              <link href="../app/Views/assets/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <h2>Register</h2>
                <form action="/dashboard" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <!-- Bootstrap 5 JS (for proper functionality) -->
             <script src="../app/Views/assets/js/bootstrap.min.js"></script>
        </body>
        </html>';
    }


    public function dashboard()
    {
        // اگر ورود موفقیت‌آمیز بود، کاربر را به داشبورد هدایت می‌دهد
        $loggedIn = $this->checkLogin();

        if ($loggedIn) {
            // اگر ورود موفقیت‌آمیز بود، اطلاعات داشبورد را نمایش می‌دهد
            // کد HTML برای صفحه داشبورد (در اینجا می‌توانید اطلاعات کاربر را نمایش دهید)
            echo '
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Dashboard</title>
                    <!-- Bootstrap 5 CSS -->
                    <link href="../app/Views/assets/css/bootstrap.min.css" rel="stylesheet">
                </head>
                <body>
                    <div class="container mt-5">
                        <h2>Welcome to Dashboard</h2>
                        <!-- کد HTML برای نمایش اطلاعات کاربر و سایر عملیات -->
                    </div>
                    <!-- Bootstrap 5 JS (for proper functionality) -->
                    <script src="../app/Views/assets/js/bootstrap.min.js"></script>
                </body>
                </html>';
        } else {
            // در غیر این صورت، نمایش فرم لاگین با بوت استرپ
            $this->loginForm();
        }
    }

    private function checkLogin()
    {
        // بررسی ورود کاربر از دیتابیس
        // اگر موجود بود، true برمی‌گرداند، در غیر این صورت false
        return $this->validateLogin();
    }

    private function validateLogin()
    {
        // مربوط به ارتباط با دیتابیس و بررسی ورود کاربر است
        // اگر موجود بود، true برمی‌گرداند، در غیر این صورت false
        return $this->checkDatabase();
    }

    private function checkDatabase()
    {
        // ارتباط با دیتابیس برای بررسی وجود کاربر
        // اگر کاربر وجود داشته باشد، true برمی‌گرداند، در غیر این صورت false
        return $this->authenticateUser();
    }

    private function authenticateUser()
    {
        session_start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $sql = 'SELECT * FROM xs_login WHERE username = ? AND password = ?';
        $user = $this->db->query($sql, [$username, $password])->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['loggedIn'] = true;
            header('Location: /dashboard');
            exit();
        }else {
            // ورود ناموفق
            $this->loginFormWithError(); // نمایش فرم لاگین با خطا
            return false;
        }
    }

    private function loginFormWithError()
    {
        // فرم لاگین با خطای بوت استرپ
        echo '
        <!-- فرم با بوت استرپ -->
        <div class="alert alert-danger" role="alert">
            Invalid username or password!
        </div>
        ';
    }
}
