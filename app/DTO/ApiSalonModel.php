<?php

namespace App\DTO;

class ApiSalonModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $image = null,
        public ?string $address = null,
        public ?string $phone = null,
        public ?string $work_hours = null,
    ) {
    }
}
