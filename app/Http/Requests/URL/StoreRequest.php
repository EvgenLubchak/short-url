<?php

declare(strict_types=1);

namespace App\Http\Requests\URL;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'url' => ['url', 'required'],
            'transition_limit' => ['integer', 'max:2000000000', 'min:0', 'required'],
            'lifetime' => ['integer', 'max:24', 'min:1', 'required'],
        ];
    }
}
