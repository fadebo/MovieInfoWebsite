<?php
class AiReview {
    public function generateReview($movieTitle) {
        $apiKey = $_ENV['GEMINI'];
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;

        $data = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => "Write a brief, positive movie review for the film: $movieTitle"
                        ]
                    ]
                ]
            ]
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return false;
        }

        $response = json_decode($result, true);
        return $response['candidates'][0]['content']['parts'][0]['text'];
    }
}