<?php

namespace App\YouTube;

use GuzzleHttp\Client;

class GetTranscription
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.supadata.ai/v1/youtube/',
            'headers' => [
                'x-api-key' => $_ENV['SUPADATA_API_KEY'],
            ]
        ]);
    }

    public function __invoke(string $video_url)
    {
        $response = $this->client->get('transcript?url=' . $video_url.'&text=true');

        if ($response->getStatusCode() !== 200) {
            return "Transcription APIs error: {$response->getBody()->getContents()}";
        }

        $response = json_decode($response->getBody()->getContents(), true);

        return $response['content'];
    }
}