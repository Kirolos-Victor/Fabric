<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Http;

class FetchDataService
{
    public function execute($button): void
    {
        $data = Http::get(env($button))->collect();
        foreach ($data['Search'] as $item) {
            $matrix = Movie::where('title', '=', $item['Title'])->first();
            if ($matrix == null) {
                Movie::create([
                    'title' => $item['Title'],
                    'year' => $item['Year'],
                    'imdbID' => $item['imdbID'],
                    'type' => $item['Type'],
                    'poster' => $item['Poster'] == 'N/A' ? null : $item['Poster']
                ]);
            }
        }
    }
}
