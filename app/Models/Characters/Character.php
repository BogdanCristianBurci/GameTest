<?php

namespace App\Models\Characters;

use App\Interfaces\ISkill;


class Character {

    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;    
    protected $name;

    protected $skills;



    public function __construct(){
        $this->skills = [];
    }

    /**
     * @param int
     * @return string
     * 
     * calculate character health value after an attack 
     */
    public function takeDamage(int $damage):string
    {
        if($this->isLucky()){
            return '<p>Defender is lucky and received 0 damage</p>';
        }else{
            foreach($this->skills as $skill){
                $damage = $skill->defenseDamage($damage);
            }
                        
            $this->health = $this->health - $damage;

            return '';
        }
        
    }

    /**
     * @param Character
     * @return int
     * 
     * calculate attacking player damage power
     */
    public function attackPower(Character $opponent):int
    {

        $damage = $this->strength - $opponent->defence;

        foreach($this->skills as $skill){
            $damage = $skill->attackPower($damage);
        }

        return $damage;

    }

    /**
     * @return int
     * 
     * retrieve player health
     */
    public function getHealth():int
    {
        return $this->health;
    }

    /**
     * @return bool
     * 
     * display if character health is above 0
     */
    public function isAlive():bool
    {
        return $this->health > 0;
    }

    /**
     * @return bool
     * 
     * calculate if a player is lucky based on his stats
     */
    public function isLucky():bool
    {
        return mt_rand(0,99) < $this->luck;
    }

    /**
     * @param ISkill
     * 
     * @return void
     * 
     * adds a new skill to pleayer skills queue
     */
    public function addSkill(ISkill $skill):void
    {
        array_push($this->skills,$skill);
    }

    /**
     * @return int
     * 
     * retrieve player speed
     */
    public function getSpeed():int
    {
        return $this->speed;
    }

     /**
     * @return int
     * 
     * retrieve player luck
     */
    public function getLuck():int
    {
        return $this->luck;
    }

     /**
     * @return string
     * 
     * retrieve player name
     */
    public function getName():string
    {
        return $this->name;
    }

     /**
     *  
     * display player stats
     */
    public function __toString()
    {
        return 'Name: '.$this->name.
             '<br/>Health: '.$this->health.
             '<br/>Strength: '.$this->strength.
             '<br/>Defence: '.$this->defence.
             '<br/>Speed: '.$this->speed.
             '<br/>Luck: '.$this->luck.'<br/>';
             
    }
}