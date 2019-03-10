<?php
declare(strict_types=1);

return [
    'name' => 'Blog Migrations',
    'migrations_namespace' => 'App\Migration',
    'table_name' => 'blog_migration_versions',
    'migrations_directory' => __DIR__ . '/src/Migration',
    'all_or_nothing' => true
];