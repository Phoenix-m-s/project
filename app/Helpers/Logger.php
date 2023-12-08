<?php
// app/Helpers/Logger.php
namespace App\Helpers;

class Logger {
    public static function logError($message) {
        // ذخیره پیام خطا در یک فایل خاص
        $logFile = fopen('error_log.txt', 'a');
        fwrite($logFile, date('[Y-m-d H:i:s]') . ' ERROR: ' . $message . PHP_EOL);
        fclose($logFile);
    }

    public static function logInfo($message) {
        // ذخیره پیام اطلاعاتی در یک فایل خاص
        $logFile = fopen('info_log.txt', 'a');
        fwrite($logFile, date('[Y-m-d H:i:s]') . ' INFO: ' . $message . PHP_EOL);
        fclose($logFile);
    }
}
