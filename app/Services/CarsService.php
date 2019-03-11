<?php

namespace App\Services;

use App\Repositories\CarRepository;

class CarService
{
    /**
     * Cars repository.
     *
     * @var CarRepository
     */
    protected $carRepo;

    public function __construct(CarRepository $carRepo)
    {
        $this->carRepo = $carRepo;
    }

    /**
     * Get categories by generation ID.
     *
     * @param $id int Identifier of car model generation
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesByGenerationID(int $id)
    {
        return $this->carRepo->getCategoriesByGenerationID($id);
    }

    /**
     * Get spare parts by generation.
     *
     * @param $params array
     * @return \Illuminate\Support\Collection
     */
    public function getSparePartsByGeneration(array $params)
    {
        return $this->carRepo->getSparePartsByGeneration($params);
    }
}
