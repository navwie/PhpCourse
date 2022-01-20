<?php

namespace App\Controller;

use App\Service\JewelryService;
use App\Service\UserService;
use Framework\Core\BaseController\BaseController;
use Framework\Session\Session;
use Framework\Validator\Validator;

class UserController extends BaseController
{
    private JewelryService $jewelryService;
    private UserService $userService;
    private Session $session;
    private Validator $validator;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
        $this->jewelryService = new JewelryService();
        $this->session = Session::getInstance();
        $this->validator = new Validator();
    }

    public function changeDataUser(): void
    {
        $currentUser = $this->userService->getByField(['id' => $this->session->get('userId')]);
        $this->templeater->renderUser('change-data-user', 'change-data-user', ['user' => $currentUser]);

    }

    public function main()
    {
        $allJewelry = $this->jewelryService->all();

        $this->templeater->renderUser('Main', 'catalogUser', ['products' => $allJewelry]);
    }

    public function changeUser(): void
    {
        $this->userService->updateUser($_POST['id']);

        header("location: /changeDataUser");
    }

    public function search(): void
    {
        try {
            $currentJewelry = $this->jewelryService->getByField(["title" => $_POST['search']]);
        } catch (\Exception $e) {
            $this->validator->setUniversalError($e);
            header("location: /userCatalog");
            return;
        }

        $this->templeater->renderUser(
            'Товар',
            'jewelry-user',
            ["jewelry" => $currentJewelry]
        );
    }

    public function userCatalog()
    {
        $allJewelry = $this->jewelryService->all();
        $this->templeater->renderUser('userCatalog', 'catalogUser', ['products' => $allJewelry]);
    }

    public function sort()
    {
        $jewelries = $this->jewelryService->getJewelryByType($_GET['id']);
        $this->templeater->renderUser('Main', 'catalogUser', ['products' => $jewelries]);
    }
}