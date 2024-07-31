<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Airport\AirportSearchRequest;
use App\Services\Actions\Airport\AirportAction;
use App\Services\DTO\Airport\AirportDtoAction;


class AirportController extends Controller
{
    public function search(AirportSearchRequest $request,AirportAction $action): \Illuminate\Http\JsonResponse
    {
        $data = $action->run(AirportDtoAction::fromRequest($request->validated()));
        return response()->json([
            'data'=>$data['data']
        ]);
    }
}
