<?php
// app/Models/User.php
namespace App\Models;

class User {
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    // متدهای دیگر برای دسترسی به سایر ویژگی‌ها
    // مانند setPassword و غیره
}
