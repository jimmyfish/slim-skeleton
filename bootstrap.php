<?php

use App\Providers\RepositoryProvider;
use DI\Container;
use Doctrine\ORM\ORMSetup;
use Slim\Factory\AppFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use App\Repository\Customer\CustomerRepository;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Repository\Customer\CustomerRepositoryInterface;
use DI\ContainerBuilder;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$settings = require __DIR__ . '/config/app.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManager::class => function () use ($settings) {
        $cache = $settings['doctrine']['dev_mode'] ? new ArrayAdapter() : new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']);
        $config = ORMSetup::createAttributeMetadataConfiguration($settings['doctrine']['metadata_dirs'], $settings['doctrine']['dev_mode'], null, $cache);
        $connection = DriverManager::getConnection($settings['doctrine']['connection']);

        return new EntityManager($connection, $config);
    },
]);

$containerBuilder->addDefinitions(RepositoryProvider::register());

$container = $containerBuilder->build();

return $container;
