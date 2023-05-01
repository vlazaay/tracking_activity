<?php

namespace App\Action\Interfaces;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface ActionInterface
{
    public function __invoke(Request $request, Response $response): Response;
}