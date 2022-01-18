<?php

namespace Framework\Core\Authentication;

use App\Service\UserService;
use Exception;
use Framework\Exception\NotUser;
use Framework\Session\Session;
use Framework\Validator\Validator;

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
        $user = $this->userService->getAuthUser($email, $password);
        try {
            if (isset($user)) {
                $this->session->set('userId', $user->getId());
                $this->session->deleteKey("wrongCredentials");
                if ((int)$user->getRole() === 1) {
                    return 'admin';
                }
                return 'user';
            }
            throw new NotUser();
        }catch (NotUser $e){
            $this->validator->setLoginError();
            return null;
        }
    }

}
