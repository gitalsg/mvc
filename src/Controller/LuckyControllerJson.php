<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LuckyControllerJson extends AbstractController
{
    #[Route("/api/", name: "api")]
    public function api(): Response
    {
        return $this->render('api.html.twig');
    }

    #[Route("/api/quote", name: "quotes")]
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

    #[Route("/api/deck", name: "deck_sorted", methods: ['GET'])]
    public function deckSorted(): Response
    {
        $deck = new DeckOfCards();

        $cards = array_map(function ($card) {
            return [
                'suit' => $card->getColor(),
                'value' => $card->getNumber(),
                'string' => $card->getAsString()
            ];
        }, $deck->all());

        $response = new JsonResponse($cards);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/api/deck/shuffle", name: "deck_shuffled", methods: ['POST'])]
    public function deckShuffled(SessionInterface $session): Response
    {
        $deck = new DeckOfCards();
        $deck->shuffle();

        $session->set("deck", $deck);

        $cards = array_map(fn ($card) => [
            'suit' => $card->getColor(),
            'value' => $card->getNumber(),
            'string' => $card->getAsString()
        ], $deck->all());

        $response = new JsonResponse([
            'deck' => $cards
        ]);

        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/deck/draw", name: "api_draw_a_card", methods: ['POST'])]
    public function drawACardApi(SessionInterface $session): Response
    {
        $deck = $session->get('deck') ?? new DeckOfCards();
        $hand = $session->get('hand') ?? new CardHand();

        $card = $deck->takeCard();
        $hand->add($card);

        $session->set('deck', $deck);
        $session->set('hand', $hand);

        $data = [
            'drawn_card' => [
                'suit' => $card->getColor(),
                'value' => $card->getNumber(),
                'string' => $card->getAsString()
            ],
            'remaining' => $deck->getRemainingDeck()
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/api/deck/draw/{num<\d+>}", name: "api_draw_some_cards", methods: ['POST'])]
    public function drawCardsApi(int $num, SessionInterface $session): Response
    {
        if ($num > 52) {
            throw new \Exception("Can not draw more than 52 cards!");
        }

        $deck = $session->get('deck') ?? new DeckOfCards();
        $hand = $session->get('hand') ?? new CardHand();

        $drawn = [];
        for ($i = 0; $i < $num; $i++) {
            $card = $deck->takeCard();
            if (!$card) {
                break;
            }
            $drawn[] = [
                'suit' => $card->getColor(),
                'value' => $card->getNumber(),
                'string' => $card->getAsString()
            ];
            $hand->add($card);
        }
        $session->set('deck', $deck);
        $session->set('hand', $hand);

        $data = [
            'drawn_cards' => $drawn,
            'remaining' => $deck->getRemainingDeck()
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }
}
