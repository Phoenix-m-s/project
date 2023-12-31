<?php
// app/Exceptions/CustomException.php
namespace App\Exceptions;

use Exception;

class CustomException extends Exception {
    public function errorMessage() {
        // پیام خطا یا اطلاعات مربوط به خطا
        return 'Custom Exception: ' . $this->getMessage();
    }
}
