<?php

namespace App\Controller;

use App\Service\JewelryService;
use Framework\Core\BaseController\BaseController;

class JewelryController extends BaseController
{
    private JewelryService $jewelryService;

    public function __construct()
    {
        $this->jewelryService = new JewelryService();
    }

    public function addBook(): void
    {
        $this->jewelryService->createBook();
        header("Location: /");
    }
}