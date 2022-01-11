<?php

namespace App\Controller;

use Framework\Core\BaseController\BaseController;
use App\Service\JewelryService;

class MainController extends BaseController
{
    private JewelryService $jewelryService;

    public function __construct()
    {
        parent::__construct();
        $this->jewelryService = new JewelryService();
    }

    public function main()
    {
        $allJewelry = $this->jewelryService->all();

        $this->templeater->render('Main', 'catalog', ['products' => $allJewelry]);
    }

}