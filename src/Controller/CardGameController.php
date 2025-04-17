<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\DeckOfCards;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardGameController extends AbstractController
{
    #[Route("/card", name: "card_start")]
    public function home(): Response
    {
        return $this->render('card/home.html.twig');
    }

    #[Route("/session", name: "session_show")]
    public function show(SessionInterface $session): Response
    {
        $sessionData = $session->all();

        return $this->render('card/session.html.twig', [
            'sessionData' => $sessionData
        ]);
    }

    #[Route("/session/delete", name: "session_delete")]
    public function delete(SessionInterface $session): Response
    {
        $session->clear();

        $this->addFlash(
            'warning',
            'You have now deleted the session!'
        );

        return $this->redirectToRoute('session_show');
    }

    #[Route("/card/deck", name: "deck_of_cards")]
    public function deckOfCards(): Response
    {
        $deck = new DeckOfCards();

        $data = [
            "card" => $deck->all(),
            "cardString" => $deck->getAsString(),
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    #[Route("/card/deck/shuffle", name: "deck_shuffle")]
    public function deckOfCardsShuffle(): Response
    {
        $deck = new DeckOfCards();
        $deck->shuffle();

        $data = [
            "card" => $deck->all(),
            "cardString" => $deck->getAsString(),
        ];

        return $this->render('card/deck.html.twig', $data);
    }
}
