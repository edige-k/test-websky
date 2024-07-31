<?php

namespace App\Services\Actions\Airport;

use App\Services\DTO\Airport\AirportDto;
use App\Services\Task\Airport\GetAirportsTask;

class AirportAction
{
    public function run(AirportDto $dto): array
    {
        $airports = $this->getAirports();
        $filteredAirports = $this->getFilteredData(
            dto: $dto,
            airports: $airports
        );
        unset($airports);
        $pagedAirports = $this->getPaginatedData(
            filteredAirports: $filteredAirports,
            dto: $dto
        );
        unset($filteredAirports);
        return [
            'data' => [
                $pagedAirports,
            ]
        ];
    }

    private function getPaginatedData(array $filteredAirports,AirportDto $dto):array
    {
        $offset = ($dto->getPage() - 1) * $dto->getPerPage();
         return array_slice($filteredAirports, $offset, $dto->getPerPage());
    }

    private function getFilteredData(AirportDto $dto,array  $airports): array
    {
        $lang = $this->getLang($dto->getSearch());

        return array_filter($airports, function ($airport) use ($lang, $dto) {
            return stripos($airport['cityName'][$lang],
                    $dto->getSearch()) !== false; // or === 0 if you want start with request text
        });
    }

    private function getAirports(): array
    {
        return app(GetAirportsTask::class)->run();
    }

    private function getLang(?string $text): string
    {
        return preg_match('/[\p{Cyrillic}]/u', $text) ? 'ru' : 'en';
    }


}