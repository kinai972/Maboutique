<?php

declare(strict_types=1);

namespace App\DTO;

class SearchProductCriteria
{
    public ?string $string = "";

    public array $categories = [];
}
