<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\JewelryService;
use App\Service\UserService;
use Framework\Core\BaseController\BaseController;
use Framework\Session\Session;
use Framework\Validator\Validator;


class AdminController extends BaseController
{

    private JewelryService $jewelryService;
    private UserService $userService;
    private Session $session;
    private Validator $validator;

    public function __construct()
    {
        parent::__construct();
        $this->jewelryService = new JewelryService();
        $this->userService = new UserService();
        $this->session = new Session();
        $this->validator = new Validator();
    }


    public function index()
    {
        $this->templeater->renderAdmin('AdminController', 'admin');
    }

    public function addProduct()
    {
        $this->templeater->renderAdmin('add-product', 'add-product');
    }

    public function main()
    {
        $allJewelry = $this->jewelryService->all();

        $this->templeater->renderAdmin('Main', 'catalogAdmin', ['products' => $allJewelry]);
    }

    public function changeDataAdmin(): void
    {
        $currentUser = $this->userService->getByField(['id' => $this->session->get('userId')]);
        $this->templeater->renderAdmin('change-data-admin', 'change-data-admin', ['user' => $currentUser]);

    }

    public function adminCatalog()
    {
        $allJewelry = $this->jewelryService->all();
        $this->templeater->renderAdmin('adminCatalog', 'catalogAdmin', ['products' => $allJewelry]);
    }

    public function changeAdmin(): void
    {
        $this->userService->updateUser($_POST['id']);

        header("location: /adminCatalog");
    }

    public function search(): void
    {
        try {
            $currentJewelry = $this->jewelryService->getByField(["title" => $_POST['search']]);
        } catch (\Exception $e) {
            $this->validator->setUniversalError($e);
            header("location: /adminCatalog");
            return;
        }

        $this->templeater->renderAdmin(
            'Товар',
            'jewelry-admin',
            ["jewelry" => $currentJewelry]
        );
    }

    public function sort()
    {
        $jewelries = $this->jewelryService->getJewelryByType($_GET['id']);
        $this->templeater->renderAdmin('Main', 'catalogAdmin', ['products' => $jewelries]);
    }

}