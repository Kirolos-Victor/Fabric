<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $movie = $this->route('movie');
        return [
            'title' => ['required', 'string', 'max:255', 'unique:movies,title,' . $movie->id],
            'year' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'imdbID' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'poster' => ['required', 'url']
        ];
    }
}
