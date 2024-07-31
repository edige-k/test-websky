<?php

namespace App\Services\Task\Airport;

use Illuminate\Support\Facades\File;

class GetAirportsTask
{
    public function run():array
    {
        $airportJsonPath = storage_path('files/airports.json');
        return json_decode(File::get($airportJsonPath) ,true);
    }
}