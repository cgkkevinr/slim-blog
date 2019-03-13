<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class DoctrinePostRepository implements PostRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = new EntityRepository($entityManager, $entityManager->getClassMetadata(Post::class));
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}