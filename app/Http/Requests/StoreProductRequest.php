<?php

namespace App\Http\Requests;

use App\Enums\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Knuckles\Scribe\Extracting\ParamHelpers;
use Spatie\Enum\Laravel\Rules\EnumRule;

class StoreProductRequest extends FormRequest
{
    use ParamHelpers;
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

    /**
     * Define the body parameters for Scribe.
     *
     * @return array
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The name of the product.',
                'example' => 'Samsung',
            ],
            'category' => [
                'description' => 'The product category.',
                'example' => 'Electronics',
            ],
            'status' => [
                'description' => 'The product status (available/unavailable).',
                'example' => 'available',
            ],
        ];
    }
}
