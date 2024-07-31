<?php

namespace Tests\Feature\Public\Airport;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchAirportTest extends TestCase
{
    public function test_successfully_search_noResults()
    {
        $response = $this->getJson(route('api.airports.search',[
            'search' => 'non-existent-airport',
            'page' => 1,
            'per_page' => 30,
        ]));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [],
            ]);
    }
    /**
     * A basic feature test example.
     */
    public function test_successfully_get_airports(): void
    {
        $response = $this->getJson(route('api.airports.search',[
            'search' => 'Anaa',
            'page' => 1,
            'per_page' => 30,
        ]));
        $response->assertStatus(200)
            ->assertJsonStructure($this->getAssertStructure());
    }

    public function test_successfully_get_airports_with_empty_payload(): void
    {
        $response = $this->getJson(route('api.airports.search'));
        $response->assertStatus(200)
            ->assertJsonStructure($this->getAssertStructure());
    }

    public function test_fail_get_airports()
    {
        $response = $this->getJson(route('api.airports.search', [
            'search' => 'Anaa',
            'page' => -1,
            'per_page' => -10,
        ]));
        $response->assertStatus(422);
    }

    private function getAssertStructure():array
    {
        return [
            'data' => [
                '*' => [
                    'AAA' => [
                        'cityName' => [
                            'ru',
                            'en',
                        ],
                        'area',
                        'country',
                        'timezone',
                    ],
                ],
            ],
        ];
    }
}
