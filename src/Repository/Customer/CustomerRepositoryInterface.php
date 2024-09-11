<?php

namespace App\Repository\Customer;

use App\Model\Customer;

interface CustomerRepositoryInterface
{
    public function findAll(): array;
    public function findById(int $id);
}
