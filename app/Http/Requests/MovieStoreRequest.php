<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'backdrop_path' => ['image', 'max:1024', 'nullable'],
            'poster_path' => ['image', 'max:1024', 'nullable'],
            'overview' => ['required', 'max:255', 'string'],
            'release_date' => ['required', 'date'],
            'title' => ['required', 'max:255', 'string'],
            'original_title' => ['required', 'max:255', 'string'],
            'original_language' => ['required', 'max:255', 'string'],
            'popularity' => ['required', 'numeric'],
            'vote_count' => ['required', 'numeric'],
            'vote_average' => ['required', 'numeric'],
            'adult' => ['required', 'boolean'],
            'video' => ['required', 'boolean'],
        ];
    }
}
