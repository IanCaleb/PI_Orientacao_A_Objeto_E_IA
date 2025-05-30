<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/ImageGenerator.php';

use App\ImageGenerator;

// Carregar variáveis do .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$apiKey = $_ENV['OPENAI_API_KEY'];
$prompt = "Um gato astronauta no espaço";

$gen = new ImageGenerator($apiKey);
$imageUrl = $gen->generateImage($prompt);

echo "Imagem gerada: <a href='$imageUrl' target='_blank'>Ver imagem</a>";
