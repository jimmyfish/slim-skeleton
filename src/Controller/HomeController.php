<?php

namespace App\Controller;

use App\Repository\Customer\CustomerRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends BaseController
{

    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository  = $customerRepository;
    }

    public function index($req, ResponseInterface $response): ResponseInterface
    {
        return $this->jsonResponse($this->customerRepository->findById(1), $response);
    }
}
