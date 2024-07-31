<?php

namespace App\Services\DTO\Airport;

class AirportDtoAction
{
    public static function fromRequest(array $request): AirportDto
    {
        return new AirportDto(
            page: $request['page']??1,
            perPage: $request['per_page']??30,
            search: $request['search']??null
        );
    }
}