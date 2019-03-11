<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Saritasa\Laravel\Controllers\Api\JWTAuthApiController;
use App\Models;
use App\Services\CarService;
use App\Http\Requests\BrandsRequest;

class CarsController extends JWTAuthApiController
{
    /**
     * Service to work with model cars.
     *
     * @var CarService
     */
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Get all brands.
     *
     * @return Models\CarsBrands[]|\Illuminate\Database\Eloquent\Collection
     */
    public function brands()
    {
        return Models\CarsBrands::all();
    }


    /**
     * Save brand.
     *
     * @param BrandsRequest $request brand request to save
     * @return Models\Dto\DtoBrands
     */
    public function brandsSave(BrandsRequest $request)
    {
        return $request->getBrandData();
    }

    /**
     * Gel list of car models by brand.
     *
     * @param $id int Identifier of brand
     * @return \Illuminate\Support\Collection
     */
    public function brandModels(int $id)
    {
        return Models\CarsModels::with('generations')
            ->where('brandID', $id)
            ->get();
    }

    /**
     * Get list of category spare parts by the car model generation.
     *
     * @param $id int Identifier of car model generation
     * @return \Illuminate\Support\Collection
     */
    public function categorySpareParts(int $id)
    {
        return $this->carService->getCategoriesByGenerationID($id);
    }

    /**
     * Get spare parts by car model generation.
     *
     * @param $generationID int Identifier of car model generation
     * @param Request $request request
     * @return \Illuminate\Support\Collection
     */
    public function sparePartsByGeneration(int $generationID, Request $request)
    {
        $params = [
            'generationID' => $generationID,
            'categoryID' => $request->categoryID,
        ];

        return $this->carService->getSparePartsByGeneration($params);
    }
}
