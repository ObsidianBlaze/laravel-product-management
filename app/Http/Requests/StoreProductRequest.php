<?php

namespace App\Http\Requests;

use App\Enums\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => ['required', new EnumRule(ProductStatusEnum::class)],
        ];
    }
}
