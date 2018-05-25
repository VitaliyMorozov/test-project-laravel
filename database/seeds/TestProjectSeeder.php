<?php

use Illuminate\Database\Seeder;

class TestProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            'audi' => [
                '80', '100', 'A4', 'A6', 'A8'
            ],
            'skoda' => [
                'Octavia', 'Rapid', 'Yeti', 'Superb', 'Fabia'
            ],
            'bmw' => [
                '320', '325', '520', '525', 'X5', 'X6'
            ],
            'hyundai' => [
                'Accent', 'Sonata', 'Elantra', 'Santa Fe', 'Solaris'
            ],
            'nissan' => [
                'GT-R', '240SX', 'Patrol'
            ],
            'toyota' => [
                'Land Cruiser', 'Corolla', 'RAV 4', 'Camry'
            ]
        ];

        foreach ($cars as $brand => $models) {
            $brandID = DB::table('CarsBrands')->insertGetId(['brand' => $brand]);
            foreach ($models as $model) {
                $modelID = DB::table('CarsModels')->insertGetId(['brandID' => $brandID, 'model' => $model]);
                factory(App\Models\ModelGeneration::class, 5)->create([
                        'modelID' => $modelID
                    ]
                );
            }
        }

        DB::table('SparePartCategory')->insert([
            ['category' => 'Engine'],
            ['category' => 'Transmission'],
            ['category' => 'Suspension']
        ]);

        factory(App\Models\SpareParts::class, 50)->create();
        factory(App\Models\ModelSpareParts::class, 1000)->create();
    }
}
