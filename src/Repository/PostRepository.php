<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post;

interface PostRepository
{
    public function findAll(): array;

    public function find(int $id): ?Post;
}