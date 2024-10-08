<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\StockService;
class TestController extends AbstractController
{
    public function __construct(private readonly StockService $stockService)
    {
        
    }

    #[Route('/stock', methods: ['GET'])]
    public function getStock(Request $request): Response
    {
        $stock = $this->stockService->getStock(1);
        return new Response('Some stock. ' . $stock);
    }

    #[Route('/stock/{id}', methods: ['GET'])]
    public function getStockId(int $id): Response
    {
        return new Response('Stock id: ' . $id);
    }

    #[Route('/stock/{id}/{foo}', methods: ['GET'])]
    public function getStockIdAndFoo(int $id, string $foo): Response
    {
        return new Response('Stock id: ' . $id . ' foo: ' . $foo);
    }
}
