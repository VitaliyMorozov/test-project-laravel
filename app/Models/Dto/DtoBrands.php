<?php

namespace App\Models\Dto;

use Saritasa\Dto;

/**
 * DtoBrands DTO.
 */
class DtoBrands extends Dto
{
    const ID = 'id';
    const BRAND = 'brand';

    /**
     * Identifier of brand.
     *
     * @var integer
     */
    public $id;

    /**
     * Brand name.
     *
     * @var string
     */
    public $brand;
}
