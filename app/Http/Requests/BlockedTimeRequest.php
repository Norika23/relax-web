<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockedTimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'staff_id' => [
                'nullable',
                'integer',
                Rule::exists('staffs', 'id')->where(
                    fn ($query) => $query->where('shop_id', auth()->user()->shop_id),
                ),
            ],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
            'reason' => ['nullable', 'string', 'max:255'],
        ];
    }
}
