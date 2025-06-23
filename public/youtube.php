<?php

/*
 * Example video
 *
 * https://www.youtube.com/watch?v=fJSX8wWIDO8
 */
use App\Agents\YouTubeAgent;
use NeuronAI\Chat\Messages\UserMessage;

include __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$agent = YouTubeAgent::make();

// --- Agent introduction ---
$response = $agent->stream(new UserMessage("Hi, let me know who you are, and how you can help me."));

foreach ($response as $text) {
    echo $text;
}
echo PHP_EOL.PHP_EOL;

// --- Interactive console ---
do {
    echo 'You: ';
    $input = \rtrim(\fgets(STDIN));

    if (empty($input)) {
        break;
    }

    $response = $agent->stream(new UserMessage($input));

    echo 'Agent: ';
    foreach ($response as $text) {
        echo $text;
    }
    echo PHP_EOL.PHP_EOL;
} while (true);
