<?php

namespace Framework\Core\Authentication;

use Framework\Exception\NotUser;
use App\Service\UserService;
use Framework\Session\Session;
use Framework\Validator\Validator;
use App\Model\UserModel;

class Authentication
{
    private UserService $userService;
    private Session $session;
    private Validator $validator;

    public function __construct()
    {
        $this->session = Session::getInstance();
        $this->validator = new Validator();
        $this->userService = new UserService();
    }
    public function authentication($email, $password)
    {
        $users = $this->userService->getAuthUser($email, $password);
        return isset($users);
    }

    public function getEmail(): ?string
    {
        return $this->session->get('email');
    }
}
