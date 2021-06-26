<?php

namespace App\Http\Requests\Api;

use App\Rules\ImageExists;
use Illuminate\Foundation\Http\FormRequest;

class ImagesRequest extends FormRequest
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
            'firstImage' => ['required', 'url', new ImageExists],
            'secondImage' => ['required', 'url', new ImageExists],
            'thirdImage' => ['required', 'url', new ImageExists],
        ];
    }
}
