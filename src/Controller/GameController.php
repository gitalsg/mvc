<?php

namespace App\Controller;

use App\Game\Card;
use App\Game\CardGraphic;
use App\Game\DeckOfCards;
use App\Game\CardHandPlayer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route("/game", name: "game_start")]
    public function home(): Response
    {
        return $this->render('game/home.html.twig');
    }

    #[Route("/game/doc", name: "game_doc")]
    public function doc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    #[Route("/game/deck/shuffle", name: "deck_shuffle")]
    public function deckOfCardsShuffle(SessionInterface $session): Response
    {
        $deck = new DeckOfCards();
        $deck->shuffle();

        $session->set("deck", $deck);

        $this->addFlash('success', 'The deck of cards have been shuffled!');

        $data = [
            "card" => $deck->all(),
            "cardString" => $deck->getAsString(),
        ];

        return $this->render('game/game.html.twig', $data);
    }

    #[Route("/game/init", name: "game_init_get", methods: ['GET'])]
    public function init(): Response
    {
        return $this->render('game/game.html.twig');
    }

    #[Route("/game/init", name: "game_init_post", methods: ['POST'])]
    public function initCallback(
        Request $request,
        SessionInterface $session
    ): Response {

        $deck = new DeckOfCards();
        $deck->shuffle();

        $playerHand = new CardHandPlayer();

        $session->set("deck", $deck);
        $session->set("player_hand", $playerHand);
        $session->set("start", 1);

        return $this->redirectToRoute('game_player');
    }

    #[Route("/game/player/play", name: "game_player")]
    public function playerGame(SessionInterface $session): Response
    {

        $deck = $session->get("deck");

        $playerHand = $session->get("player_hand");

        $card = $deck->takeCard();
        $playerHand->addCard($card);

        $session->set('deck', $deck);
        $session->set('player_hand', $playerHand);

        $totalValue = $playerHand->getTotalValue();

        return $this->render('game/player.html.twig', [
            "card" => $card,
            "remaining" => $deck->getRemainingDeck(),
            "hand" => $playerHand,
            "total" => $totalValue
        ]);
    }
}
