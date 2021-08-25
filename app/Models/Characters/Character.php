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

    public function attackPower(Character $opponent):int
    {

        $damage = $this->strength - $opponent->defence;

        foreach($this->skills as $skill){
            $damage = $skill->attackPower($damage);
        }

        return $damage;

    }
    public function getHealth():int
    {
        return $this->health;
    }

    public function isAlive():bool
    {
        return $this->health > 0;
    }

    public function isLucky():bool
    {
        return mt_rand(0,99) < $this->luck;
    }

    public function addSkill(ISkill $skill):void
    {
        array_push($this->skills,$skill);
    }

    public function getSpeed():int
    {
        return $this->speed;
    }

    public function getLuck():int
    {
        return $this->luck;
    }

    public function getName():string
    {
        return $this->name;
    }

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