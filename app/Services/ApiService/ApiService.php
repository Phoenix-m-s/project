<?php
// app/Services/ApiService/ApiService.php
namespace App\Services\ApiService;

use App\Services\HttpClient\RequestManager;

class ApiService {
    private $requestManager;

    public function __construct() {
        $this->requestManager = new RequestManager();
    }

    public function fetchDataFromApi($endpoint) {
        return $this->requestManager->sendGetRequest($endpoint);
    }

    // دیگر متدهای مربوط به سرویس API خاص
}
