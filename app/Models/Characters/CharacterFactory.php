<?php

namespace App\Models\Characters;
use App\Models\Characters\Hero;
use App\Models\Characters\Beast;
use App\Models\Skills\RapidStrike;

class CharacterFactory {

    public static function getCharacter($name){

        switch($name){

            case 'hero':
                $character = new Hero('Orderus');
                break;
            case 'beast':
                $character = new Beast('Wild beast');
                break;
            default:
                $character = null;
                break;
        }

        return $character;
    }

}