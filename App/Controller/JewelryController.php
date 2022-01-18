<?php

namespace App\Controller;

use App\Service\JewelryService;
use Framework\Core\BaseController\BaseController;
use Framework\Session\Session;

class JewelryController extends BaseController
{
    private JewelryService $jewelryService;
    private Session $session;

    public function __construct()
    {
        parent::__construct();
        $this->jewelryService = new JewelryService();
        $this->session = new Session();
    }

    public function createJewelry(): void
    {
        $this->jewelryService->createJewelry();
        header("Location: /");
    }

    public function changeJewelry()
    {
        $currentJewelry = $this->jewelryService->getByField(['id' => $_GET['id']]);
        $this->templeater->renderAdmin('change-data-jewelry', 'change-data-jewelry', ['jewelry' => $currentJewelry]);
    }

    public function adminCatalog()
    {
        $allJewelry = $this->jewelryService->all();
        $this->templeater->renderAdmin('adminCatalog', 'catalogAdmin', ['products' => $allJewelry]);
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
}