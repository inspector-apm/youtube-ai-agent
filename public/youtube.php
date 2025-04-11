<?php

/*
 * https://www.youtube.com/watch?v=6qmWm18ewCo
 *
 * https://www.youtube.com/watch?v=WmVLcj-XKnM
 *
 * https://www.youtube.com/watch?v=aoPcbZEFZZ0
 */

use App\YouTube\YouTubeAgent;
use NeuronAI\Chat\Messages\UserMessage;

include __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$agent = YouTubeAgent::make();

if (!empty($_ENV['INSPECTOR_INGESTION_KEY'])) {
    $agent->observe(
        new \NeuronAI\Observability\AgentMonitoring(
            new \Inspector\Inspector(new \Inspector\Configuration($_ENV['INSPECTOR_INGESTION_KEY'])),
        )
    );
}

do {
    echo 'You: ';
    $input = \rtrim(\fgets(STDIN));

    if (empty($input)) {
        break;
    }

    $response = $agent->stream(new UserMessage($input));

    echo 'YouTube Agent: ';
    foreach ($response as $text) {
        echo $text;
    }
    echo PHP_EOL.PHP_EOL;
} while (true);
