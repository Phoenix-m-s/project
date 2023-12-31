<?php
// app/Handlers/ExceptionHandler.php
namespace App\Handlers;

use Exception;
use App\Exceptions\CustomException;

class ExceptionHandler {
    public function handle(Exception $e) {
        if ($e instanceof CustomException) {
            // پردازش و مدیریت خطای CustomException
            echo $e->errorMessage();
        } else {
            // پردازش و مدیریت سایر خطاها
            echo 'An error occurred: ' . $e->getMessage();
        }
    }
}
