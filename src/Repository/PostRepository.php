<?php
declare(strict_types=1);

namespace App\Repository;

interface PostRepository
{
    public function findAll(): array;
}