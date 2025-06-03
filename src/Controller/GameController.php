<?php

namespace App\Controller;

use App\Game\Card;
use App\Game\CardGraphic;
use App\Game\DeckOfCards;
use App\Game\CardHandPlayer;
use App\Game\CardHandBank;
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
        $bankHand = new CardHandBank();

        $session->set("deck", $deck);
        $session->set("player_hand", $playerHand);
        $session->set("bank_hand", $bankHand);
        $session->set("start", 1);

        return $this->redirectToRoute('game_player');
    }

    #[Route("/game/player/play", name: "game_player", methods: ['GET'])]
    public function playerGame(SessionInterface $session): Response
    {
        $deck = $session->get("deck");
        $playerHand = $session->get("player_hand");

        $session->set('deck', $deck);
        $session->set('player_hand', $playerHand);

        $totalValue = $playerHand->getTotalValue();

        return $this->render('game/player.html.twig', [
            "remaining" => $deck->getRemainingDeck(),
            "hand" => $playerHand,
            "total" => $totalValue
        ]);
    }

    #[Route("/game/player/morecards", name: "game_player_morecards", methods: ['POST'])]
    public function playerGameMore(Request $request, SessionInterface $session): Response
    {
        $deck = $session->get("deck");
        $playerHand = $session->get("player_hand");

        $moreCards = $request->request->get('moreCards');

        if ($moreCards === 'more') {
            return $this->moreCardsForPlayer($deck, $playerHand, $session);
        } if ($moreCards === 'no') {
            $this->addFlash(
                'notice',
                'You chosed to stand; it is the banks turn now!'
            );
        }

        return $this->redirectToRoute('game_bank');
    }

    private function moreCardsForPlayer($deck, $playerHand,SessionInterface $session): Response
    {
        $card = $deck->takeCard();
        $playerHand->addCard($card);

        $totalValue = $playerHand->getTotalValue();

            if ($totalValue == 21) {
                $this->addFlash(
                    'warning',
                    'You got 21; it is the banks turn now!'
                );
                return $this->redirectToRoute('game_bank');
            } if ($totalValue > 21) {
                $this->addFlash(
                    'notice',
                    'You got over 21; you lost!'
                );
                return $this->redirectToRoute('end_game');
            }

            $session->set('deck', $deck);
            $session->set('player_hand', $playerHand);

            return $this->redirectToRoute('game_player');
    }
    
    #[Route("/game/bank/play", name: "game_bank")]
    public function bankGame(SessionInterface $session): Response
    {
        $deck = $session->get("deck");
        $bankHand = $session->get("bank_hand");

        $session->set('deck', $deck);
        $session->set('bank_hand', $bankHand);

        while ($bankHand->getTotalValue() < 17) {
            $card = $deck->takeCard();
            $bankHand->addCard($card);
        }

        $totalValue = $bankHand->getTotalValue();

        if ($totalValue > 21) {
            $this->addFlash(
                'warning',
                'The bank got over 21!'
            );
            return $this->redirectToRoute('end_game');
        }

        $session->set('bank_hand', $bankHand);

        return $this->render('game/bank.html.twig', [
            "remaining" => $deck->getRemainingDeck(),
            "hand" => $bankHand,
            "total" => $totalValue
        ]);
    }

    #[Route("/game/end", name: "end_game")]
    public function endGame(SessionInterface $session): Response
    {
        $playerHand = $session->get("player_hand");
        $bankHand = $session->get("bank_hand");

        $playerTotalValue = $playerHand->getTotalValue();
        $bankTotalValue = $bankHand->getTotalValue();

        if ($playerTotalValue > 21) {
            $this->addFlash(
                'warning',
                'The bank is the winner!!'
            );
        } elseif ($bankTotalValue > 21) {
            $this->addFlash(
                'success',
                'The player is the winner!!'
            );
        } elseif ($playerTotalValue > $bankTotalValue) {
            $this->addFlash(
                'success',
                'The player is the winner!!'
            );
        } else {
            $this->addFlash(
                'warning',
                'The bank is the winner!!'
            );
        }

        return $this->render('game/endgame.html.twig');
    }
}
