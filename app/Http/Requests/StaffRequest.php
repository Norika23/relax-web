<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'photo_path' => ['nullable', 'string', 'max:255'],
            'nomination_fee' => ['required', 'integer', 'min:0'],
            'display_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'can_accept_reservations' => ['nullable', 'boolean'],
            'service_ids' => ['array'],
            'service_ids.*' => [
                'integer',
                Rule::exists('services', 'id')->where(
                    fn ($query) => $query->where('shop_id', auth()->user()->shop_id),
                ),
            ],
        ];
    }
}
