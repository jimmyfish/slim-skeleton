<?php

namespace App\Controller;

use App\Repository\Customer\CustomerRepositoryInterface;
use App\Service\HomeService;
use Psr\Http\Message\ResponseInterface;

class HomeController extends BaseController
{
    public function __construct(
        private HomeService $homeService,
        private CustomerRepositoryInterface $customerRepository
    ) {}

    public function index($req, ResponseInterface $response): ResponseInterface
    {
        return $this->jsonResponse($this->customerRepository->findAll(), $response);
    }
}
