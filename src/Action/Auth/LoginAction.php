<?php

namespace App\Action\Auth;

use App\Action\Interfaces\ActionInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginAction implements ActionInterface
{
    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $username = $data['username'];
        $password = $data['password'];

        // TODO: Check if credentials are valid
        if ($this->checkCredentials($username, $password)) {
            // TODO: Create session for user
            // TODO: Redirect to homepage
        } else {
            // TODO: Display error message
            // TODO: Redirect back to login page
        }

        return $response;
    }

    private function checkCredentials($username, $password) {
        // TODO: Check if credentials are valid
    }
}