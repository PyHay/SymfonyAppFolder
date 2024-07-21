<?php

namespace App\Controller;

use App\Service\CentrifugoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

class TestCentrifugoController extends AbstractController
{
    public function __construct(private readonly CentrifugoService $service)
    {
    }

    #[Route("/test/centrifugo", name: "app_test_centrifugo")]
    public function __invoke(): JsonResponse
    {
        try {
            $this->service->example();
        } catch (Throwable $e) {
            //logger
            dd($e);
        }

        return new JsonResponse("oks");
    }
}
