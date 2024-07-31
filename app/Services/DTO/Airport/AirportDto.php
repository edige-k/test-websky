<?php

namespace App\Services\DTO\Airport;

class AirportDto
{
    public function __construct(
        private readonly int $page,
        private readonly int $perPage,
        private readonly ?string $search

    ) {

    }

    public function getSearch(): string|null
    {
        return $this->search;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getPerPage():int
    {
        return $this->perPage;
    }

    public function toArray(): array
    {
        return [
            'search' => $this->search,
            'page' => $this->getPage(),
            'per_page' => $this->getPerPage()
        ];
    }
}