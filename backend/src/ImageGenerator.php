<?php

namespace App;

class ImageGenerator {
    private $apiKey;
    private $apiUrl = "https://api.openai.com/v1/images/generations";

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function generateImage($prompt) {
        $headers = [
            "Authorization: Bearer {$this->apiKey}",
            "Content-Type: application/json"
        ];

        $data = [
            "prompt" => $prompt,
            "n" => 1,
            "size" => "512x512"
        ];

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode == 200) {
            $result = json_decode($response, true);
            return $result['data'][0]['url'] ?? null;
        } else {
            return "Erro: $response";
        }
    }
}
