<?php

namespace App\Repositories;

use DB;

class CarRepository
{
    /**
     * Get categories by generation ID.
     *
     * @param $id int Identifier of car model generation
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesByGenerationID(int $id)
    {
        return DB::table('SparePartCategory AS spc')
            ->select([
                'spc.id',
                'spc.category'
            ])
            ->join('SpareParts AS sp', 'sp.categoryID', '=', 'spc.id')
            ->join('ModelSpareParts AS msp', 'msp.sparePartID', '=', 'sp.id')
            ->distinct()
            ->where('msp.generationID', $id)
            ->orderBy('spc.category', 'asc')
            ->get();
    }

    /**
     * Get spare parts by car model generation.
     *
     * @param array $params params to filter
     *   params = [
     *     'generationID' => (int) a car model generation identifier. Required.
     *     'categoryID'   => (int) a spare parts category identifier.
     *   }
     * @return \Illuminate\Support\Collection
     */
    public function getSparePartsByGeneration(array $params)
    {
        $query =  DB::table('SpareParts AS sp')
            ->select('*')
            ->join('SparePartCategory AS spc', 'spc.id', '=', 'sp.categoryID')
            ->join('ModelSpareParts AS msp', 'msp.sparePartID', '=', 'sp.id');

        $query->where('msp.generationID', $params['generationID']);

        if (!empty($params['categoryID'])) {
            $query->where('spc.id', $params['categoryID']);
        }

        return $query->get();
    }
}
