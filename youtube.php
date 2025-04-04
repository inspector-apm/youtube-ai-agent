<?php


use App\YouTube\YouTubeAgent;
use NeuronAI\Chat\Messages\UserMessage;

include __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

do {
    echo 'You: ';
    $input = \rtrim(\fgets(STDIN));

    if (empty($input)) {
        break;
    }

    $response = YouTubeAgent::make()->stream(new UserMessage($input));

    echo 'YouTube Agent: ';
    foreach ($response as $text) {
        echo $text;
    }
    echo PHP_EOL.PHP_EOL;
} while (true);