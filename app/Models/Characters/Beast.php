<?php

namespace App\Models\Characters;

use App\Models\Characters\Character;

class Beast extends Character{

    public function __construct(){

        parent::__construct();

        $this->health = mt_rand(60,90);
        $this->strength = mt_rand(60,90);
        $this->defence = mt_rand(40,60);
        $this->speed = mt_rand(40,60);
        $this->luck = mt_rand(25,40);
        $this->name = 'Wild Beast';
    }
}