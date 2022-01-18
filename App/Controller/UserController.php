<?php

namespace App\Controller;

use App\Service\JewelryService;
use App\Service\UserService;
use Framework\Core\BaseController\BaseController;
use Framework\Session\Session;

class UserController extends BaseController
{
    private JewelryService $jewelryService;
    private UserService $userService;
    private Session $session;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
        $this->jewelryService = new JewelryService();
        $this->session = Session::getInstance();
    }

    public function changeDataUser():void
    {
        $currentUser = $this->userService->getByField(['id' => $this->session->get('userId')]);
        $this->templeater->renderUser('change-data-user','change-data-user', ['user' => $currentUser]);

    }

    public function main()
    {
        $allJewelry = $this->jewelryService->all();

        $this->templeater->renderUser('Main', 'catalogUser', ['products' => $allJewelry]);
    }

    public function changeUser():void
    {
        $this->userService->updateUser($_POST['id']);

        header("location: /changeDataUser");
    }
}