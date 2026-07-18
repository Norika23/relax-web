<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'days' => ['required', 'array', 'size:7'],
            'days.*.opens_at' => ['nullable', 'date_format:H:i'],
            'days.*.closes_at' => ['nullable', 'date_format:H:i'],
            'days.*.is_closed' => ['nullable', 'boolean'],
            'days.*.starts_at' => ['nullable', 'date_format:H:i'],
            'days.*.ends_at' => ['nullable', 'date_format:H:i'],
            'days.*.is_day_off' => ['nullable', 'boolean'],
        ];
    }

    public function after(): array
    {
        return [function (Validator $validator) {
            foreach ($this->input('days', []) as $day => $times) {
                $start = $times['opens_at'] ?? $times['starts_at'] ?? null;
                $end = $times['closes_at'] ?? $times['ends_at'] ?? null;
                if (! $start || ! $end) {
                    $validator->errors()->add("days.$day", '開始時間と終了時間を入力してください。');
                } elseif ($start >= $end) {
                    $validator->errors()->add("days.$day", '終了時間は開始時間より後にしてください。');
                }
            }
        }];
    }
}
