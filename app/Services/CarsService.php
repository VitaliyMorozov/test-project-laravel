<?php

namespace App\Services;

use App\Repositories\CarRepository;

class CarService
{
    /**
     * @var CarRepository
     */
    protected $carRepo;

    public function __construct(CarRepository $carRepo)
    {
        $this->carRepo = $carRepo;
    }

    /**
     * @param $id a car model generation identifier
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesByGenerationID($id)
    {
        return $this->carRepo->getCategoriesByGenerationID($id);
    }

    /**
     * @param $params
     * @return \Illuminate\Support\Collection
     */
    public function getSparePartsByGeneration($params)
    {
        return $this->carRepo->getSparePartsByGeneration($params);
    }
}
