<?php

namespace App\Models\Game;

use App\Models\Characters\Character;


class Game {
    private $attacker;
    private $defender;
    public $rounds = 20;


    public function __construct(Character $player1, Character $player2)
    {
        if($player1->getSpeed() === $player2->getSpeed()){
            if($player1->getLuck() > $player2->getLuck()){
                $this->attacker = $player1;
                $this->defender = $player2;
            }else{
                $this->attacker = $player2;
                $this->defender = $player1;
            }
        }else{
            if($player1->getSpeed() > $player2->getSpeed()){
                $this->attacker = $player1;
                $this->defender = $player2;
            }else{
                $this->attacker = $player2;
                $this->defender = $player1;
            }
        }
       
        
    }

    /**
     
     * change the attacking player
     */
    public function switchPlayers():void
    {
        $temp = $this->attacker;
        $this->attacker = $this->defender;
        $this->defender = $temp;
    }

    /**
     * @return Character
     * 
     * return the attacking player
     */
    public function getAttacker():Character
    {
        return $this->attacker;
    }

     /**
     * @return Character
     * 
     * return the defending player
     */
    public function getDefender():Character
    {
        return $this->defender;
    }

     /**
     * @return Character
     * 
     * return the winner of the game
     */
    public function getWinner():Character
    {
        return $this->attacker->getHealth() > $this->defender->getHealth() ? $this->attacker : $this->defender;
    }

     /**
     * @return bool
     * 
     * check if both players are alive
     */
    public function bothPlayersAreAlive():bool
    {
        return $this->attacker->isAlive() && $this->defender->isAlive();
    }
}