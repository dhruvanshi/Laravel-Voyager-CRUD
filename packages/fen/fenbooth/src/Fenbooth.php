<?php

namespace Fen\Fenbooth;

use Illuminate\Support\Facades\Http;

class Fenbooth {
    public function justDoIt() {
        $response = Http::get('https://inspiration.goprogram.ai/');

        return $response['quote'] . ' -' . $response['author'];
    }
}