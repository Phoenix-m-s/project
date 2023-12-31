<?php
/// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function register($username, $email, $password) {
        // ایجاد یک نمونه از مدل کاربر
        $user = new User($username, $email, $password);

        // در اینجا می‌توانید کدی برای ذخیره کاربر در دیتابیس اضافه کنید
        // مثلاً از فایل‌های مدیریت دیتابیسی مانند PDO یا ابزارهای ORM مانند Eloquent استفاده کنید

        return 'Registration Successful';
    }

    public function login($username, $password) {
        die('e');
    }
}
