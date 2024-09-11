<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use UMA\DIC\Container;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = new Container(require __DIR__ . '/config/app.php');

$container->set(EntityManager::class, static function (Container $c): EntityManager {
    $settings = $c->get('settings');

    $cache = $settings['doctrine']['dev_mode'] ?
        new ArrayAdapter() :
        new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']);

    $config = ORMSetup::createAttributeMetadataConfiguration(
        $settings['doctrine']['metadata_dirs'],
        $settings['doctrine']['dev_mode'],
        null,
        $cache
    );

    $connection = DriverManager::getConnection($settings['doctrine']['connection']);

    return new EntityManager($connection, $config);
});

return $container;
