<?php
// app/Services/HttpClient/RequestManager.php
namespace App\Services\HttpClient;

use GuzzleHttp\Client;

class RequestManager {
    private $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://api.example.com/', // آدرس پایه سرویس
            'timeout'  => 5, // زمان انتظار برای پاسخ از سرویس (ثانیه)
        ]);
    }

    public function sendGetRequest($endpoint) {
        try {
            $response = $this->client->request('GET', $endpoint);
            return $response->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // مدیریت خطاها
            return $e->getMessage();
        }
    }

    // متدهای دیگر برای ارسال درخواست‌های دیگر
    // مانند POST، PUT، DELETE و غیره
}
