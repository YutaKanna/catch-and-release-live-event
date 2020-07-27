<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:Y/m/d',
                'after_or_equal:' . now()->format(__('Y/m/d')),
            ],
            'open' => [
                'required',
                'date_format:H:i',
            ],
            'start' => [
                'required',
                'date_format:H:i',
            ],
            'close' => [
                'required',
                'date_format:H:i',
            ],
            'venue' => [
                'required',
            ],
            'pre_price' => [
                'nullable',
                'integer',
            ],
            'basic_price' => [
                'nullable',
                'integer',
            ],
            'musician_groups' => [
                'required',
            ],
            'category' => [
                'required',
            ],
        ];
    }
}
