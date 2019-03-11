<?php

namespace App\Http\Requests;

use App\Models\CarsBrands;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Dto\DtoBrands;

/**
 * Brands form request.
 *
 * @property-read string $brand
 */
class BrandsRequest extends FormRequest
{
    /**
     * Rules that should be applied to validate request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            CarsBrands::BRAND => 'required|string|max:50'
        ];
    }

    /**
     * Returns brands data for update.
     *
     * @return DtoBrands
     */
    public function getBrandData(): DtoBrands
    {
        return new DtoBrands($this->only([
            CarsBrands::ID,
            CarsBrands::BRAND,
        ]));
    }
}
