<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/bootstrap.php';

$entityManager = $app->getContainer()->get('doctrine');

return new \Symfony\Component\Console\Helper\HelperSet([
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager),
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection())
]);