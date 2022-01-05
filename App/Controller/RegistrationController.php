<?php

namespace App\Controller;

use Framework\Core\BaseController\BaseController;
use App\Service\RegistrationService;

class RegistrationController extends BaseController
{
    public function register()
    {
        $this->templeater->render('RegistrationController', 'registration');
    }

    public function verification()
    {
        $registrationService = new RegistrationService();
        $result = $registrationService->register(
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['password']
        );
        var_dump($result);

        if ($result) {
            header('Location: /login');
        } else {
            header('Location: /register');
        }
    }
}

