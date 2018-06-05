<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Saritasa\Laravel\Controllers\Api\JWTAuthApiController;
use App\Models;
use App\Services\CarService;

class CarsController extends JWTAuthApiController
{
    /**
     * @var CarService
     */
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }
    /**
     * @return Models\CarsBrands[]|\Illuminate\Database\Eloquent\Collection
     */
    public function brands()
    {
        return Models\CarsBrands::all();
    }

    /**
     * Gel list of car models by brand.
     *
     * @param $id a brand identifier
     * @return \Illuminate\Support\Collection
     */
    public function brandModels($id)
    {
        return Models\CarsModels::with('generations')
            ->where('brandID', $id)
            ->get();
    }

    /**
     * Get list of category spare parts by the car model generation.
     *
     * @param $id a car model generation identifier
     * @return \Illuminate\Support\Collection
     */
    public function categorySpareParts($id)
    {
        return $this->carService->getCategoriesByGenerationID($id);
    }

    /**
     * Get spare parts by car model generation.
     *
     * @param $generationID a car model generation identifier.
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function sparePartsByGeneration($generationID, Request $request)
    {
        $params = [
            'generationID' => $generationID,
            'categoryID' => $request->categoryID,
        ];

        return $this->carService->getSparePartsByGeneration($params);
    }
}
