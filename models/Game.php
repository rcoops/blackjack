<?php

class Game {
    private $TARGETSCORE = 21;
    private $players;
    private $dealer;
    
    public function __construct($players=3, $noOfdecks) {
        $this->dealer = new Dealer($noOfdecks);
        $this->players = [];

        for ($p = 0; $p < $players; $p++) {
            $player = new Player(($p+1));
            array_push($this->players, $player);
        }
        array_push($this->players, $this->dealer);
    }
    
    public function getPlayers() {
        return $this->players;
    }
    
    public function play() {
        
        $this->dealer->dealCards($this->players);
    }
}