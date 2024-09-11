<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class BaseController
{
    protected function jsonResponse(array|object|string|null $data, ResponseInterface $response, int $status = 200): ResponseInterface
    {
        $response->getBody()->write(json_encode($data));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}
