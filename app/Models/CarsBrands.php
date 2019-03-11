<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsBrands extends Model
{
    const ID = 'id';
    const BRAND = 'brand';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CarsBrands';

    public $timestamps = false;
}
