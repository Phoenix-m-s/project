<?php
// app/Controllers/UserController.php
namespace App\Controllers;

use App\Database\Database;

class UserController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function index() {
        $connection = $this->db->connect();
        if ($connection) {
            // اتصال موفق، انجام عملیات مورد نظر
        } else {
            // مدیریت خطاها - مثلاً نمایش پیغام به کاربر در صورت عدم اتصال
        }
    }

    // ...
}
