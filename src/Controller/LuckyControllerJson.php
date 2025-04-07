<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson extends AbstractController
{

    #[Route("/api/", name: "api")]
    public function api(): Response
    {
        return $this->render('api.html.twig');
    }

    #[Route("/api/quote")]
    public function jsonQuotes(): Response
    {
        $quotes = [
            'Enjoy the little things',
            'Take your time to do some yoga',
            'Take time to relax',
            'Maybe it is time for some coffee'
        ];

        $quotesRandom = $quotes[array_rand($quotes)];

        $date = date('Y-m-d');

        $timestamp = time();

        $time = date('H:i:s', $timestamp);

        $data = [
            'quote' => $quotesRandom,
            'date' => $date,
            'timestamp' => $time,
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
