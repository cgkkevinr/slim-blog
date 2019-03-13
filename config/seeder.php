<?php
declare(strict_types=1);

require_once __DIR__ . "/../src/bootstrap.php";

$entityManager = $app->getContainer()->get('doctrine');

$faker = \Faker\Factory::create();

$connection = $entityManager->getConnection();
$truncate = $connection->getDatabasePlatform()->getTruncateTableSQL('post');
$connection->executeQuery($truncate);
for ($i = 0; $i < 50; $i++) {
    $post = new \App\Entity\Post();
    $title = $faker->sentence(6);
    $content = $faker->realText(200);
    $post->setTitle($title);
    $post->setContent($content);
    $entityManager->persist($post);
    echo "Post #$i: $title" . PHP_EOL;
}

$entityManager->flush();