<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarsModels extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CarsModels';

    public $timestamps = false;

    /**
     * Get the generations for the car model.
     */
    public function generations()
    {
        return $this->hasMany('App\Models\ModelGeneration', 'modelID', 'id');
    }
}
