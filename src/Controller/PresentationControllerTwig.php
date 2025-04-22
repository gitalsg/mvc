<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationControllerTwig extends AbstractController
{
    #[Route("/", name: "presentation")]
    public function presentation(): Response
    {
        return $this->render('presentation.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function report(): Response
    {
        return $this->render('report.html.twig');
    }

    #[Route("/report#kmom01", name: "kmom01")]
    public function kmom01(): Response
    {
        return $this->render('kmom01.html.twig');
    }

    #[Route("/report#kmom02", name: "kmom02")]
    public function kmom02(): Response
    {
        return $this->render('kmom02.html.twig');
    }

    #[Route("/lucky", name: "lucky_number")]
    public function number(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'number' => $number
        ];

        return $this->render('lucky_number.html.twig', $data);
    }
}
