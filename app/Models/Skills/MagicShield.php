<?php

namespace App\Models\Skills;

use App\Interfaces\ISkill;

class MagicShield implements ISkill{
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
        return $power;
    }

     /**
     * @param int
     * @return int
     * return the damage taken based on the skill chance
     */

    public function defenseDamage(int $damage):float
    {
        if(mt_rand(0,99) < $this->chance){
            echo 'Defender use his Magic shield and takes only hald damage<br/>';
            return $damage / 2;
        }
        return  $damage;
    }
}