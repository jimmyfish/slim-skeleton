<?php

namespace App\Repository\Customer;

use App\Entity\Customer;
use Doctrine\ORM\EntityManager;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function __construct(private EntityManager $entityManager) {}

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Customer::class)->findAll();
    }

    public function findById(int $id)
    {
        return $this->entityManager->getRepository(Customer::class)->find($id);
    }
}
