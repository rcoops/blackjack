<?php

/**
 * Description of Dealer
 *
 * @author Chris
 */
require_once('Player.php');
require_once('Deck.php');

class Dealer extends Player {

    private $deck;
    
    public function __construct($noOfDecks=2) {
        parent::__construct('Dealer');
        $this->deck = new Deck($noOfDecks);
        $this->deck->shuffle();
    }

    /*public function printPlayerDetails() {
        foreach ($this->players as &$player) {
            $player->printDetails();
        }
    }*/

    public function dealCards($players) {
        
        foreach ($players as $player) {
            $player->addCardsToHand($this->deck->retrieveCards(2));
            $player->updateTotal();
        }
    }

    public function tableAction() {
        $count = 1;
        foreach ($this->players as &$player) {
            $playing = true;
            echo '<br> >  Round ', $count;
            while ($playing) {
                switch ($player->action()) {
                    case 'hit':
                        $this->deckOfCards->dealCards($player, 1);
                        $player->updateTotal();
                        $lastCard = end(array_values($player->hand))->getDetails();
                        echo '<br> Player ', $player->name, ' Hit - ', $lastCard;
                        break;
                    case 'stick':
                        echo '<br> Player ', $player->name, ' stuck';
                        $playing = false;
                        break;
                    case 'doubleDown':
                        $this->deckOfCards->dealCards($player, 1);
                        $player->updateTotal();
                        $lastCard = end(array_values($player->hand))->getDetails();
                        echo '<br> Player ', $player->name, ' Doubled Down - ', $lastCard;
                        $playing = false;
                        break;
                }
                if ($player->total > $this->TARGETSCORE) {
                    $playing = false;
                    echo '<br> Player ', $player->name, ' BUST';
                }
            }

            $player->printDetails();
            echo '<br> > End round ', $count, '<br>';
            $count++;
        }
    }

    public function declareWinners() {
        echo '<br><br>------- GAME OUTCOME ------';
        echo '<br> Dealer has ', $this->total;
        foreach ($this->players as &$player) {
            if ($player->name != 'Dealer') {
                $winStatus = 'Won!';
                //   player total < than dealer     player total <= 21                          dealer total <= 21
                if (($player->total < $this->total) && $player->total <= $this->TARGETSCORE && $this->total <= $this->TARGETSCORE) {
                    $winStatus = 'Lost!';
                } elseif ($player->total > $this->TARGETSCORE) {
                    $winStatus = 'Bust!';
                }
                echo '<br>Player ', $player->name, ' ', $winStatus, ' with ', $player->total;
            }
        }
        echo '<br>';
    }

}
