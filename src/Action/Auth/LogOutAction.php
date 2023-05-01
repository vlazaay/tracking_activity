<?php

namespace App\Action\Auth;
use App\Action\Interfaces\ActionInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LogOutAction implements ActionInterface
{
    public function __invoke(Request $request, Response $response): Response
    {
        $users = $this->userRepository->findAll();
        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }
}