<?php

namespace App\DTO;

class ApiPostModel
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?string $title = null,
        public readonly ?string $body = null,
    ) {
    }
}
