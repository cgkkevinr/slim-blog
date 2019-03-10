<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/bootstrap.php';

$entityManager = $app->getContainer()->get('doctrine');

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);