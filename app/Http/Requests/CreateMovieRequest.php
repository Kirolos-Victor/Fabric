<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:movies,title'],
            'year' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'imdbID' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'poster' => ['required', 'url']
        ];
    }
}
