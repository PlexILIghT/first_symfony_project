<?php

namespace App\Controller;
use App\Service\HelloService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    public function __construct(private readonly HelloService $helloService)
    {

    }
    #[Route('/hello')]
    public function index(): Response
    {
        return new Response("aa");
    }
    #[Route('/hello/{name}')]
    public function getHelloName(string $name): Response
    {
        return new Response('Hello ' . $name);
    }

    #[Route(path: 'lucky/{number}', methods: ['GET'])]
    public function checkLuckyNumber(string $number): Response
    {
        return new Response("Lucky number: " . $number);
    }
}