<?php

namespace App\Repository\Customer;

use App\Model\Customer;
use Doctrine\ORM\EntityManagerInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll(): array
    {
        return [];
    }

    public function findById(int $id)
    {
        return $this->entityManager->getRepository(Customer::class)->find($id);
    }
}
