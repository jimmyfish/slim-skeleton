<?php

namespace App\Service;

use App\Entity\Customer;
use Doctrine\ORM\EntityManager;

class HomeService
{

    public function __construct(private EntityManager $em) {}

    public function getCustomers()
    {
        return $this->em->getRepository(Customer::class)->count();
    }
}
