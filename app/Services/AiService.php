<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AiService
{
    public $baseURL = "https://firstksa.com/ai/php";
    public $aiKey = "QYVmRWtLyiSsgTR";

    public function search(string $searchTerm, string $context)
    {
        $response = Http::post("{$this->baseURL}/searcht.php?action=answer-from-context&ai_key={$this->aiKey}", [
            'question' => $searchTerm,
            'context' => $context,
        ])->json();

        if ((isset($response['status']) && $response['status'] != 'success') || !isset($response['data']['answer'])) {
            return [
                'success' => false,
                'message' => $response['error'] ?? 'Unknown error',
            ];
        }

        return [
            'success' => true,
            'message' => $response['data']['answer'],
        ];
    }

    public function interactiveSearch(string $searchTerm, string $aiBankId)
    {
        $response = Http::post("{$this->baseURL}/searchp.php?action=answer&ai_key={$this->aiKey}", [
            'question' => $searchTerm,
            'bank' => $aiBankId
        ])->json();

        if ((isset($response['status']) && $response['status'] != 'success') || !isset($response['data']['answer'])) {
            return [
                'success' => false,
                'message' => $response['error'] ?? 'Unknown error',
            ];
        }

        return [
            'success' => true,
            'message' => $response['data']['answer'],
        ];
    }

    public function makeQuiz(string $content, int $questionsCount, string $language)
    {
        $response = Http::post("{$this->baseURL}/QuizGen.php?action=quiz&ai_key=QYVmRWtLyiSsgTR", [
            'content' => $content,
            'num_questions' => $questionsCount,
            'language' => $language,
        ])->json();

        if (isset($response['error'])) {
            return [
                'success' => false,
                'message' => $response['error'],
            ];
        }

        return [
            'success' => true,
            'message' => 'success',
            'data' => $response,
        ];
    }
}
