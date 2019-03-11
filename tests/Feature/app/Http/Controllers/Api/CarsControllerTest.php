<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarsControllerTest extends TestCase
{
    /**
     * Test get all car brands.
     */
    public function testGetAllBrands()
    {
        $response = $this->json('GET', 'api/brands');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'brand'
            ]
        ]);
        $response->assertJson([
            ['id' => 1]
        ]);
    }

    /**
     * Test get all models by brand.
     */
    public function testGetBrandCarModels()
    {
        $response = $this->json('GET', 'api/models/1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'brandID',
                'model',
                'generations' => [
                    [
                        'id',
                        'modelID',
                        'generation'
                    ]
                ]
            ]
        ]);
        $response->assertJson([
            [
                'brandID' => 1,
                'generations' => [
                    ['id' => 1]
                ]
            ],
        ]);
    }

    /**
     * Test get categories spare parts by car model generation.
     */
    public function testCategoriesByGeneration()
    {
        $response = $this->json('GET', 'api/categorySpareParts/1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'category'
            ]
        ]);
    }
}
