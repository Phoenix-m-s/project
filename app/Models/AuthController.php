<?php
// در جایی که مدل کاربر نیاز است مانند در کنترلر AuthController.php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function register() {
        // دریافت اطلاعات از فرم ورودی (نام کاربری، ایمیل، رمز عبور)
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // ایجاد یک نمونه از مدل کاربر
        $user = new User($username, $email, $password);

        // ذخیره کاربر در دیتابیس یا انجام عملیات مربوطه
        // مثلاً $user->saveToDatabase() یا استفاده از یک کلاس دیگر برای ذخیره کاربر در دیتابیس
    }

    public function login() {
        // عملیات ورود کاربر با استفاده از مدل کاربر
        // مثلاً بررسی معتبر بودن نام کاربری و رمز عبور
    }
}
