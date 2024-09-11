<?php

namespace App\Providers;

use Doctrine\ORM\EntityManager;
use App\Repository\Customer\CustomerRepository;
use App\Repository\Customer\CustomerRepositoryInterface;

class RepositoryAppProvider
{
    public static function register()
    {
        return [
            CustomerRepositoryInterface::class => function ($container) {
                return new CustomerRepository($container->get(EntityManager::class));
            }
        ];
    }
}
