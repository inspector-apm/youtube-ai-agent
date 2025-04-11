<?php

/*
 * https://www.youtube.com/watch?v=6qmWm18ewCo
 *
 * https://www.youtube.com/watch?v=WmVLcj-XKnM
 *
 * https://www.youtube.com/watch?v=aoPcbZEFZZ0
 */

use App\YouTube\YouTubeAgent;
use Inspector\Configuration;
use Inspector\Inspector;
use NeuronAI\Chat\Messages\UserMessage;
use NeuronAI\Observability\AgentMonitoring;

include __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$agent = YouTubeAgent::make();

if (!empty($_ENV['INSPECTOR_INGESTION_KEY'])) {
    $agent->observe(
        new AgentMonitoring(
            new Inspector(new Configuration($_ENV['INSPECTOR_INGESTION_KEY'])),
        )
    );
}

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
