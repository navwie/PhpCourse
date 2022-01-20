<?php

namespace App\Controller;

use App\Service\JewelryService;
use Framework\Core\BaseController\BaseController;
use Framework\Session\Session;
use Framework\Validator\Validator;

class JewelryController extends BaseController
{
    private JewelryService $jewelryService;
    private Session $session;
    private Validator $validator;

    public function __construct()
    {
        parent::__construct();
        $this->jewelryService = new JewelryService();
        $this->session = new Session();
        $this->validator = new Validator();
    }

    public function createJewelry(): void
    {
        $this->jewelryService->createJewelry();
        header("Location: /adminCatalog");
    }

    public function changeJewelry()
    {
        $currentJewelry = $this->jewelryService->getByField(['id' => $_GET['id']]);
        $this->templeater->renderAdmin('change-data-jewelry', 'change-data-jewelry', ['jewelry' => $currentJewelry]);
    }


    public function updateJewelry(): void
    {
        $this->jewelryService->updateJewelry($_POST['id']);
        header("location: /adminCatalog");
    }

    public function deleteJewelry()
    {
        $this->jewelryService->deleteJewelry($_POST['id']);
        header("location: /adminCatalog");
    }

    public function search(): void
    {
        try {
            $currentJewelry = $this->jewelryService->getByField(["title" => $_POST['search']]);
        } catch (\Exception $e) {
            $this->validator->setUniversalError($e);
            header("location: /");
            return;
        }

        $this->templeater->render(
            'Товар',
            'jewelry',
            ["jewelry" => $currentJewelry]
        );
    }

    public function sort()
    {
        if ($_GET['id']) {
            $jewelries = $this->jewelryService->getJewelryByType($_GET['id']);
            $this->templeater->render('Main', 'catalog', ['products' => $jewelries]);

        } else if ($_GET['idSex']) {
            $sexJewelry = $this->jewelryService->getJewelryBySex($_GET['idSex']);
            $this->templeater->render('Main', 'catalog', ['products' => $sexJewelry]);
        }
    }
}