<?php

namespace App\Controller;

use App\Service\JewelryService;
use App\Service\UserService;
use Framework\Core\BaseController\BaseController;
use Framework\Session\Session;
use Framework\Validator\Validator;

class BasketController extends BaseController
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
        $this->session = Session::getInstance();
    }

    public function basket(): void
    {
        $products = $this->session->get('products');
        $this->templeater->renderUser(
            'Корзина',
            'basket',
            ["products" => $products]
        );
    }

    public function addProductToBasket(): void
    {
        $currentProduct = $this->jewelryService->getByField(["id" => $_GET['id']]);

        $productBasketId = $this->isProductInBasket($currentProduct);
        if ($productBasketId !== false) {
            $_SESSION['products'][$productBasketId]['amount'] += 1;
        } else {
            $currentProduct['amount'] = 1;
            $_SESSION['products'][] = $currentProduct;
        }
        header("location: /userCatalog");
    }

    public function deleteProductToBasket(): void
    {
        $currentProduct = $this->jewelryService->getByField(["id" => $_GET['id']]);

        $key = $this->isProductInBasket($currentProduct);
        unset($_SESSION['products'][$key]);

        header("location: /basket");
    }

    /*public function buy(): void
    {
        try {
            $currentProduct = $this->jewelryService->getByField(["id" => $_POST['id']]);
            $this->jewelryService->buyBook($currentProduct[0]->getId(), $_POST["amount"]);

            $userId = $this->userService->getByField(["login" => $this->authentication->getLogin()]);
            $this->userService->setNewBook($userId[0]->getId(), $currentBook[0]->getId(), $_POST["amount"]);

            $this->deleteBook();
        } catch (NotEnoughBookException $exception) {
            $this->validator->setUniversalError($exception);
        }

    }*/

    private function isProductInBasket($product): bool|int
    {
        foreach ($_SESSION['products'] as $key => $cart) {
            if (in_array($product[0], $cart)) {
                return $key;
            }
        }
        return false;
    }

}