<?php

namespace App\Models\Skills;

use App\Interfaces\ISkill;

class RapidStrike implements ISkill{

    /**
     * @param int 
     * stores the chance for this skill to be applied
     */
    private $chance;

    
    public function __construct($chance)
    {
        $this->chance = $chance;
    }

    /**
     * @param int
     * @return int
     * return the attack power based on the skill chance
     */
    public function attackPower(int $power):int
    {
        if(mt_rand(0,99) < $this->chance){
            echo 'Attacker throws a Rapid Strike<br/>';
            return 2*$power;
        }
        return $power;
    }

     /**
     * @param int
     * @return int
     * return the damage taken based on the skill chance
     */

    public function defenseDamage(int $damage):int
    {
        return $damage;
    }
}