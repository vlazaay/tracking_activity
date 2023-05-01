<?php

namespace App\Action\Auth;

use App\Action\Interfaces\ActionInterface;
use App\Repository\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;


class RegisterAction implements ActionInterface
{
    private $userRepository;
    private $validator;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->validator = v::key('username', v::stringType()->notEmpty())
            ->key('password', v::stringType()->notEmpty()->length(6, null));
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        try {
            $this->validator->assert($data);
        } catch (NestedValidationException $e) {
            $errors = $e->getMessages();
            return $response->withHeader(['errors' => $errors], 400);
        }
        $user = new User($data['username'], password_hash($data['password'], PASSWORD_DEFAULT), 'USER');
        $this->userRepository->save($user);


        return $response->withHeader('Location', '/login')->withStatus(302);
    }
}