<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvailabilityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_id' => ['required', 'integer', 'exists:services,id'],
            'staff_id' => ['required', 'integer', 'exists:staffs,id'],
            'date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:today',
                'before_or_equal:'.now()->addMonths(3)->toDateString(),
            ],
        ];
    }

    public function messages(): array
    {
        return ['date.after_or_equal' => '本日以降の日付を選んでください。'];
    }
}
