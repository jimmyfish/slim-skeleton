<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;

abstract class BaseController
{
    private function jsonResponse(array|object|string|null $data, ResponseInterface $response, int $status = 200): ResponseInterface
    {
        $response->getBody()->write(json_encode($data));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }

    protected function success(array|object|string|null $data = null, ResponseInterface $response, int $status = 200): ResponseInterface
    {
        return $this->jsonResponse($data, $response, 200);
    }
}
