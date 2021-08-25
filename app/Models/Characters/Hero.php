<?php

namespace App\Models\Characters;

use App\Models\Characters\Character;


class Hero extends Character{
    
    public function __construct(){

        parent::__construct();

        $this->health = mt_rand(70,100);
        $this->strength = mt_rand(70,80);
        $this->defence = mt_rand(45,55);
        $this->speed = mt_rand(40,50);
        $this->luck = mt_rand(10,30);
        $this->name = 'Orderus';
    }
    
}