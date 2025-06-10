<?php

namespace App\Agents;

use GuzzleHttp\Client;
use NeuronAI\Tools\PropertyType;
use NeuronAI\Tools\Tool;
use NeuronAI\Tools\ToolProperty;

class GetTranscription extends Tool
{
    protected Client $client;

    public function __construct(protected string $key)
    {
        parent::__construct(
            'get_transcription',
            'Retrieve the transcription of a youtube video.',
        );

        $this->addProperty(
            new ToolProperty(
                name: 'video_url',
                type: PropertyType::STRING,
                description: 'The URL of the YouTube video.',
                required: true
            )
        )->setCallable($this);
    }

    public function getClient(): Client
    {
        if (isset($this->client)) {
            return $this->client;
        }

        $this->client = new Client([
            'base_uri' => 'https://api.supadata.ai/v1/youtube/',
            'headers' => [
                'x-api-key' => $this->key,
            ]
        ]);

        return $this->client;
    }

    public function __invoke(string $video_url)
    {
        $response = $this->getClient()->get('transcript?url=' . $video_url.'&text=true');

        if ($response->getStatusCode() !== 200) {
            return "Transcription APIs error: {$response->getBody()->getContents()}";
        }

        $response = json_decode($response->getBody()->getContents(), true);

        return $response['content'];
    }
}